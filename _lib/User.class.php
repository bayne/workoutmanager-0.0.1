<?php
require_once('DB.class.php');
class User
{
	private $name;
	private $passwordHash;
	private $userid;
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
		$this->userid = $result[0];
		return $result;
	}
	public function update()
	{
		
	}
	public function delete()
	{
		
	}
}