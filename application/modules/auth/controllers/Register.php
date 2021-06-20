<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller
{
	function index()
  {
		if ($this->session->userdata('user_login'))
    {
      redirect('home');
    } else {
      $data['title'] = "Register";
      $data['register_api'] = site_url("api/auth/register");
      $data['success_redirect'] = site_url("login");
      $this->page('register/body', $data);
    }
  }
}