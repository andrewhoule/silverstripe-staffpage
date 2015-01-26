<?php 
 
class StaffCategoryPage extends StaffPage { 

  private static $has_one = array(
    'StaffCategory' => 'StaffCategory'
  );

  public function getCMSFields() {
    $fields = parent::getCMSFields();
    $fields->addFieldsToTab("Root.Config", array(
      DropdownField::create('StaffCategoryID')->setTitle('Staff Category')->setEmptyString('Please Select')->setSource(StaffCategory::get()->sort('Title ASC')->map('ID', 'Title'))
    ));
    return $fields;
  }

}
 
class StaffCategoryPage_Controller extends StaffPage_Controller {

  public function StaffCategory() {
    return StaffCategory::get()->byID($this->StaffCategoryID);
  }
    
}