# unnportal-php
Authenticate and get details about your application's users through their unnportal details.

This is a PHP package that provides an unofficial API for the University of Nigeria student portal located at http://unnportal.unn.edu.ng

# Usage:
Add to your `composer.json`:
```
require": {
        "shalvah/unnportal-api": "^1.0.0"
    }
```

Sample:
```
use \UnnPortal\UnnStudent;

$username = "201x/1xxxxx";
$password = "xxxxxx";

$student = new UnnStudent($username, $password);
$student->login();
echo $student->surname()." ".$student->firstName()." is in ".$student->level);
$student->logout();
```

If the login fails, an instance of `UnnPortal\UnnPortalException` will be thrown.

# Use Cases
*. You're building an application which you want to be available only to UNN students.

```
try{
    $student->login();
} catch (UnnPortalException $e) {
   echo "Please enter correct UNN login details.";
}
```
You could even add email verification to it.

*. You're building an application which you want to be available only to **certain** UNN students eg males in Political Science:

```
if($student->sex() == "Male" && $student->department() == "POLITICAL SCIENCE") {
    //allow them through
}
```

# Available Details
```
$student->surname(); //returns a string in CAPS
$student->firstName(); //returns a string in CAPS
$student->middleName(); //returns a string in CAPS
$student->sex(); //returns either "Male" or "Female" (note the capitals)
$student->phone() OR mobile(); //returns a string of digits
$student->email(); //returns a string in CAPS
$student->matricNo() OR regNo(); //returns a numeric string
$student->jambNo(); //returns an alphanumeric string in CAPS
$student->entryYear(); //returns a numeric string such as "2013-2014"
$student->gradYear(); //returns a numeric string such as "2019-2020"
$student->department(); //returns a string in CAPS
$student->level); //returns a string such as "200 LEVEL" in CAPS
```

# Disclaimer
I, Shalvah Adebayo, am in no way liable for how this work is used. 
You are required to abide by the terms of the included MIT license.
In addition, you are to properly educate your users on which of their data you can access and what you will use it for. Please STORE NO LOGIN DETAILS.
