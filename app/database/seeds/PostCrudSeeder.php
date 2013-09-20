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
        
        $recs = DB::table('_db_table_action_views')->where('table_id', $tableId)
                ->where('action_id', $actionId)
                ->where('view_id', $viewId);
        return $recs;
    }
    
    public function run()
    {
        // change table titles in select lists
        //crud
        $this->tableActionViewId('_db_severities', 'getSelect', 'crud::dbview')->update(array('title'=>'Severities'));
        $this->tableActionViewId('_db_table_action_views', 'getSelect', 'crud::dbview')->update(array('title'=>'Table Action Views'));
        $this->tableActionViewId('_db_tables', 'getSelect', 'crud::dbview')->update(array('title'=>'Tables'));
        $this->tableActionViewId('_db_user_permissions', 'getSelect', 'crud::dbview')->update(array('title'=>'User Permissions'));
        $this->tableActionViewId('_db_usergroup_permissions', 'getSelect', 'crud::dbview')->update(array('title'=>'Usergroup Permissions'));
        $this->tableActionViewId('_db_views', 'getSelect', 'crud::dbview')->update(array('title'=>'Views'));
        $this->tableActionViewId('_db_widget_types', 'getSelect', 'crud::dbview')->update(array('title'=>'Widget Types'));
        $this->tableActionViewId('_db_actions', 'getSelect', 'crud::dbview')->update(array('title'=>'Actions'));
        $this->tableActionViewId('_db_audit', 'getSelect', 'crud::dbview')->update(array('title'=>'Audit'));
        $this->tableActionViewId('_db_display_types', 'getSelect', 'crud::dbview')->update(array('title'=>'Display Types'));
        $this->tableActionViewId('_db_fields', 'getSelect', 'crud::dbview')->update(array('title'=>'Fields'));
        $this->tableActionViewId('_db_logs', 'getSelect', 'crud::dbview')->update(array('title'=>'Logs'));
        $this->tableActionViewId('_db_menu_permissions', 'getSelect', 'crud::dbview')->update(array('title'=>'Menu Permissions'));
        $this->tableActionViewId('_db_menus', 'getSelect', 'crud::dbview')->update(array('title'=>'Menus'));
        $this->tableActionViewId('_db_option_types', 'getSelect', 'crud::dbview')->update(array('title'=>'Option Types'));
        $this->tableActionViewId('_db_options', 'getSelect', 'crud::dbview')->update(array('title'=>'Options'));
        //cms
        $this->tableActionViewId('medias', 'getSelect', 'crud::dbview')->update(array('title'=>'Media'));
        $this->tableActionViewId('contents', 'getSelect', 'crud::dbview')->update(array('title'=>'Content'));
        $this->tableActionViewId('mcollections', 'getSelect', 'crud::dbview')->update(array('title'=>'Media Collections'));
        $this->tableActionViewId('galleries', 'getSelect', 'crud::dbview')->update(array('title'=>'Galleries'));
        $this->tableActionViewId('users', 'getSelect', 'crud::dbview')->update(array('title'=>'Users'));
        $this->tableActionViewId('usergroups', 'getSelect', 'crud::dbview')->update(array('title'=>'User Groups'));
        
        //hide fields
        $nodisplayId = $this->getId('_db_display_types', 'name', 'nodisplay');
        
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.content_mime_type'), array('display_type_id'=>$nodisplayId));
        
        //change field titles
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.lang'), array('label'=>'Language'));
        $this->updateOrInsert('_db_fields', array('fullname'=>'contents.title'), array('display_order'=>'0'));
        
    }

}