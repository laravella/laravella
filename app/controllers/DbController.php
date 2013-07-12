<?php 

/**
 * Description of DbController
 *
 * @author Victor
 */
class DbController extends Controller {

    public function getIndex()
    {
        return "asdf"; //View::make("crud::dbview");
    }

    public function getSelect($table = null)
    {
        return "asdf"; //View::make("crud::dbview");
    }

    public function missingMethod($parameters)
    {
        return "missing";
    }    


}

?>
