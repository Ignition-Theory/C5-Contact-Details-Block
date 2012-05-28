<?php  defined('C5_EXECUTE') or die(_("Access Denied."));

class ContactDetailsPackage extends Package {
	
	protected $pkgHandle = 'contact_details';
	protected $appVersionRequired = '5.5.0';
	protected $pkgVersion = '1.0.0';
	
	public function getPackageName() {
		return t("Contact Details"); 
	}	
	
	public function getPackageDescription() {
		return t('Display organisation or personal contact details. Uses hCard microformat and includes vCard download.');
	}
	
	public function install() {
          $pkg = parent::install();
     
          // install block 
          BlockType::installBlockTypeFromPackage('contact_details', $pkg); 
     }
	
}