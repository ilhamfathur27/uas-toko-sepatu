<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/m_sepatu');
	}

	function index()
  {
    $data['title'] = "Home";
    $data_sepatu = $this->m_sepatu->list(6, 0)->order_by('a.terjual DESC')->get()->result_array();
    $data['data_sepatu'] = $data_sepatu;
    $and_where['a.id_user'] = user("id_user");
    $isi_keranjang = $this->m_keranjang->total($and_where);
    $this->lp('body', $data);
  }
}