<?php

class Login extends CI_Controller
{
	
	/*function __construct(){
		parent::__construct();
		if($this->session->userdata('userid')) return redirect('user');
	}*/

	public function index()
	{
		$this->load->view('login');
	}

	public function authenticate()
	{
		if($this->form_validation->run('login'))
		{
			$post_data = $this->input->post();

			$this->load->model('Loginmodel');
	
			if($this->Loginmodel->authenticate($post_data) != false)
			{
			 	$this->session->set_userdata('userid', $this->Loginmodel->authenticate($post_data));
			 	return redirect('user');
			}
			else
			{ 
				$this->session->set_flashdata('login_failed', 'Invalid Username/Password');
				return redirect('login');//redirects to controller login
			}
		}
		else $this->load->view('login');//redirects to view login
		//else return redirect('login'); //here vaidation will not work
	}

	public function logout()
	{
		$this->session->unset_userdata('userid');
		$this->load->view('login');
	}
}

?>