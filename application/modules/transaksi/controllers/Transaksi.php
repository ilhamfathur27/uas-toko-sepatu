<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi extends MY_Controller 
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/m_transaksi');
	}

	function index()
  {
    $and_where['a.id_user'] = user('id_user');
    $data_transaksi = $this->m_transaksi->list(0, 0, $and_where)->get()->result_array();
    $data['title'] = "Keranjang";
    $data['data_transaksi'] = $data_transaksi;

    $this->lp('body', $data);
  }
}