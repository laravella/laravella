<?php

use Laravella\Crud\CrudSeeder;

class PostCrudSeeder extends CrudSeeder {

    /**
     * 
     * @param type $tableName
     * @param type $actionName
     * @param type $viewName
     */
    public function tableActionViewId($tableName, $actionName, $viewName) {
        $tableId = $this->getId('_db_tables', 'name', $tableName);
        $actionId = $this->getId('_db_actions', 'name', $actionName);
        $viewId = $this->getId('_db_views', 'name', $viewName);
        
        $recs = DB::table('_db_pages')->where('table_id', $tableId)
                ->where('action_id', $actionId)
                ->where('view_id', $viewId);
        return $recs;
    }
    
    public function run()
    {
        // change table titles in select lists
        //crud
        //$this->setTitle($slug, $title);
        $this->setTitle('_db_severities_getSelect', 'Severities');
        $this->setTitle('_db_pages_getSelect', 'Pages');
        $this->setTitle('_db_tables_getSelect', 'Tables');
        $this->setTitle('_db_user_permissions_getSelect', 'User Permissions');
        $this->setTitle('_db_usergroup_permissions_getSelect', 'Usergroup Permissions');
        $this->setTitle('_db_views_getSelect', 'Views');
        $this->setTitle('_db_widget_types_getSelect', 'Widget Types');
        $this->setTitle('_db_actions_getSelect', 'Actions');
        $this->setTitle('_db_audit_getSelect', 'Audit');
        $this->setTitle('_db_display_types_getSelect', 'Display Types');
        $this->setTitle('_db_fields_getSelect', 'Fields');
        $this->setTitle('_db_logs_getSelect', 'Logs');
        $this->setTitle('_db_menu_permissions_getSelect', 'Menu Permissions');
        $this->setTitle('_db_menus_getSelect', 'Menus');
        $this->setTitle('_db_option_types_getSelect', 'Option Types');
        $this->setTitle('_db_options_getSelect', 'Options');
        $this->setTitle('_db_keys_getSelect', 'Keys');
        $this->setTitle('_db_key_fields_getSelect', 'Key Fields');
        $this->setTitle('_db_key_types_getSelect', 'Key Types');
        //cms
        $this->setTitle('medias_getSelect', 'Media');
        $this->setTitle('contents_getSelect', 'Content');
        $this->setTitle('mcollections_getSelect', 'Media Collections');
        $this->setTitle('galleries_getSelect', 'Galleries');
        $this->setTitle('users_getSelect', 'Users');
        $this->setTitle('usergroups_getSelect', 'User Groups');
        $this->setTitle('categories_getSelect', 'Categories');
        
        //hide fields
        $nodisplayId = $this->getId('_db_display_types', 'name', 'nodisplay');
        
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.content_mime_type'), array('display_type_id'=>$nodisplayId));
        
        $widgetId = $this->getId('_db_display_types', 'name', 'widget');
        $checkboxId = $this->getId('_db_widget_types', 'name', 'input:checkbox');
        $this->updateOrInsert('_db_fields', array('fullname'=>'medias.approved'), array('display_type_id'=>$widgetId, 'widget_type_id'=>$checkboxId));
        $this->updateOrInsert('_db_fields', array('fullname'=>'medias.publish'), array('display_type_id'=>$widgetId, 'widget_type_id'=>$checkboxId));
        
        //change field titles
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.lang'), array('label'=>'Language'));
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.title'), array('display_order'=>'0'));

        $ugId = $this->getId('usergroups', 'group', 'admin');
        
        $mId = $this->getId('_db_menus', 'label', 'Meta Data');
        $this->delete('_db_menu_permissions', array('usergroup_id'=>$ugId, 'menu_id'=>$mId));
        
        $mId = $this->getId('_db_menus', 'label', 'Menus');
        $this->delete('_db_menu_permissions', array('usergroup_id'=>$ugId, 'menu_id'=>$mId));
        
        
    }

}