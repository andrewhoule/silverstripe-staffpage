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

    public function canCreate($Member = null)
    {
        return true;
    }
    public function canEdit($Member = null)
    {
        return true;
    }
    public function canView($Member = null)
    {
        return true;
    }
    public function canDelete($Member = null)
    {
        return true;
    }

    public function getEditForm($id = null, $fields = null)
    {
        $form=parent::getEditForm($id, $fields);
        if ($this->modelClass=='Staff' && $gridField=$form->Fields()->dataFieldByName($this->sanitiseClassName($this->modelClass))) {
        }
        return $form;
    }
}
