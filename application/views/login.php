<!DOCTYPE html>
<html>
  <head>
    <title>Junk On Us</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, minimum-scale=1.0, initial-scale=1.0, user-scalable=yes">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url() . "assets/css/styles.css";?>">
    
  </head>

  <body>

    <div class="body"></div>
		<div class="grad"></div>
		<div class="motto">
			<div>Don't Let Your <span>Junk</span> End Here</div>
		</div>
		<div class="header">
			<div>Junk<span>On</span>Us</div>
		</div>
		<div class="error">
			<div><?php echo validation_errors(); ?></div>
			<div><?php echo $this->session->flashdata('success'); ?></div>
		</div>
		<br>
		<div class="login">

			<?php echo form_open('LoginController/checkLogin'); ?>

				<input type="text" placeholder="username" name="username"><br>
				<input type="password" placeholder="password" name="password"><br>
				<input type="submit" value="Login">
			</form>

			<?php echo form_open('LoginController/register'); ?>
				<input type="submit" value="Register">
			</form>

			<?php echo form_open('LoginController/guest'); ?>
				<input type="submit" value="Proceed as Guest">
			</form>
		</div>
    
  </body>
</html>

