<?php

	class User extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();//other controllers will not be accesable otherwise
			if(! $this->session->userdata('userid') ) return redirect('login');
			
			$this->load->model('usermodel');

		}

		public function index()
		{
			$user_info = $this->usermodel->get_user_info($this->session->userdata('userid'));

			if($user_info->is_admin)
				$this->load->view('admin_add_amount', ['user_name'	=>	$user_info->user_name]);
			else 
			{

				$user_list = $this->usermodel->get_team_memeber();

				$this->load->view(	'user_transfer_amount', 
									[
										'user_name'	=>	$user_info->user_name,
										'user_list'	=>	$user_list,
										'user_bal'	=>	$user_info->amount
									]
								);
			}
		}

		public function add_amount()
		{

			$post_data = $this->input->post();

			if($this->usermodel->user_exist($post_data['user_email']))
			{
				$this->session->set_flashdata(
												[
													'creation_status'	=>	'Email already present',
													'status_class'		=>	'danger'
												]
											);
			}
			else if($this->form_validation->run('add_amount'))
			{

				if($this->usermodel->add_amount($post_data))
					$this->session->set_flashdata(
													[
														'creation_status'	=>	'User created successfully',
														'status_class'		=>	'success'
													]
												);
				else
					$this->session->set_flashdata(
													[
														'creation_status'	=>	'Unable to add user',
														'status_class'		=>	'warning'
													]
												);
			}
			return redirect('user');
		}

		public function transfer_amount()
		{
			$post_data = $this->input->post();

			$user_info = $this->usermodel->get_user_info($this->session->userdata('userid'));

			$user_list = $this->usermodel->get_team_memeber();

			$this->form_validation->set_rules('user_name', 'Username', 'required');
			$this->form_validation->set_rules('amount', 'Amount', 'required|less_than['.$user_info->amount.']|greater_than[0]');

			$this->form_validation->set_message('greater_than', 'Amount being transfered should be greater than 0');
			$this->form_validation->set_message('less_than', 'Amount being transfered is more than the balance');

			if($this->form_validation->run())
			{
				$this->usermodel->transfer_amount($post_data);

				$this->session->set_flashdata('transfer_msg','Amount transfered successfully');

				return redirect('user');
			}

			$this->load->view(	'user_transfer_amount', 
								[
									'user_name'	=>	$user_info->user_name,
									'user_list'	=>	$user_list,
									'user_bal'	=>	$user_info->amount
								]
							);

		}
	
	}

?>