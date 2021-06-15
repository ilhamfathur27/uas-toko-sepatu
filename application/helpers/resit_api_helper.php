<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*|======================[ RESIT CORE - Codeigniter 3 ]==========================|
**|
**| 	CORE ini perlu ada untuk menggunakan function function API
**|		@author 			: Restu Dwi Cahyo
**|		@instagram 		: resitdc
**|		@youtube 			: youtube.com/c/RestuDwiCahyo
**|		@whatsapp			: 081546416749
**|		@email				: dwi.restu3@gmail.com
**|		@github fork	: https://github.com/bandung-coders/resit-core-ci3
**|
**|==============================================================================|*/

if ( ! function_exists('rest_api_resitcore')){
	function rest_api_resitcore(){
		$hasil 		= 'CQkkYXBpX3N0YXR1cyA9IEZBTFNFOwoJCSRhcGlfY29kZSA9IDQwMDsKCQkkYXBpX21lc3NhZ2UgPSAiQmFkIFJlcXVlc3QiOwoJCSRhcGlfZXJyb3IgPSAnJzsKCQkkYXBpX3RvdGFsX2RhdGEgPSAwOwoJCSRhcGlfbGltaXQgPSAwOwoJCSRhcGlfb2Zmc2V0ID0gMDsKCQkkYXBpX3RvdGFsX3BhZ2UgPSAxOwoJCSRhcGlfcGFnZSA9IDE7CgkJJGFwaV9kYXRhcyA9IGFycmF5KCk7CgkJJHBhZ2luYXRpb25bInRvdGFsX2RhdGEiXSA9JiAkYXBpX3RvdGFsX2RhdGE7CgkJJHBhZ2luYXRpb25bInRvdGFsX3BhZ2UiXSA9JiAkYXBpX3RvdGFsX3BhZ2U7CgkJJHBhZ2luYXRpb25bInBhZ2UiXSA9JiAkYXBpX3BhZ2U7CgkJJHBhZ2luYXRpb25bImxpbWl0Il0gPSYgJGFwaV9saW1pdDsKCQkkcGFnaW5hdGlvblsib2Zmc2V0Il0gPSYgJGFwaV9vZmZzZXQ7CgkJLy8qKnwgCUNJRUUgQklTQSBCQUNBIENJRUVFRUVFRQoJCS8vKip8IAlSRVNUVSBEIENBSFlPIEVNQU5HIFBBTElORyBHQU5URU5H
		';

		return $hasil;
	}
}

if ( ! function_exists('rest_api_response')){
	function rest_api_response($error = FALSE, $list = TRUE, $result = TRUE){
		$hasil 		= '$hasil 	= rest_api($api_status, $api_code, $api_message, $api_error, $pagination, $api_datas, '.((string)(empty($error) ? '0' : $error)).', '.((string)(empty($list) ? '0' : $list)).', '.((string)(empty($result) ? '0' : $result)).');';
		return $hasil;
	}
}

if ( ! function_exists('rest_api')){
	function rest_api($status = FALSE, $code = 400, $message = 'Bad Request', $error_message = '', $pagination = array(), $datas = array(), $error = FALSE, $list = TRUE, $result = TRUE){
		$status 				= (empty($status) ? FALSE : $status);
		$code 					= (empty($code) ? 400 : $code);
		$message 				= (empty($message) ? 'Bad Request' : $message);
		$error 					= (empty($error) ? FALSE : $error);
		$pagination_array 		= array(
										'total_data' => 0,
										'total_page' => 1,
										'page' => 1,
										'limit' => 0,
										'offset' => 0,
										);
		if(empty($pagination)){
			$pagination 		= $pagination_array;
		}else{
			if(is_array($pagination)){
				$total_data = (isset($pagination['total_data']) ? ((int)$pagination['total_data']) : 0);
				$total_page = (isset($pagination['total_page']) ? ((int)$pagination['total_page']) : 0);
				$page = (isset($pagination['page']) ? ((int)$pagination['page']) : 0);
				$limit = (isset($pagination['limit']) ? ((int)$pagination['limit']) : 0);
				$offset = (isset($pagination['offset']) ? ((int)$pagination['offset']) : 0);
				$pagination 	= array(
										'total_data' 	=> (int)$total_data,
										'total_page' => (int)$total_page,
										'page' => (int)$page,
										'limit' 		=> (int)$limit,
										'offset' 		=> (int)$offset
										);
			}else{
				$pagination 	= $pagination_array;
			}
		}
		$result_array 			= array(
										'pagination' 	=> (array)$pagination,
										'datas' 	 	=> $datas
										);
		if(!$list){
			unset($result_array['pagination']);
		}
		$hasil 					= array(
										'status' 		=> (bool)$status,
										'code' 			=> (int)$code,
										'message' 		=> (string)$message,
										'error' 		=> $error_message,
										'result' 		=> (array)$result_array
										);
		if(!$result){
			unset($hasil['result']);
		}
		if(!$error){
			unset($hasil['error']);
		}
		return $hasil;
	}
}

if ( ! function_exists('http_status_code')){
	function http_status_code($code = ''){
		$code 				= (string)$code;
		$hasil 				= 'Internal Server Error';

		switch ($code) {
			case '100':
				$hasil 		= 'Continue';
				break;
			case '101':
				$hasil 		= 'Switching Protocols';
				break;
			case '102':
				$hasil 		= 'Processing';
				break;
			case '103':
				$hasil 		= 'Early Hints';
				break;
			case '200':
				$hasil 		= 'OK';
				break;
			case '200':
				$hasil 		= 'OK';
				break;
			case '201':
				$hasil 		= 'Created';
				break;
			case '202':
				$hasil 		= 'Accepted';
				break;
			case '203':
				$hasil 		= 'Non-Authoritative Information';
				break;
			case '204':
				$hasil 		= 'No Content';
				break;
			case '205':
				$hasil 		= 'Reset Content';
				break;
			case '206':
				$hasil 		= 'Partial Content';
				break;
			case '207':
				$hasil 		= 'Multi-Status';
				break;
			case '208':
				$hasil 		= 'Already Reported';
				break;
			case '226':
				$hasil 		= 'IM Used';
				break;
			case '300':
				$hasil 		= 'Multiple Choices';
				break;
			case '301':
				$hasil 		= 'Moved Permanently';
				break;
			case '302':
				$hasil 		= 'Found';
				break;
			case '303':
				$hasil 		= 'See Other';
				break;
			case '304':
				$hasil 		= 'Not Modified';
				break;
			case '305':
				$hasil 		= 'Use Proxy';
				break;
			case '306':
				$hasil 		= 'Switch Proxy';
				break;
			case '307':
				$hasil 		= 'Temporary Redirect';
				break;
			case '308':
				$hasil 		= 'Permanent Redirect';
				break;
			case '400':
				$hasil 		= 'Bad Request';
				break;
			case '401':
				$hasil 		= 'Unauthorized';
				break;
			case '402':
				$hasil 		= 'Payment Required';
				break;
			case '403':
				$hasil 		= 'Forbidden';
				break;
			case '404':
				$hasil 		= 'Not Found';
				break;
			case '405':
				$hasil 		= 'Method Not Allowed';
				break;
			case '406':
				$hasil 		= 'Not Acceptable';
				break;
			case '407':
				$hasil 		= 'Proxy Authentication Required';
				break;
			case '408':
				$hasil 		= 'Request Timeout';
				break;
			case '409':
				$hasil 		= 'Conflict';
				break;
			case '410':
				$hasil 		= 'Gone';
				break;
			case '411':
				$hasil 		= 'Length Required';
				break;
			case '412':
				$hasil 		= 'Precondition Failed';
				break;
			case '413':
				$hasil 		= 'Payload Too Large';
				break;
			case '414':
				$hasil 		= 'URI Too Long';
				break;
			case '415':
				$hasil 		= 'Unsupported Media Type';
				break;
			case '416':
				$hasil 		= 'Range Not Satisfiable';
				break;
			case '417':
				$hasil 		= 'Expectation Failed';
				break;
			case '418':
				$hasil 		= "I'm a teapot";
				break;
			case '421':
				$hasil 		= 'Misdirected Request';
				break;
			case '422':
				$hasil 		= 'Unprocessable Entity';
				break;
			case '423':
				$hasil 		= 'Locked';
				break;
			case '424':
				$hasil 		= 'Failed Dependency';
				break;
			case '425':
				$hasil 		= 'Too Early';
				break;
			case '426':
				$hasil 		= 'Upgrade Required';
				break;
			case '428':
				$hasil 		= 'Precondition Required';
				break;
			case '429':
				$hasil 		= 'Too Many Requests';
				break;
			case '431':
				$hasil 		= 'Request Header Fields Too Large';
				break;
			case '451':
				$hasil 		= 'Unavailable For Legal Reasons';
				break;
			case '500':
				$hasil 		= 'Internal Server Error';
				break;
			case '501':
				$hasil 		= 'Not Implemented';
				break;
			case '502':
				$hasil 		= 'Bad Gateway';
				break;
			case '503':
				$hasil 		= 'Service Unavailable';
				break;
			case '504':
				$hasil 		= 'Gateway Timeout';
				break;
			case '505':
				$hasil 		= 'HTTP Version Not Supported';
				break;
			case '506':
				$hasil 		= 'Variant Also Negotiates';
				break;
			case '507':
				$hasil 		= 'Insufficient Storage';
				break;
			case '508':
				$hasil 		= 'Loop Detected';
				break;
			case '508':
				$hasil 		= 'Loop Detected';
				break;
			case '510':
				$hasil 		= 'Not Extended';
				break;
			case '511':
				$hasil 		= 'Network Authentication Required';
				break;
			default:
				$hasil 		= 'Internal Server Error';
				break;
		}

		return $hasil;
	}
}

if ( ! function_exists('get_value')){
	function get_value($select = '',$from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$db='default'){
		$CI 						=& get_instance();
		$CI->load->model('master_model');
		$hasil 						= null;	
		if($select != null AND $from != null and ($and_where != null OR $or_where != null OR ($like != null AND $field_like != null))){
			$select 				= $select.' AS kolom';
			$data 					= $CI->master_model->data($select, $from, $and_where, $or_where, null, null, null, null, null, null, null, $like, $field_like, $db)->get();
			if($data->num_rows() > 0){
				$field 				= $data->row_array();
				$hasil 				= $field['kolom'];
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('get_data')){
	function get_data($select = '',$from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$order_by = '',$db='default'){
		$CI 					=& get_instance();
		$CI->load->model('master_model');
		$data 					= $CI->master_model->data($select, $from, $and_where, $or_where, null, null, null, null, null, null, $order_by, $like, $field_like, $db);
		return $data;
	}
}

if ( ! function_exists('get_count')){
	function get_count($from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$db = 'default'){
		$CI 					= &get_instance();
		$CI->load->model('master_model');
		$data 					= $CI->master_model->data('count(*) as jumlah', $from, $and_where, $or_where, null, null, null, null, null, null, null, $like, $field_like, $db)->get();
		$field 					= $data->row();
		return $field->jumlah;
	}
}

if ( ! function_exists('cari_array')){
	function cari_array($array, $search_list){
		$result 			= array(); 
		foreach ($array as $key => $value){
			foreach ($search_list as $k => $v){
				if (!isset($value[$k]) || $value[$k] != $v) { 
					continue 2; 
				} 
			} 
			$result[] 		= $value; 
		} 
		return $result;
	}
}

if ( ! function_exists('echo_api')){
	function echo_api($data = array()){
		$CI 					= &get_instance();
		$CI->output->set_output(json_encode($data));
	}
}

if ( ! function_exists('tampil')){
	function tampil($data = ''){
		$CI 					= &get_instance();
		$CI->output->set_output($data);
	}
}

if ( ! function_exists('echo_tags')){
	function echo_tags($data = ''){
		echo htmlentities($data);
	}
}

if ( ! function_exists('offset')){
	function offset($limit = 0,$page= 1){
		$hasil = ($page > 1)?($page * $limit) - $limit : 0;
		return $hasil;
	}
}

if ( ! function_exists('jumlah_page')){
	function jumlah_page($limit = 0,$jumlah_data = 0){
		$hasil = 1;
		if ($limit > 0){
			$hasil = ceil($jumlah_data/$limit);
		}
		return $hasil;
	}
}

if ( ! function_exists('start_page')){
	function start_page($page_aktif = 1,$range_page = 1){
		return ($page_aktif > $range_page)? $page_aktif - $range_page : 1;
	}
}

if ( ! function_exists('end_page')){
	function end_page($page_aktif = 1,$range_page = 1,$jumlah_page = 1){
		return ($page_aktif < ($jumlah_page - $range_page))? $page_aktif + $range_page : $jumlah_page;
	}
}

if ( ! function_exists('select_option')){
	function select_option($table = '', $key = array(), $value = '', $label = '', $html = '', $default = '', $def_value = '', $order_by = '', $group_by = '', $db = 'default'){
		$CI 			= &get_instance();
		$db 			= $CI->load->database($db, true);
		$db->from($table);
		if (!empty($key) || is_array($key)){
			$db->where($key);
		}
		if ($order_by) {
			if (is_array($order_by)) {
				foreach ($order_by as $key_order => $val_order) {
					$db->order_by($key_order, $val_order);
				}
			} else {
				$db->order_by($order_by);
			}
		}
		if ($group_by) {
			$db->group_by($group_by);
		}
		$query = $db->get();

		$option = ($html != '') ? '' : [];
		if ($html != '') {
			if ($default != '') {
				$option = '<option value="' . $def_value . '">' . $default . '</option>';
			}
		} else {
			if ($default != '') {
				$option[$def_value] = $default;
			}
		}

		if ($query->num_rows() > 0) {
			foreach ($query->result() as $row) {

				if (is_array($label)) {
					$label_multiple = array();
					foreach ($label as $key_label => $value_label) {
						$label_multiple[] = str_replace("'", " ", $row->$value_label);
					}

					if ($html != '') {
						$option .= '<option value="' . $row->$value . '">' . str_replace("'", " ", implode(' - ', $label_multiple)) . '</option>';
					} else {
						$option[$row->$value] = str_replace("'", " ", implode(' - ', $label_multiple));
					}
				} else {
					if ($html != '') {
						$option .= '<option value="' . $row->$value . '">' . str_replace("'", " ", $row->$label) . '</option>';
					} else {
						$option[$row->$value] = str_replace("'", " ", $row->$label);
					}
				}
			}
		}

		return $option;
	}
}

if ( ! function_exists('boolean_input')){
	function boolean_input($input = ''){
		$hasil 		= (int)$input;
		if($hasil != 1){
			$hasil 	= 0;
		}
		return $hasil;
	}
}

if ( ! function_exists('check_json')){
	function check_json($string = ''){
		return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
	}
}

if ( ! function_exists('tambah_css_external')){
	function tambah_css_external($resource = array()){
		$hasil 						= '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url 		= '<link rel="stylesheet" href="';
				$single_url 		.= $url_resource;
				$single_url 		.= '">'."\n";

				$hasil 				.= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_css_internal')){
	function tambah_css_internal($resource = array()){
		$hasil 						= '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url 		= '<link rel="stylesheet" href="';
				$single_url 		.= base_url($url_resource);
				$single_url 		.= '">'."\n";
				
				$hasil 				.= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_js_external')){
	function tambah_js_external($resource = array()){
		$hasil 						= '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url 		= '<script type="text/javascript" src="';
				$single_url 		.= $url_resource;
				$single_url 		.= '"></script>'."\n";
				
				$hasil 				.= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_js_internal')){
	function tambah_js_internal($resource = array()){
		$hasil 						= '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url 		= '<script type="text/javascript" src="';
				$single_url 		.= base_url($url_resource);
				$single_url 		.= '"></script>'."\n";
				
				$hasil 				.= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('angka_acak')){
	function angka_acak($range1 = 1000,$range2 = 9999){
		$random 		= rand($range1,$range2);
		return $random.date('sYHmid').$random;
	}
}

if ( ! function_exists('huruf_acak')){
	function huruf_acak($length){
		$max    = ceil($length / 32);
		$random = '';
		for ($i = 0; $i < $max; $i++) {
			$random .= md5(microtime(true) . mt_rand(10000, 90000));
		}
		return substr($random, 0, $length);
	}
}

if ( ! function_exists('id_generator')){
	function id_generator($length){
		$max    = ceil($length / 32);
		$random = '';
		
		for ($i = 0; $i < $max; $i++) {
			$random .= md5(microtime(true) . mt_rand(10000, 90000));
		}

		return rand(1, ceil($length / 2)).substr($random, 0, $length).date('sYHmid').substr($random, 0, $length);
	}
}

if ( ! function_exists('date_now')){
  function date_now($time = true){
		$date_code = 'Y-m-d';
		if($time){
			$date_code .= ' H:i:s';
		}
		$hasil = date($date_code);
		return $hasil;
	}
}

if ( ! function_exists('error_generator')){
  function error_generator($v_input_list = array()){
		$hasil = array();
		$deklar_variabel = '';
		$error_conditions = '';
		if(is_array($v_input_list)){
      if(count($v_input_list) > 0){
				foreach ($v_input_list as $v_input) {
          $deklar_variabel .= '$'.$v_input['error'].' = trim(form_error($'.$v_input['input'].'));'."\n";
          
					$error_conditions .= 'if ($'.$v_input['error'].' != NULL){'."\n";
					$error_conditions .= '	$data_error'."['error_name']".'[] = $'.$v_input['input'].";\n";
					$error_conditions .= '	$data_error'."['error_message']".'[] = $'.$v_input['error'].";\n";
					$error_conditions .= '}'."\n";
				}
				$hasil['variabel'] = $deklar_variabel;
				$hasil['condition'] = $error_conditions;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('error_generator_v2')){
  function error_generator_v2($v_input_list = array()){
		$hasil = array();
		$deklar_variabel = '';
		$error_conditions = '';
		if(is_array($v_input_list)){
      if(count($v_input_list) > 0){
				foreach ($v_input_list as $v_input) {
          $deklar_variabel .= '$error_'.$v_input.' = trim(form_error($i_'.$v_input.'));'."\n";
          
					$error_conditions .= 'if ($error_'.$v_input.' != NULL){'."\n";
					$error_conditions .= '	$data_error[] = array("name" => $i_'.$v_input.",".' "message" => $error_'.$v_input.");\n";
					$error_conditions .= '}'."\n";
				}
				$hasil['variabel'] = $deklar_variabel;
				$hasil['condition'] = $error_conditions;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('not_update_field')){
  function not_update_field($fields_list = array()){
		$hasil = '';
		foreach ($fields_list as $field) {
			$hasil .= 'unset($input["'.$field.'"]);'."\n";
		}
		return $hasil;
	}
}

if ( ! function_exists('ac_input_post')){
  function ac_input_post($fields_list = array()){
		$hasil = '';
		foreach ($fields_list as $field) {		
			$hasil .= '$post_input["'.$field.'"] = $this->input->post($i_'.$field.');'."\n";
		}
		return $hasil;
	}
}

if ( ! function_exists('ac_input_variabel')){
  function ac_input_variabel($variabel_list = array()){
    $hasil = '';
    foreach ($variabel_list as $input_variabel) {
      $hasil .= '$i_'.$input_variabel.' = "'.$input_variabel.'";'."\n";      
    }
    return $hasil;
  }
}

if ( ! function_exists('ac_input_get')){
  function ac_input_get($variabel_list = array()){
    $hasil = '';
    foreach ($variabel_list as $input_variabel) {
      $hasil .= '$input['."'".$input_variabel."'".'] = $this->input->post($i_'.$input_variabel.');'."\n";      
    }
    return $hasil;
  }
}
?>