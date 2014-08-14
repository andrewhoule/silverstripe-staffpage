<?php
 
class StaffCategory extends DataObject {
	
	private static $db = array (
		'SortID' => 'Int',
		'Title' => 'Varchar(75)',
		'Description' => 'HTMLText'
	);
	
	private static $has_one = array (
		'StaffPage' => 'StaffPage'
	);

	private static $has_many = array (
		"Staff" => "Staff"
	);

	private static $summary_fields = array (
		'Title' => 'Title',
		'DescriptionExcerpt' => 'Description'
   );

   public function canCreate($Member = null) { return true; }
	public function canEdit($Member = null) { return true; }
	public function canView($Member = null) { return true; }
	public function canDelete($Member = null) { return true; }

   private static $default_sort = 'SortID Asc';
	
	public function getCMSFields() {
		return new FieldList(
			TextField::create("Title"),
			HTMLEditorField::create("Description")
		);
	}

	public function DescriptionExcerpt($length = 300) {
	   	$text = strip_tags($this->Description);
		$length = abs((int)$length);
		if(strlen($text) > $length) {
			$text = preg_replace("/^(.{1,$length})(\s.*|$)/s", '\\1...', $text);
		}
		return $text;
	}
	
}