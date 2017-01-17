<?php

class StaffAdmin extends ModelAdmin
{

    private static $managed_models = array(
        'Staff',
        'StaffCategory'
    );

    private static $url_segment = 'staff';

    private static $menu_title = 'Staff';

    private static $menu_icon = 'staff/images/staffadmin-file.png';

    public function getEditForm($id = null, $fields = null)
    {
        $form=parent::getEditForm($id, $fields);
        if ($this->modelClass=='Staff' && $gridField=$form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass))) {
        }
        if($gridField instanceof GridField) {
            $gridField->getConfig()->addComponent(new GridFieldSortableRows('SortOrder'));
        }
        return $form;
    }
}
