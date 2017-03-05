<?php

	include ('header.php');

?>
<?php

	include ('user_bar.php');

?>
<div class="container">
	<!--form class="form-horizontal col-lg-offset-3 col-lg-6" style="margin-top: 10%;"-->
	<?php 

		echo form_open(	'user/add_amount', 	
						[
							'class'=>'form-horizontal col-lg-offset-3 col-lg-6',
							'style'=>'margin-top: 10%;'
						]
					); 

	?>
		<fieldset>
		    <legend>Create User</legend>
		    <?php 
		    		if($msg =  $this->session->flashdata('creation_status')):
		    			 $status_class =  $this->session->flashdata('status_class')
		    ?>
		    <div class="alert alert-dismissible alert-<?php echo $status_class?>">
			  	<p><?php echo $msg; ?></p>
			</div>
			<?php endif; ?>
			<div class="form-group">
		      	<label class="col-lg-2 control-label">Username</label>
		      	<div class="col-lg-10">
		        	<!--input type="text" class="form-control" name="user_name"-->
		        	<?php
		        		echo form_input(
		        						[
		        							'class'=>'form-control',
		        							'name'=>'user_name',
		        							'value'=>set_value('user_name')
		        						]
		        					);
		        		echo form_error('user_name', '<p class="text-danger">', '</p>'); 
		        	?>
		      	</div>
		    </div>
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
			      	</div>
		    </div>
		    <div class="form-group">
		      	<label class="col-lg-2 control-label">Amount</label>
		      		<div class="col-lg-10">
		        		<!--input type="text" class="form-control" name="amount"-->
		        		<?php 
			        		echo form_input(
			        						[
			        							'class'=>'form-control',
			        							'name'=>'amount',
			        							'value'=>set_value('amount')
			        						]
			        					);
		        			echo form_error('amount', '<p class="text-danger">', '</p>'); 
		        		?>
			      	</div>
		    </div>
		    <div class="form-group">
		     	<div class="col-lg-10 col-lg-offset-2">
	        		<?php echo form_reset(['name'=>'reset','class'=>'btn btn-default','value'=>'Reset']) ?>
		        	<?php echo form_submit(['name'=>'submit','class'=>'btn btn-primary','value'=>'Create']) ?>
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