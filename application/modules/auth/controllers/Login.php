<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller
{
	function index()
  {
		if ($this->session->userdata('user_login'))
    {
      redirect('home');
    } else {
      $data['title'] = "Login";
      $data['login_api'] = site_url("api/auth/login");
      $this->page('login/body', $data);
    }
  }
}