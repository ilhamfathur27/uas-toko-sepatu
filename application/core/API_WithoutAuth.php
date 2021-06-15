<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_WithoutAuth extends MY_Controller{
    public function __construct(){
        parent::__construct();
		header('Content-Type: application/json');
    }
}
