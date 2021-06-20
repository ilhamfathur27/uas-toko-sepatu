<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('api/m_sepatu');
	}
	function index(){
    $data_sepatu = $this->m_sepatu->list(10, 0)->get()->result_array();
    $data['title'] = "LIST";
    $data['data_sepatu'] = $data_sepatu;
    $this->lp('list/body', $data);
  }

  function detail($id = ""){
    $and_where['a.id_sepatu'] = $id;
    $data_sepatu = $this->m_sepatu->detail($and_where);
    $data['title'] = "DETAIL SEPATU";
    $data['sepatu'] = isset($data_sepatu[0]) ? $data_sepatu[0] : $data_sepatu;
    
    $this->lp('detail/body', $data);  
  }
}