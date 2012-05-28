<?php  defined('C5_EXECUTE') or die("Access Denied.");

/*
* Filename.......: vcard_example.php
* Author.........: Troy Wolf [troy@troywolf.com]
* Last Modified..: 2005/07/14 13:30:00
* Description....: An example of using Troy Wolf's class_vcard.
*/

/*
Modify the path according to your system.
*/

/*
* Filename.......: class_vcard.php
* Author.........: Troy Wolf [troy@troywolf.com]
* Last Modified..: 2005/07/14 13:30:00
* Description....: A class to generate vCards for contact data.
*/
class vcard {
	var $log;
	var $data;  //array of this vcard's contact data
	var $filename; //filename for download file naming
	var $class; //PUBLIC, PRIVATE, CONFIDENTIAL
	var $revision_date;
	var $card;
	
	/*
	The class constructor. You can set some defaults here if desired.
	*/
	function vcard() {
		$this->log = "New vcard() called<br />";
		$this->data = array(
			"display_name"=>null
			,"first_name"=>null
			,"last_name"=>null
			,"additional_name"=>null
			,"name_prefix"=>null
			,"name_suffix"=>null
			,"nickname"=>null
			,"title"=>null
			,"role"=>null
			,"department"=>null
			,"company"=>null
			,"work_po_box"=>null
			,"work_extended_address"=>null
			,"work_address"=>null
			,"work_city"=>null
			,"work_state"=>null
			,"work_postal_code"=>null
			,"work_country"=>null
			,"home_po_box"=>null
			,"home_extended_address"=>null
			,"home_address"=>null
			,"home_city"=>null
			,"home_state"=>null
			,"home_postal_code"=>null
			,"home_country"=>null
			,"tel1_type"=>null
			,"tel1_number"=>null
			,"tel2_type"=>null
			,"tel2_number"=>null
			,"email1"=>null
			,"email2"=>null
			,"url"=>null
			,"photo"=>null
			,"birthday"=>null
			,"timezone"=>null
			,"sort_string"=>null
			,"note"=>null
		);
		return true;
	}

	/*
	build() method checks all the values, builds appropriate defaults for
	missing values, generates the vcard data string.
	*/  
	function build() {
		$this->log .= "vcard build() called<br />";
		/*
		For many of the values, if they are not passed in, we set defaults or
		build them based on other values.
		*/
		if (!$this->class) { $this->class = "PUBLIC"; }
		if (!$this->data['display_name']) {
			$this->data['display_name'] = trim($this->data['first_name']." ".$this->data['last_name']);
		}
		if (!$this->data['sort_string']) { $this->data['sort_string'] = $this->data['last_name']; }
		if (!$this->data['sort_string']) { $this->data['sort_string'] = $this->data['company']; }
		if (!$this->data['timezone']) { $this->data['timezone'] = date("O"); }
		if (!$this->revision_date) { $this->revision_date = date('Y-m-d H:i:s'); }
	
		$this->card = "BEGIN:VCARD\r\n";
		$this->card .= "VERSION:3.0\r\n";
		$this->card .= "CLASS:".$this->class."\r\n";
		$this->card .= "PRODID:-//class_vcard from TroyWolf.com//NONSGML Version 1//EN\r\n";
		$this->card .= "REV:".$this->revision_date."\r\n";
		$this->card .= "FN:".$this->data['display_name']."\r\n";
		$this->card .= "N:"
		.$this->data['last_name'].";"
		.$this->data['first_name'].";"
		.$this->data['additional_name'].";"
		.$this->data['name_prefix'].";"
		.$this->data['name_suffix']."\r\n";
		if ($this->data['nickname']) { $this->card .= "NICKNAME:".$this->data['nickname']."\r\n"; }
		if ($this->data['title']) { $this->card .= "TITLE:".$this->data['title']."\r\n"; }
		if ($this->data['company']) { $this->card .= "ORG:".$this->data['company']; }
		if ($this->data['department']) { $this->card .= ";".$this->data['department']; }
		$this->card .= "\r\n";
		
		if ($this->data['work_po_box']
		|| $this->data['work_extended_address']
		|| $this->data['work_address']
		|| $this->data['work_city']
		|| $this->data['work_state']
		|| $this->data['work_postal_code']
		|| $this->data['work_country']) {
			$this->card .= "ADR;TYPE=work:"
			.$this->data['work_po_box'].";"
			.$this->data['work_extended_address'].";"
			.$this->data['work_address'].";"
			.$this->data['work_city'].";"
			.$this->data['work_state'].";"
			.$this->data['work_postal_code'].";"
			.$this->data['work_country']."\r\n";
		}
		if ($this->data['home_po_box']
		|| $this->data['home_extended_address']
		|| $this->data['home_address']
		|| $this->data['home_city']
		|| $this->data['home_state']
		|| $this->data['home_postal_code']
		|| $this->data['home_country']) {
			$this->card .= "ADR;TYPE=home:"
			.$this->data['home_po_box'].";"
			.$this->data['home_extended_address'].";"
			.$this->data['home_address'].";"
			.$this->data['home_city'].";"
			.$this->data['home_state'].";"
			.$this->data['home_postal_code'].";"
			.$this->data['home_country']."\r\n";
		}
		if ($this->data['email1']) { $this->card .= "EMAIL;TYPE=internet,pref:".$this->data['email1']."\r\n"; }
		if ($this->data['email2']) { $this->card .= "EMAIL;TYPE=internet:".$this->data['email2']."\r\n"; }
		
		if ($this->data['tel1_number']) { $this->card .= "TEL;TYPE=" . $this->data['tel1_type'] .",voice:".$this->data['tel1_number']."\r\n"; }
		if ($this->data['tel2_number']) { $this->card .= "TEL;TYPE=" . $this->data['tel2_type'] .",voice:".$this->data['tel2_number']."\r\n"; }
		
		if ($this->data['url']) { $this->card .= "URL;TYPE=work:".$this->data['url']."\r\n"; }
		if ($this->data['birthday']) { $this->card .= "BDAY:".$this->data['birthday']."\r\n"; }
		if ($this->data['role']) { $this->card .= "ROLE:".$this->data['role']."\r\n"; }
		if ($this->data['note']) { $this->card .= "NOTE:".$this->data['note']."\r\n"; }
		$this->card .= "TZ:".$this->data['timezone']."\r\n";
		$this->card .= "END:VCARD\r\n";
	}
  
	/*
	download() method streams the vcard to the browser client.
	*/
	function download() {
	$this->log .= "vcard download() called<br />";
	if (!$this->card) { $this->build(); }
	if (!$this->filename) { $this->filename = trim($this->data['display_name']); }
	$this->filename = str_replace(" ", "_", $this->filename);
		header("Content-type: text/directory");
		header("Content-Disposition: attachment; filename=".$this->filename.".vcf");
		header("Pragma: public");
		echo $this->card;
	return true;
	}
}


/*
Instantiate a new vcard object.
*/
$vc = new vcard();

/*
filename is the name of the .vcf file that will be sent to the user if you
call the download() method. If you leave this blank, the class will 
automatically build a filename using the contact's data.
*/
#$vc->filename = "";

/*
If you leave this blank, the current timestamp will be used.
*/
#$vc->revision_date = "";

/*
Possible values are PUBLIC, PRIVATE, and CONFIDENTIAL. If you leave class
blank, it will default to PUBLIC.
*/
#$vc->class = "PUBLIC";

if ($_GET['cardType'] == 0 ) {

	if (!empty($_GET['orgName'])) {
		$vc->data['display_name'] = $_GET['orgName'];
		$vc->data['company'] = $_GET['orgName'];
	}
	
	if (!empty($_GET['category'])) {
		$vc->data['department'] = $_GET['category'];
	}


} elseif ($_GET['cardType'] == 1 ) {

	$vc->data['display_name'] = "";

	if (!empty($_GET['honorificName'])) {
		$vc->data['name_prefix'] = $_GET['honorificName'];  //Mr. Mrs. Dr.
	}
	
	if (!empty($_GET['firstName'])) {
		$vc->data['first_name'] = $_GET['firstName'];
	}
	
	if (!empty($_GET['midName'])) {
		$vc->data['additional_name'] = $_GET['midName']; ; //Middle name
	}
	
	if (!empty($_GET['lastName'])) {
		$vc->data['last_name'] = $_GET['lastName'];
	}
	
	if (!empty($_GET['honorificSuffixName'])) {
		$vc->data['name_suffix'] = $_GET['honorificSuffixName']; //DDS, MD, III, other designations.
	}
	
	
	if (!empty($_GET['role'])) {
	$vc->data['title'] = $_GET['role'];
	}
	
}



/*
Contact's name data.
If you leave display_name blank, it will be built using the first and last name.
*/
#$vc->data['display_name'] = "";

#$vc->data['nickname'] = "TJ";

/*
Contact's company, department, title, profession
*/


	


#$vc->data['role'] = "";

/*
Contact's work address
*/
#$vc->data['work_po_box'] = "";
#$vc->data['work_extended_address'] = "";
if (!empty($_GET['addressStreet'])) {
	$vc->data['work_address'] = $_GET['addressStreet'];
}

if (!empty($_GET['addressCity'])) {
	$vc->data['work_city'] = $_GET['addressCity'];
}

if (!empty($_GET['addressCounty'])) {
	$vc->data['work_state'] = $_GET['addressCounty'];
}

if (!empty($_GET['addressCode'])) {
	$vc->data['work_postal_code'] = $_GET['addressCode'];
}
#$vc->data['work_country'] = "United States of America";

/*
Contact's home address
*/
#$vc->data['home_po_box'] = "";
#$vc->data['home_extended_address'] = "";
#$vc->data['home_address'] = "7027 N. Hickory";
#$vc->data['home_city'] = "Kansas City";
#$vc->data['home_state'] = "MO";
#$vc->data['home_postal_code'] = "64118";
#$vc->data['home_country'] = "United States of America";

/*
Contact's telephone numbers.
*/

if (!empty($_GET['phoneNumber1'])) {
	$vc->data['tel1_type'] = $_GET['phoneType1'];
	$vc->data['tel1_number'] = $_GET['phoneNumber1'];
}

	
if (!empty($_GET['phoneNumber2'])) {
	$vc->data['tel2_type'] = $_GET['phoneType2'];
	$vc->data['tel2_number'] = $_GET['phoneNumber2'];
}

#$vc->data['home_tel'] = "";
#$vc->data['cell_tel'] = $_GET['phoneNumber2'];
#$vc->data['fax_tel'] = "";
#$vc->data['pager_tel'] = "";

/*
Contact's email addresses
*/
$vc->data['email1'] = $_GET['email'];
#$vc->data['email2'] = "";

/*
Contact's website
*/
#$vc->data['url'] = "http://www.troywolf.com";

/*
Some other contact data.
*/
#$vc->data['photo'] = "";  //Enter a URL.
#$vc->data['birthday'] = "1971-08-13";
#$vc->data['timezone'] = "-06:00";

/*
If you leave this blank, the class will default to using last_name or company.
*/
#$vc->data['sort_string'] = "";

/*
Notes about this contact.
*/
#$vc->data['note'] = "Troy is an amazing guy!";

/*
Generate card and send as a .vcf file to user's browser for download.
*/
$vc->download();


?>
