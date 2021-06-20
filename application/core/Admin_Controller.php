<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Controller extends MY_Controller{
    public function __construct(){
        parent::__construct();
        $this->verifikasi->cek_user_login();
    }
}
