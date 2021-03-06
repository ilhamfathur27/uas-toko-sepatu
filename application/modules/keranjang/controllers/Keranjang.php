<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keranjang extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/m_keranjang');
	}

	function index()
  {
    $and_where['a.id_user'] = user('id_user');
    $data_keranjang = $this->m_keranjang->list(0, 0, $and_where)->get()->result_array();
    $data['title'] = "Keranjang";
    $data['api_checkout'] = site_url("api/transaksi/create");
    $data['data_keranjang'] = $data_keranjang;

    $this->lp('body', $data);
  }
}