<?php
require_once 'views/view.php';
abstract class apiController {
    protected $model; // lo instancia el hijo
    protected $view;

    private $data; 

    public function __construct() {
        $this->view = new APIView();
        $this->data = file_get_contents("php://input"); 
    }

    function getData(){ 
        // var_dump($this->data);
        // die();
        return json_decode($this->data); 
    }  
}
?>

