<?php 
 
class StaffPage extends Page {
	
   	private static $has_many = array (
		'Staff' => 'Staff',
        'StaffCategories' => 'StaffCategory'
	);
	
	private static $icon = 'staffpage/images/staffpage';
	
	public function getCMSFields() {
		$fields = parent::getCMSFields();
		$StaffGridField = new GridField(
            'Staff',
            'Staff',
            $this->Staff(),
            GridFieldConfig::create()
                ->addComponent(new GridFieldToolbarHeader())
                ->addComponent(new GridFieldAddNewButton('toolbar-header-right'))
                ->addComponent(new GridFieldSortableHeader())
                ->addComponent(new GridFieldDataColumns())
                ->addComponent(new GridFieldPaginator(50))
                ->addComponent(new GridFieldEditButton())
                ->addComponent(new GridFieldDeleteAction())
                ->addComponent(new GridFieldDetailForm())
                ->addComponent(new GridFieldFilterHeader())
                ->addComponent(new GridFieldSortableRows('SortOrder'))
        );
        $fields->addFieldToTab("Root.Staff", $StaffGridField);
        $StaffCategoriesGridField = new GridField(
            'StaffCategories',
            'Category',
            $this->StaffCategories(),
            GridFieldConfig::create()
                ->addComponent(new GridFieldToolbarHeader())
                ->addComponent(new GridFieldAddNewButton('toolbar-header-right'))
                ->addComponent(new GridFieldSortableHeader())
                ->addComponent(new GridFieldDataColumns())
                ->addComponent(new GridFieldPaginator(50))
                ->addComponent(new GridFieldEditButton())
                ->addComponent(new GridFieldDeleteAction())
                ->addComponent(new GridFieldDetailForm())
                ->addComponent(new GridFieldFilterHeader())
                ->addComponent(new GridFieldSortableRows('SortID'))
        );
        $fields->addFieldToTab("Root.Categories", $StaffCategoriesGridField);
		return $fields;
	}
}
 
class StaffPage_Controller extends Page_Controller {

    public function init() {
        parent::init();
        self::load_requirements();
    }

    public static function load_requirements() {
        Requirements::javascript("staffpage/js/functions.staffpage.js");
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
        $staffcategories = $this->getComponents('StaffCategories');
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
        $staffmembers = $this->getComponents('Staff');
        if($staffmembers) {
            foreach($staffmembers AS $staffmember) {
                if($staffmember->Category() == "Other") {
                    $uncategorizedstaffmembers->push($staffmember); 
                }
            }
        }
        return $uncategorizedstaffmembers;
    }

    public function MoreThanOneStaffCategory() {
        if($this->StaffCategories()->count() > 1)
            return true;
    }
	
}