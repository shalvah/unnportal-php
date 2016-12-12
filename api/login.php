<?php

function curlLogin($username, $password)
{
	$ch = curl_init();

	$cookieFile="cookie.txt";
	$userAgent="Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36";

	$siteUrl = "http://unnportal.unn.edu.ng/";
	$loginUrl = "http://unnportal.unn.edu.ng/landing.aspx";
	$profileUrl = "http://unnportal.unn.edu.ng/modules/ProfileDetails/BioData.aspx";

	$f = fopen("log.txt", "w");

	curl_setopt($ch, CURLOPT_URL, $siteUrl);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

	$result = curl_exec($ch);

	$state=htmlExtractValue($result, "id=\"__VIEWSTATE\"");
	$validation=htmlExtractValue($result, "id=\"__EVENTVALIDATION\"");

	$postfields = array(
		'__EVENTVALIDATION' => $validation, 
		'__EVENTARGUMENT' => "",
		'__EVENTTARGET' => "",
		'__VIEWSTATE' => $state,
		'ct100' => 'on',
		'inputUsername' => $username,
		'inputPassword' => $password,
		'login' => 'Login');

	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_VERBOSE, true);
	curl_setopt($ch, CURLOPT_STDERR, $f);

	curl_setopt($ch, CURLOPT_URL, $loginUrl);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postfields));

	$result=curl_exec($ch);

	curl_setOpt($ch, CURLOPT_POST, FALSE);
	curl_setopt($ch, CURLOPT_URL, $profileUrl);   
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); 
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);     

	$result = curl_exec($ch);
	curl_close($ch);
	return $result;
}

function getStudentDetails($profile)
{
	$data=[];

	$dom = new \domDocument;
	$dom->loadHTML($profile);
	$dom->preserveWhiteSpace=false;


	$sex= $dom->getElementById("ctl00_ContentPlaceHolder1_ddlSex");
	if($sex) {
	    $sexValue=domExtractSelectedValue($sex->getElementsByTagName('option'));
	} else {
            throw new UnnPortalException("Invalid username or password");
	}
	
	$dept= $dom->getElementById("ctl00_ContentPlaceHolder1_ddlDepartment");
	$deptValue=domExtractSelectedValue($dept->getElementsByTagName('option'));

	$entryYear= $dom->getElementById("ctl00_ContentPlaceHolder1_ddlEntryYear");
	$entryYearValue=domExtractSelectedValue($entryYear->getElementsByTagName('option'));

	$gradYear= $dom->getElementById("ctl00_ContentPlaceHolder1_ddlGradYear");
	$gradYearValue=domExtractSelectedValue($gradYear->getElementsByTagName('option'));

	$level= $dom->getElementById("ctl00_ContentPlaceHolder1_ddlYearOfStudy");
	$levelValue=domExtractSelectedValue($level->getElementsByTagName('option'));

	$data['sex']=$sexValue;
	$data['department']=$deptValue;
	$data['entry_year']=$entryYearValue;
	$data['grad_year']=$gradYearValue;
	$data['level']=$levelValue;

	$data['surname']=htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtSurname\" type=\"text\"");
	$data['first_name']=htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtFirstname\" type=\"text\"");
	$data['middle_name']=htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtMiddlename\" type=\"text\"");
	$data['mobile'] = htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$wmeMobileno\" type=\"text\"");
	$data['email'] = htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtEmail\" type=\"text\"");
	$data['matric_no']=htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtMatricNo\" type=\"text\"");
	$data['jamb_no']=htmlExtractValue($profile, "<input name=\"ctl00\$ContentPlaceHolder1\$txtJAMBNo\" type=\"text\"");

	return $data;
}

function htmlExtractValue($htmlString, $value)
{
	$str=stristr($htmlString, "$value value=\"");
	$vals=explode('value="', $str);
	return stristr($vals[1], '"', true);
}

function domExtractSelectedValue($nodeList)
{
	for ($i = 0; $i < $nodeList->length; $i++ ) {
		if ($nodeList->item($i)->hasAttribute('selected') 
			&& $nodeList->item($i)->getAttribute('selected') === "selected") {
			return $nodeList->item($i)->nodeValue;
	    }
    }
}


function curlLogout()
{
	$ch = curl_init();

	$cookieFile="cookie.txt";
	$userAgent="Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36";

	$logoutUrl = "http://unnportal.unn.edu.ng/logout_processor.htm";

	$f = fopen("log.txt", "w");

	curl_setopt($ch, CURLOPT_URL, $logoutUrl);
	curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile);
	curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);

	curl_exec($ch);
	curl_close($ch);
}
