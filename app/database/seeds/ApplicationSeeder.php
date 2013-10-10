<?php

use Laravella\Crud\CrudSeeder;

class ApplicationSeeder extends CrudSeeder {

    public function run()
    {
        /**
         * Change the title of a page (the junction between a view, a table and an action)
         * 
         * $tableName = an instance of the database field _db_tables.name
         * $action = an instance of the database field _db_actions.name e.g. 'getSelect', 'getEdit' etc.
         * $view = an instance of the database field _db_views.name e.g. 'crud::dbview'
         * $title = the new title of the page
         * 
         * $this->tableActionViewId($tableName, $action, 'crud::dbview')
         *      ->update(array('title'=>'Table Action Views'));
         */
        
        /**
         * Change a field label
         * 
         * $this->updateOrInsert('_db_fields', array('fullname'=>'contents.lang'), array('label'=>'Language'));
         */
        
        /**
         * Add a new toplevel menu item
         * 
         * $contentId = $this->addMenu('Contents', '', 'icon-file', $topMenuId);
         */
        
        /**
         * Add a child menu item to a toplevel menu item
         * 
         * $this->addMenu('Pages', '/db/select/contents', 'icon-file', $contentId);
         */
    }

}