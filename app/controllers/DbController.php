<?php 

/**
 * Description of DbController
 *
 * @author Victor
 */
class DbController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index');
	}

}

?>
