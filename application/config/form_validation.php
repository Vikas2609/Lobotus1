<?php

	$config		=	[
							'login'		=>	[
												[
													'field'	=>	'user_email',
													'label'	=>	'Email',
													'rules'	=>	'required|valid_email'
												],
												[
													'field'	=>	'password',
													'label'	=>	'Password',
													'rules'	=>	'required'
												]
											],
						'add_amount'	=>	[
												[
													'field'	=>	'user_name',
													'label'	=>	'Username',
													'rules'	=>	'required|alpha_dash'
												],
												[
													'field'	=>	'user_email',
													'label'	=>	'Email',
													'rules'	=>	'required|valid_email'
												],
												[
													'field'	=>	'password',
													'label'	=>	'Password',
													'rules'	=>	'required'
												],
												[
													'field'	=>	'amount',
													'label'	=>	'Amount',
													'rules'	=>	'required|is_natural_no_zero'
												]
											]
					]

?>