<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

class IgtContactDetailsPackage extends Package {
	
	protected $pkgHandle = 'igt_contact_details';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '1.0.1';
	
	public function getPackageName() {
		return t("Contact Details"); 
	}	
	
	public function getPackageDescription() {
		return t('Display organisation or personal contact details. Uses hCard microformat and includes vCard download.');
	}
	
	public function install() {
          $pkg = parent::install();
     
          // install block 
          BlockType::installBlockTypeFromPackage('igt_contact_details', $pkg); 
     }
	
}