<?php
 
class Staff extends DataObject {
	
	private static $db = array (
		'SortOrder' => 'Int',
		'Prefix' => 'Varchar',
		'FirstName' => 'Varchar',
		'MiddleName' => 'Varchar',
		'LastName' => 'Varchar(',
		'Suffix' => 'Varchar',
		'Email' => 'Text',
		'JobTitle' => 'Text',
		'Bio' => 'HTMLText'
	);
	
	private static $has_one = array (
		'Photo' => 'Image',
		'StaffPage' => 'StaffPage',
		'StaffCategory' => 'StaffCategory'
	);

	private static $summary_fields = array( 
		'Thumbnail' => 'Photo',
    	'FullName' => 'Name',
    	'JobTitle' => 'Job Title',
    	'Email' => 'Email',
    	'Category' => 'Category',
    	'BioExcerpt' => 'Bio'
  	);

  	public static $default_sort = 'SortOrder Asc';

  	public function canCreate($Member = null) { return true; }
	public function canEdit($Member = null) { return true; }
	public function canView($Member = null) { return true; }
	public function canDelete($Member = null) { return true; }
	
	public function getCMSFields() {
		$ImageField = UploadField::create('Photo');
		$ImageField->folderName = 'Staff'; 
		$ImageField->getValidator()->allowedExtensions = array('jpg','jpeg','gif','png');
		if($this->ID == 0) {
			$categorydropdown = TextField::create('CategoryDisclaimer')->setTitle('Category')->setDisabled(true)->setValue('You can assign a category once you have saved the record for the first time.');
		}
		else {
			$categories = StaffCategory::get()->filter("StaffPageID","$this->StaffPageID")->sort("Title ASC");
			$map = $categories ? $categories->map('ID', 'Title', 'Please Select') : array();
			if($map) {
				$categorydropdown = DropdownField::create('StaffCategoryID')->setTitle('Title')->setSource($map);
				$categorydropdown->setEmptyString("-- Please Select --");
			}
			else {
				$categorydropdown = DropdownField::create('StaffCategoryID')->setTitle('Title')->setSource($map);
				$categorydropdown->setEmptyString("There are no categories created yet"); 
			}
		}
		return new FieldList(
			$categorydropdown,
			TextField::create('Prefix')->setTitle('Prefix (ie. Dr, Mr, Ms)'),
			TextField::create('FirstName')->setTitle('First Name'),
			TextField::create('MiddleName')->setTitle('Middle Name'),
			TextField::create('LastName')->setTitle('Last Name'),
			TextField::create('Suffix')->setTitle('Suffix (ie. C.M.)'),
			EmailField::create('Email'),
			TextField::create('JobTitle')->setTitle('Job Title'),
			$ImageField,
			HTMLEditorField::create('Bio')
		);
	}

	public function Category() {
		$title = $this->StaffCategory()->Title;
		if($title != NULL) 
			return $title;
		else 
			return "Other";
	}

	public function Link() {
		return $this->StaffPage()->Link("show") . "/" . $this->ID;
	}

	public function FullName() {
		$prefix = ($this->Prefix) ? $this->Prefix . " " : null;
		$middlename = ($this->MiddleName) ? $this->MiddleName . " " : null;
		$suffix = ($this->Suffix) ? ", " . $this->Suffix : null;
		return $prefix . $this->FirstName . " " . $middlename . $this->LastName . $suffix;
	}

	public function BioExcerpt($length = 300) {
	   	$text = strip_tags($this->Bio);
		$length = abs((int)$length);
		if(strlen($text) > $length) {
			$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
		}
		return $text;
	}
	
	public function ObfuscatedEmail() {
		$email = $this->Email;
		return preg_replace("/@/","(at)",$email); //Replace '@' with '(at)'
	}

	public function Thumbnail() {
		$Image = $this->Photo();
		if($Image) 
			return $Image->CMSThumbnail();
		else 
			return null;
	}

	public function PhotoSized($x=130) {
		 return $this->Photo()->setWidth($x);
	}

	public function getTitle() {
		return $this->FullName();
	}

	public function Meta() {
		if($this->Email || $this->JobTitle) 
			return true;
	}
	
}