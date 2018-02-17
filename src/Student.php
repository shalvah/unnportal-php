<?php

namespace UnnPortal;

/**
 * Class Student
 * @package UnnPortal
 *
 * @property string mobile
 * @property string matric_no
 * @property string entry_year
 * @property string grad_year
 * @property string jamb_no
 * @property string level
 * @property string department
 * @property string surname
 * @property string middle_name
 * @property string first_name
 * @property string email
 * @property string sex
 *
 */
class Student
{

    /**
	 * The student's profile details, gotten from UNN portal
	 * @var array
	 */
	public $details;

	public function __construct(array $details)
	{
		$this->details = $details;
	}

	public function __get($name)
    {
        return $this->details[$name];
    }
}
