<p align="center"><img  alt="UNN logo" src ="http://www.unn.edu.ng/wp-content/uploads/2015/03/UNN_Logo.jpg" />
<br><h1 align="center">unnportal-php</h1></p>
 
 <p align="center">PHP library for <a href="https://github.com/shalvah/unn-api">the UNN API</a>
 <br><br><a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="Latest Stable Version" src="https://poser.pugx.org/shalvah/unnportal-api/v/stable"></a> <a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="Total Downloads" src="https://poser.pugx.org/shalvah/unnportal-api/downloads"></a> <a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="License" src="https://poser.pugx.org/shalvah/unnportal-api/license"></a></p>

Authenticate and get details about your application's users through their unnportal details. With this, you can restrict your app's audience to the right people.

## Sample:
```
use \UnnPortal\UnnStudent;
use \UnnPortal\UnnPortalException;

$username = "201x/1xxxxx";
$password = "xxxxxx";

$student = new UnnStudent($username, $password);
try {
  $student->login();
  echo $student->surname()." ".$student->firstName()." is in ".$student->level);
  if($student->sex() == "Male" && $student->department() == "POLITICAL SCIENCE") {
    echo "You've passed the test!";
  }
  $student->logout();
 } catch (UnnPortalException $e) {
   echo $e->getMessage();
 }
 ```

## Available Details
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
$student->level(); //returns a string such as "200 LEVEL" in CAPS
```
## Installation:
Add to your `composer.json`:
```
"require": {
        "shalvah/unnportal-api": "^1.0.0"
    }
```
Run `composer install`.

## Bugs or security vulnerabilities
If you discover any bugs or security vulnerabilities, please contact me at shalvah.adebayo@gmail.com or open an issue.

## Contribution
You wanna help improve this package? Thanks! All you need to do:
- Fork the project
- Clone your fork to your local machine
- Make your changes
- Commit your changes and push
- Open a pull request
I'll attend to all PRs as soon as I can!

## If you like this...
Please star and share! Thanks!

## Disclaimer (Yup, just to be safe)
I am in no way liable for how this work is used. 
