<?php 
 
class StaffPage extends Page {

  private static $db = array(
    'AfterContent' => 'HTMLText',
    'ThumbnailHeight' => 'Int',
    'ThumbnailWidth' => 'Int',
    'PhotoFullHeight' => 'Int',
    'PhotoFullWidth' => 'Int',
    'DisableFullProfileLink' => 'Boolean'
  );

  private static $has_one = array (
    'DefaultStaffPhoto' => 'Image'
  );

  private static $defaults = array(
    'ThumbnailHeight' => '150',
    'ThumbnailWidth' => '150',
    'PhotoFullHeight' => '400',
    'PhotoFullWidth' => '400',
    'DisableFullProfileLink' => false
  );
    
  private static $icon = 'staff/images/staffpage';
    
  public function getCMSFields() {
    $DefaultStaffPhotoField = UploadField::create('DefaultStaffPhoto')->setTitle('Default Photo')->setDescription('Only used if individual staff photo is left empty');
    $DefaultStaffPhotoField->folderName = 'Staff'; 
    $DefaultStaffPhotoField->getValidator()->allowedExtensions = array('jpg','jpeg','gif','png');
    $fields = parent::getCMSFields();
    $fields->addFieldToTab('Root.Main', HTMLEditorField::create('AfterContent')->setTitle('Content After Staff'),'Metadata');
    $fields->addFieldToTab('Root.Config', $DefaultStaffPhotoField);
    $fields->addFieldToTab('Root.Config', SliderField::create('ThumbnailWidth','Photo Thumbnail Width',50,400));
    $fields->addFieldToTab('Root.Config', SliderField::create('ThumbnailHeight','Photo Thumbnail Height',50,400));
    $fields->addFieldToTab('Root.Config', SliderField::create('PhotoFullWidth','Photo Fullsize Width',100,1200));
    $fields->addFieldToTab('Root.Config', SliderField::create('PhotoFullHeight','Photo Fullsize Height',100,1200));
    $fields->addFieldToTab('Root.Config', CheckboxField::create('DisableFullProfileLink')->setTitle('Disable Full Profile Link')->setDescription('Staff names won\'t be linked to their full profiles'));
    return $fields;
  }
 
}
 
class StaffPage_Controller extends Page_Controller {

  public static function load_requirements() {
    Requirements::javascript("staff/js/functions.staffpage.js");
  }

  public function init() {
    parent::init();
    self::load_requirements();
  }

  private static $allowed_actions = array(
    'show'
  );
    
  public function getStaff() {
    $Params = $this->getURLParams();
    if(is_numeric($Params['ID']) && $Staff = Staff::get()->byID((int)$Params['ID'])) {
      return $Staff;
    }
  }

  public function show() {       
    if($Staff = $this->getStaff()) {
      $Data = array(
        'Staff' => $Staff
      );
      return $this->Customise($Data);
    }
    else {
      return $this->httpError(404, 'Sorry that staff member could not be found');
    }
  }

  public function StaffCategories() {
    $staffcategoriesfiltered = new ArrayList();
    $staffcategories = StaffCategory::get();
    if($staffcategories) {
      foreach($staffcategories AS $staffcategory) {
        if($staffcategory->getComponents('Staff')->count() > 0) {
          $staffcategoriesfiltered->push($staffcategory); 
        }
      }
    }
    return $staffcategoriesfiltered;
  }

  public function UncategorizedStaff() {
    $uncategorizedstaffmembers = new ArrayList();
    $staffmembers = Staff::get();
    if($staffmembers) {
      foreach($staffmembers AS $staff) {
        if($staff->Category() == "Other") {
          $uncategorizedstaffmembers->push($staff); 
        }
      }
    }
    return $uncategorizedstaffmembers;
  }

  public function MoreThanOneStaffCategory() {
    if(StaffCategory::get()->count() > 0)
      return true;
  }

  public function HasProfileLink() {
    if($this->DisableFullProfileLink != 1) 
      return true;
  }
    
}