<?php
require_once('DB.class.php');
class User
{
	var $name;
	var $passwordHash;
	var $userid;
	public function User($name,$password)
	{
		DB::conn();
		$this->name = mysql_real_escape_string($name);
		$this->passwordHash = sha1($password);
	}
	public function create()
	{
		$sql = sprintf("INSERT INTO users (username,password) VALUES ('%s','%s');",
				$this->name,
				$this->passwordHash);
		$result = DB::query($sql);
		$this->read();
		echo(mysql_error());
		return $result;
	}
	public function read()
	{
		$sql = sprintf("SELECT id,username FROM users WHERE username='%s' AND password='%s';",
				$this->name,
				$this->passwordHash);
		$result = mysql_query($sql);
		if(mysql_num_rows($result))
		{
			$row = mysql_fetch_assoc($result);
			$this->name = $row['username'];
			$this->userid = $row['id'];
			return true;
		}
		else
			return false;
	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
}