<?php

	class Usermodel extends CI_Model
	{
		
		public function get_user_info($userid)
		{
			$r = $this->db->query('select user_name, is_admin, amount from users where id="'.$userid.'" limit 1');

			return $r->row();
		}

		public function add_amount($data)
		{
			$password_hash = crypt($data['password'], $data['user_email']);

			$insert_amount_q = "insert into users (user_name, user_email, password, amount) values('".$data['user_name']."', '".$data['user_email']."', '".$password_hash."', '".$data['amount']."')" ;
			return $this->db->query($insert_amount_q);
		}

		public function transfer_amount($data)
		{
			$add_amount_to_user = "update users set amount = amount + '".$data['amount']."' where id = '".$data['user_name']."'";

			$this->db->query($add_amount_to_user);

			$deduce_amount_to_user = "update users set amount = amount - '".$data['amount']."' where id = '".$this->session->userdata('userid')."'";

			$this->db->query($deduce_amount_to_user);

			$transection_log = 'insert into transection(from_user, to_user, amount,	datetime) values("'.$this->session->userdata('userid').'","'.$data['user_name'].'","'.$data['amount'].'","'.date().'")';

			$this->db->query($transection_log);
		}

		public function user_exist($user_email)
		{
			$get_user_if_present_q = "select id from users where user_email = '".$user_email."' limit 1";
			$r = $this->db->query($get_user_if_present_q);

			if($r->num_rows == 1 ) return TRUE;
			else return FALSE;
		}

		public function get_team_memeber()
		{
			$r = $this->db->query('select id, user_name from users where id != "'.$this->session->userdata('userid').'" and is_admin=0');
			
			$team_memeber_combo = $r->result();

			foreach ($team_memeber_combo as $user) 
			{
				$user_list[$user->id] = $user->user_name;
			}

			return $user_list;

		}

	}

?>