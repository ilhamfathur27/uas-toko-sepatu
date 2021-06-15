<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kampret extends MY_Controller {
	function index(){
    $data['title'] = "test";
    $this->mobile_sp('body', $data);
  }
}