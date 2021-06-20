<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sepatu extends MY_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('api/m_sepatu');
	}

	function index()
  {
    $keyword = $this->input->get("s");
    $data_sepatu = $this->m_sepatu->list(20, 0, null, null, $keyword)->get()->result_array();
    $data['title'] = "LIST SEPATU";
    $data['data_sepatu'] = $data_sepatu;
    $this->admin('list/body', $data);
  }

  function create()
  {
    // $data_sepatu = $this->m_sepatu->detail($and_where);
    $data['title'] = "TAMBAH SEPATU";
    $data['api_sepatu'] = site_url("api/sepatu/create");
    $this->admin('create/body', $data);  
  }

  function edit($id_sepatu = "")
  {
    $where['id_sepatu'] = $id_sepatu;
    $detail_sepatu = $this->m_sepatu->detail($where);
    $data['title'] = "EDIT SEPATU";
    $data['id_sepatu'] = "EDIT SEPATU";
    $data['api_sepatu'] = site_url("api/sepatu/edit");
    $data['sepatu'] = isset($detail_sepatu[0]) ? $detail_sepatu[0] : $detail_sepatu;
    $this->admin('edit/body', $data);
  }

  function list()
  {
    $this->index();
  }
}