<?php

namespace UnnPortal;

require_once 'login.php';

class UnnStudent
{
	/**
	 * [$username The student's UNN portal username]
	 * @var [string]
	 */
	protected $username;

    /**
	 * [$password The student's UNN portal password]
	 * @var [string]
	 */
	protected $password;

    /**
	 * [$details The student's profile details, gotten from UNN portal]
	 * @var [array]
	 */
	public $details;

	public function __construct($username, $password)
	{
		$this->username=$username;
		$this->password=$password;
	}

	public function login()
	{
		$profile=curlLogin($this->username, $this->password);
        $this->details=getStudentDetails($profile);
	}
    
    public function surname()
	{
		return $this->details['surname'];
	}

	public function middleName()
	{
		return $this->details['middle_name'];
	}

    public function firstName()
	{
		return $this->details['first_name'];
	}

	public function sex()
	{
		return $this->details['sex'];
	}

	public function email()
	{
		return $this->details['email'];
	}

    public function phone()
	{
		return $this->details['mobile'];
	}

	public function mobile()
	{
		return $this->details['mobile'];
	}

    public function regNo()
	{
		return $this->details['matric_no'];
	}

	public function matricNo()
	{
		return $this->details['matric_no'];
	}

	public function entryYear()
	{
		return $this->details['entry_year'];
	}

	public function gradYear()
	{
		return $this->details['grad_year'];
	}

	public function jambNo()
	{
		return $this->details['jamb_no'];
	}

	public function level()
	{
		return $this->details['level'];
	}

    public function department()
	{
		return $this->details['department'];
	}

}
