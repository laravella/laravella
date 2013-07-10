<?php

return array(

	/**
	 * frontend theme
	 */
	'frontend_theme'	=> 'default',

	/**
	 * base url for administration
	 */
	'admin_base_uri'	=> 'admin',

	/**
	 * api base uri
	 */	
	'api_base_uri'		=> 'ravel/api', 

	/**
	 * front end uri
	 */
	'frontend_base_uri'	=> '', 

	/**
	 * Default User added to when installing
	 */
	'setup_user'		=> array('username'=>'admin', 'password'=>'ravel', 'email' => 'admin@yourwebsite.com'),


	/**
	 * path from src directory of the package
	 */
	'required_files'	=> array(
							'Laravella/Ravel/FormTemplates.php',
						),

	/**
	 * Layouts used in the system frontend theme
	 */
	'layouts'			=> array(
							'list' => array(
										'blog',
										'list',
									),
							'item' => array(
									'page',
									'post',
								)
						),
	/**
	 * Namespace Class Aliases
	 */
	'aliases' 			=> array(

							'Acl'			=> 'Laravella\Ravel\Facades\Acl',
							'Post'			=> 'Laravella\Ravel\Facades\Post',
							'Page'			=> 'Laravella\Ravel\Facades\Page',
							'Media'			=> 'Laravella\Ravel\Facades\Media',
							'MediaCollection' => 'Laravella\Ravel\Facades\MediaCollection',
							'PostCategory'	=> 'Laravella\Ravel\Facades\PostCategory',
							'Menu'			=> 'Laravella\Ravel\Facades\Menu',
							'UsersLibrary'	=> 'Laravella\Ravel\Facades\UsersLibrary',
							'Xhtml'			=> 'Raftalks\Form\Html\Html',
							'Xform'			=> 'Raftalks\Form\Form',
							'Image' 		=> 'Intervention\Image\Facades\Image',
						),    

);