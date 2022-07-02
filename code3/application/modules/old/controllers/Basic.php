<?php
class Basic extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    public function checkBox(){
        $this->load->view("check-box");
    }
    
}

?>