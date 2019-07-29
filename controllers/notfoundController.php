<?php
class notfoundController extends controller{
    public function index(){
	    http_response_code(404);
        $this->loadTemplate('404', array('titulo'=>'Página não encontrada'));
    }
}
?>