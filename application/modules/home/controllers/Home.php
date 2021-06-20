<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function index(){
    $data['title'] = "Home";
    $and_where['a.id_user'] = user("id_user");
    $isi_keranjang = $this->m_keranjang->total($and_where);
    $this->lp('body', $data);
  }
}