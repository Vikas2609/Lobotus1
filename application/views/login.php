<?php

	include ('header.php');

?>

<div class="container">
	<!--form class="form-horizontal col-lg-offset-3 col-lg-6" style="margin-top: 10%;"-->
	<?php 

		echo form_open(	'login/authenticate', 	
						[
							'class'=>'form-horizontal col-lg-offset-3 col-lg-6',
							'style'=>'margin-top: 10%;'
						]
					); 

	?>
		<fieldset>
		    <legend>Login</legend>
		    <?php if($error =  $this->session->flashdata('login_failed')): ?>
		    <div class="alert alert-dismissible alert-danger">
			  	<p><?php echo $error; ?></p>
			</div>
			<?php endif; ?>
		    <div class="form-group">
		      	<label class="col-lg-2 control-label">Email</label>
		      	<div class="col-lg-10">
		        	<!--input type="text" class="form-control" name="user_email"-->
		        	<?php 
		        		echo form_input(
			        						[
			        							'class'=>'form-control',
			        							'name'=>'user_email',
			        							'value'=>set_value('user_email')
			        						]
			        					);
		        		echo form_error('user_email', '<p class="text-danger">', '</p>'); 
		        	?>
		      	</div>
		    </div>
		    <div class="form-group">
		      	<label class="col-lg-2 control-label">Password</label>
		      		<div class="col-lg-10">
		        		<!--input type="password" class="form-control" name="password"-->
		        		<?php 
		        			echo form_password(
			        						[
			        							'class'=>'form-control',
			        							'name'=>'password'
			        						]
			        					);
		        			echo form_error('password', '<p class="text-danger">', '</p>'); 
		        		?>
				        <div class="checkbox">
				          	<label>
				            	<input type="checkbox"> Checkbox
				          	</label>
				        </div>
			      	</div>
		    </div>
		    <div class="form-group">
		     	<div class="col-lg-10 col-lg-offset-2">
	        		<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']) ?>
		        	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Login']) ?>
		      	</div>
		    </div>
		</fieldset>
	<?php 

		echo form_close(); 

	?>
</div>

<?php

	include ('footer.php');

?>