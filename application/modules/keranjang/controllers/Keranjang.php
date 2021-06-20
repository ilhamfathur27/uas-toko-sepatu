<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends MY_Controller {
	function index(){
    $data['title'] = "Keranjang";

    $this->lp('body', $data);
  }
}