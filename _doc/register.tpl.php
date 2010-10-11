<form action="?do=register&submit" method="post">
<fieldset>
	<legend>Register</legend>
	<label for="username">Username:</label>
	<input type="text" name="username" id="username" />
	<label for="password">Password:</label>
	<input type="password" name="password" id="password" />
	<label for="password_retype">Retype Password:</label>
	<input type="password" name="password_retype" id="password_retype" />
	<input type="hidden" name="auth_token" value="<?php echo $auth_token ?>" />
</fieldset>
<input type="submit" name="submit" />
</form>