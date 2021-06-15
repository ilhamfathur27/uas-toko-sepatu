<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Verifikasi {	
	function compress(){
		$compress 	= base64_decode('PCEtLSANCj09PT09PT09PT09PT09PT09PT09WyBDb250YWN0IEluZm8gXT09PT09PT09PT09PT09PT09PT09PT09DQo9PXwgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfA0KPT18ICAgICBDcmVhdGVkIEJ5IFJlc3R1IEQuIENhaHlvICAgICAgICAgICAgICAgICAgICAgICAgIHwNCj09fCAgICAgWW91dHViZSAgICAgOiB3d3cueW91dHViZS5jb20vUmVzdHVEd2lDYWh5byAgICAgICB8DQo9PXwgICAgIEluc3RhZ3JhbSAgIDogcmVzaXRkYyAgICAgICAgICAgICAgICAgICAgICAgICAgICAgfA0KPT18ICAgICBUd2l0dGVyICAgICA6IHJlc2l0ZGMgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHwNCj09fCAgICAgRmFjZWJvb2sgICAgOiB3d3cuZmFjZWJvb2suY29tL3Jlc2l0ZGMgICAgICAgICAgICB8DQo9PXwgICAgIFdoYXRzYXBwICAgIDogMDgxNTQ2NDE2NzQ5ICAgICAgICAgICAgICAgICAgICAgICAgfA0KPT18ICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIHwNCj09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09DQotLT4K');
		$CI 		=& get_instance();
		$buffer 	= $CI->output->get_output();
		$search 	= array('/\n/','/\>[^\S ]+/s','/[^\S ]+\</s','/(\s)+/s');
		$replace 	= array(' ','>','<','\\1');
		$buffer 	= $compress.preg_replace($search, $replace, $buffer);
		$CI->output->set_output($buffer);
		// $CI->output->_display();
	}
    function cek_user_login(){
		$CI =& get_instance();
		$CI->load->library('session');
		if ($this->is_login()){
			return true;
		}else{
			if ($CI->input->is_ajax_request()) {
				echo json_encode('Anda tidak login');
			}else{
				$data = array(
					'SESS_LOGIN_STATEMENT' => 'Akses Ditolak ;)',
					'pesan' => 'Anda harus login terlebih dahulu !'
				);
				$CI->session->set_userdata($data);
				redirect('home');
			}
			die;
		}
    }
    function cek_user_login_api(){
		$CI =& get_instance();
		$CI->load->library('session');
		if ($this->is_login()){
			return true;
		}else{
			$data = array(
				'status' => FALSE,
				'pesan' => 'Anda tidak punya akses'
			);
			$CI->output->set_output(json_encode($data));
			$CI->output->_display();
			die();
		}
    }
	function is_login(){	 
		$CI =& get_instance();
		$CI->load->library('session');
		return $CI->session->userdata('smksumatra40_login');
	}
	function hak_permission($url=null){
		$CI =& get_instance();
		$CI->load->library('session');
		$CI->load->helper('resit');
		
		$id_user = $CI->session->userdata('s_id_user');
		$string = $CI->uri->uri_string();
		$method = $CI->router->fetch_method();
		$link = explode('/'.$method,$string);
		
		if($url==null){
			$url = $link[0];
			$CI->session->set_userdata('s_url',$url);
			if($method=='index' && $url != 'home'){
				$menu = getValue("description","rpc_m_menu",array('url' => $url));
				data_log($menu);
			}
		}else{
			$CI->session->set_userdata('s_url',$url);
			if($url == $string){
				$menu = getValue("description","rpc_m_menu",array('url' => $url));
				data_log($menu);
			}
		}
		
		$CI->db = $CI->load->database('default',true);
		$CI->db->select('a.*, b.parent_id, b.title, b.url, b.class_active');
		$CI->db->from('rpc_otoritas_user a');
		$CI->db->join('rpc_m_menu b','a.menu_id=b.menu_id','INNER');
		$CI->db->where('a.user_id',$id_user);
		$CI->db->where('b.url',$url);
		$CI->db->where('b.is_active',1);
		
		$query = $CI->db->get();
		
		//echo $CI->db->last_query();die;
		
		if($query->num_rows() > 0){
			$CI->session->set_userdata('is_view',1);
			$CI->session->set_userdata('is_create',1);
			$CI->session->set_userdata('is_edit',1);
			$CI->session->set_userdata('is_delete',1);
			$CI->session->set_userdata('is_approve',1);
			$CI->session->set_userdata('is_export',1);
			$CI->session->set_userdata('is_adjust',1);
			$CI->session->set_userdata('is_duplicate',1);
			$CI->session->set_userdata('is_draft',1);
			$CI->session->set_userdata('is_unlock',1);
			
			$row = $query->row();
			$CI->session->set_userdata('left_menu',$row->class_active);
			
			if($row->is_view == 'N'){ 
				$CI->session->unset_userdata('is_view');
			}
			if($row->is_create == 'N'){ 
				$CI->session->unset_userdata('is_create');
			}
			if($row->is_edit == 'N'){ 
				$CI->session->unset_userdata('is_edit');
			}
			if($row->is_delete == 'N'){ 
				$CI->session->unset_userdata('is_delete');
			}
			if($row->is_approve == 'N'){ 
				$CI->session->unset_userdata('is_approve');
			}
			if($row->is_export == 'N'){ 
				$CI->session->unset_userdata('is_export');
			}
			if($row->is_adjust == 'N'){ 
				$CI->session->unset_userdata('is_adjust');
			}
			if($row->is_duplicate == 'N'){ 
				$CI->session->unset_userdata('is_duplicate');
			}
			if($row->is_draft == 'N'){ 
				$CI->session->unset_userdata('is_draft');
			}
			if($row->is_unlock == 'N'){ 
				$CI->session->unset_userdata('is_unlock');
			}
			return true;
		}
		else
		{
			$CI->session->set_userdata('left_menu',1);
			redirect('no_akses');
		}
	}
}
?>
