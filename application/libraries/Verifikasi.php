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
	function cek_user_login()
	{
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
		return $CI->session->userdata('user_login');
	}
}
?>
