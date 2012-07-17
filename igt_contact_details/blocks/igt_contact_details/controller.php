<?php  defined('C5_EXECUTE') or die("Access Denied.");

class IgtContactDetailsBlockController extends BlockController {
	
	protected $btName = 'Contact Details';
	protected $btDescription = 'A block for your contact details. Utilises the hCard micro format for better SEO.';
	protected $btTable = 'btIgtContactDetails';
	
	protected $btInterfaceWidth = "700";
	protected $btInterfaceHeight = "450";
	protected $btWrapperClass = 'ccm-ui';
	
	protected $btCacheBlockRecord = true;
	protected $btCacheBlockOutput = true;
	protected $btCacheBlockOutputOnPost = true;
	protected $btCacheBlockOutputForRegisteredUsers = false;
	protected $btCacheBlockOutputLifetime = CACHE_LIFETIME;
	
	public function getSearchableContent() {
		return $this->orgName;
		return $this->firstName;
		return $this->midName;
		return $this->lastName;
		return $this->category;
		return $this->role;
		
	}
	
	public function generateDownloadLink() {

		$uh = Loader::helper('concrete/urls');
		
		
		$b = $this->getBlockObject();
		$btID = $b->getBlockTypeID();
		$bt = BlockType::getByID($btID);

		$url = $uh->getBlockTypeToolsURL($bt) . "/generate_vcard.php?";
		
		$url .= "cardType=" . $this->cardType . "&";
		$url .= "orgName=" . $this->orgName . "&";
		$url .= "firstName=" . $this->firstName . "&";
		$url .= "midName=" . $this->midName . "&";
		$url .= "lastName=" . $this->lastName . "&";
		$url .= "honorificName=" . $this->honorificName . "&";
		$url .= "honorificSuffixName=" . $this->honorificSuffixName . "&";
		
		$url .= "role=" . $this->role . "&";
		$url .= "category=" . $this->category . "&";
						
		$url .= "phoneType1=" . $this->phoneType1 . "&";
		$url .= "phoneNumber1=" . $this->phoneNumber1 . "&";
		$url .= "phoneType2=" . $this->phoneType2 . "&";
		$url .= "phoneNumber2=" . $this->phoneNumber2 . "&";
		
		$url .= "email=" . $this->email . "&";

		$url .= "addressStreet=" . $this->addressStreet . "&";
		$url .= "addressCity=" . $this->addressCity . "&";
		$url .= "addressCounty=" . $this->addressCounty . "&";
		$url .= "addressCode=" . $this->addressCode;

		return $url;
		
	}
	
	
	function save($data) { 
		$data['vcardDownload'] = ($data['vcardDownload']==1) ? 1 : 0;
		parent::save($data);
	}
	
	/*
	public function getRssUrl($b, $tool = 'rss'){
			$uh = Loader::helper('concrete/urls');
			if(!$b) return '';
			$btID = $b->getBlockTypeID();
			$bt = BlockType::getByID($btID);
			$c = $b->getBlockCollectionObject();
			$a = $b->getBlockAreaObject();
			$rssUrl = $uh->getBlockTypeToolsURL($bt)."/" . $tool . "?bID=".$b->getBlockID()."&amp;cID=".$c->getCollectionID()."&amp;arHandle=" . $a->getAreaHandle();
			return $rssUrl;
		}
	*/
}
