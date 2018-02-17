<p align="center"><img  alt="UNN logo" src ="http://www.unn.edu.ng/wp-content/uploads/2015/03/UNN_Logo.jpg" />
<br><h1 align="center">unnportal-php</h1></p>
 
 <p align="center">PHP library for <a href="https://github.com/shalvah/unn-api">the UNN API</a>
 <br><br><a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="Latest Stable Version" src="https://poser.pugx.org/shalvah/unnportal-api/v/stable"></a> <a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="Total Downloads" src="https://poser.pugx.org/shalvah/unnportal-api/downloads"></a> <a href="https://packagist.org/packages/shalvah/unnportal-api"><img alt="License" src="https://poser.pugx.org/shalvah/unnportal-api/license"></a></p>

Authenticate and get details about your application's users through their unnportal details. With this, you can restrict your app's audience to the right people.

## Usage:
```
<?php

use \UnnPortal\Portal;
use \UnnPortal\PortalException;

require 'vendor/autoload.php';

$username = "2013/1xxxxx";
$password = "xxxxxx";

try {
    $student = Portal::authenticate($username, $password);
    echo "Hi there, $student->first_name from the department of $student->department!";
} catch (PortalException $e) {
    echo $e->getMessage();
}
 ```

The `authenticate` method returns an instance of `\UnnPortal\Student` if successful, or throws a `PortalException` if not.

For a list of available student details, see the documentation at https://github.com/shalvah/unn-api

## Installation:
Run `composer install shalvah/unnportal-api`.

## Contribution
Wanna help improve this package? Thanks! All you need to do:
- Fork the project
- Clone your fork to your local machine
- Make your changes
- Commit your changes and push
- Open a pull request
I'll attend to all PRs as soon as I can!

## If you like this...
Please star and share! Thanks!
