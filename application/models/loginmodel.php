<?php

class Loginmodel extends CI_model
{
	public function authenticate($data)
	{
		$password_hash = crypt($data['password'], $data['user_email']);

		$get_user_data_q = "select id from users where user_email = '".$data['user_email']."' and password = '".$password_hash."' limit 1";
		$query = $this->db->query($get_user_data_q);

		if($query->num_rows() > 0)
			return $query->row()->id;
		else
			return false;
	}
}

?>