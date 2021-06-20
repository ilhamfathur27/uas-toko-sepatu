<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function index(){
    $data['title'] = "Home";
    $this->admin('body', $data);
  }
}