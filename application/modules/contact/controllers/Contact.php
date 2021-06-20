<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends MY_Controller {
	function index(){
    $data['title'] = "Contact";
    $this->lp('body', $data);
  }
}