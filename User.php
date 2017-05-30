<?php 

class User{

	//nome
	private $name;

	//matricula
	private $id;

	//e-mail 
	private $email;

	//senha
	private $password;

	//curso
	private $course;

	public function __construct($name,$id,$email,$password,$course)
	{
		$this->set_name($name);
		$this->set_id($id);
		$this->set_email($email);
		$this->set_password($password);
		$this->set_course($course);
	}

	public function get_name()
	{
		return $this->$name;
	}

	public function get_id()
	{
		return $this->$id;
	}

	public function get_email()
	{
		return $this->$email;
	}

	public function get_password()
	{
		return $this->$password;
	}

	public function get_course()
	{
		return $this->$course;
	}

	public function set_name($name)
	{
		$this->name = $name;
	}

	public function set_id($id)
	{
		$this->id = $id;
	}

	public function set_email($email)
	{
		$this->email = $email;
	}

	public function set_password($password)
	{
		$this->password = md5($password);
	}

	public function set_course($course)
	{
		$this->course = $course;
	}

}

?>
 