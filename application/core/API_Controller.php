<?php
defined('BASEPATH') or exit('No direct script access allowed');

class API_Controller extends MY_Controller{
    public function __construct(){
        parent::__construct();
		header('Content-Type: application/json');
        $this->verifikasi->cek_user_login_api();
    }
}
