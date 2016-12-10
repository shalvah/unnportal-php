<?php

namespace UnnPortal;

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
	 * @var [string]
	 */
	protected $details;

	public __construct($username, $password)
	{
		$this->username=$username;
		$this->password=$password;
	}

	public function login()
	{
        $this->details=[];
	}
    
    public function name()
	{
		return $details['name'];
	}

	public function email()
	{
		return $details['email'];
	}

    public function phone()
	{
		return $details['phone'];
	}

    public function regNo()
	{
		return $details['reg_no'];
	}

	public function level()
	{
		return $details['level'];
	}

    public function department()
	{
		return $details['department'];
	}

	public function faculty()
	{
		return $details['faculty'];
	}
}
