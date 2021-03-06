<?php 

class User{

	//nome
	private $name;

	//matricula
	private $reg;

	//e-mail 
	private $email;

	//senha
	private $password;

	//curso
	private $course;

	public function __construct($name,$reg,$email,$password,$course)
	{
		$this->set_name($name);
		$this->set_reg($reg);
		$this->set_email($email);
		$this->set_password($password);
		$this->set_course($course);
	}

	public function get_name()
	{
		return $this->name;
	}

	public function get_reg()
	{
		return $this->reg;
	}

	public function get_email()
	{
		return $this->email;
	}

	public function get_password()
	{
		return $this->password;
	}

	public function get_course()
	{
		return $this->course;
	}

	public function set_name($name)
	{
		$this->name = $name;
	}

	public function set_reg($reg)
	{
		$this->reg = $reg;
	}

	public function set_email($email)
	{
		$this->email = $email;
	}

	public function set_password($password)
	{
		$this->password = $password;
	}

	public function set_course($course)
	{
		$this->course = $course;
	}

}

?>
 