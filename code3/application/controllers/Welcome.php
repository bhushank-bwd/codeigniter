<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MX_Controller {

	public function index()
	{
		echo base_url()."<br>"; 
		echo basename(base_url());
	}
	public function sweet(){
		$this->load->view("sweet-alerts");
	}
}
