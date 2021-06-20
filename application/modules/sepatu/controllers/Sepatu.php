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
    $data['api_add_sepatu'] = site_url("api/sepatu/create");
    $this->admin('create/body', $data);  
  }

  function list()
  {
    $this->index();
  }
}