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

if ( ! function_exists('pembatas_kata')){
	function pembatas_kata($kalimat='',$jumlah_karakter = 0, $kata = true){
		$jumlah = strlen($kalimat);
		if ($jumlah > $jumlah_karakter) {
			$hasil = substr($kalimat,$jumlah_karakter,1);
			if($kata == true){
				if($hasil !=" "){
					while($hasil !=" "){
						$i=1;
						$jumlah_karakter=$jumlah_karakter+$i;
						$hasil = substr($kalimat,$jumlah_karakter,1);
					}
				}
			}
			$hasil = substr($kalimat,0,$jumlah_karakter).'...';
			return $hasil;
		}else{
			return $kalimat;
		}
	}
}

if ( ! function_exists('get_value')){
	function get_value($select = '',$from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$db='default'){
		$CI =& get_instance();
		$CI->load->model('master_model');
		$hasil = null;	
		if($select != null AND $from != null and ($and_where != null OR $or_where != null OR ($like != null AND $field_like != null))){
			$select = $select.' AS kolom';
			$data = $CI->master_model->data($select, $from, $and_where, $or_where, null, null, null, null, null, null, null, $like, $field_like, $db)->get();
			if($data->num_rows() > 0){
				$field = $data->row_array();
				$hasil = $field['kolom'];
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('get_data')){
	function get_data($select = '',$from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$order_by = '',$db='default'){
		$CI =& get_instance();
		$CI->load->model('master_model');
		$data = $CI->master_model->data($select, $from, $and_where, $or_where, null, null, null, null, null, null, $order_by, $like, $field_like, $db);
		return $data;
	}
}

if ( ! function_exists('get_count')){
	function get_count($from = '',$and_where = array(),$or_where = array(),$like = '',$field_like = '',$db = 'default'){
		$CI = &get_instance();
		$CI->load->model('master_model');
		$data = $CI->master_model->data('count(*) as jumlah', $from, $and_where, $or_where, null, null, null, null, null, null, null, $like, $field_like, $db)->get();
		$field = $data->row();
		return $field->jumlah;
	}
}

if ( ! function_exists('cari_array')){
	function cari_array($array, $search_list){
		$result = array(); 
		foreach ($array as $key => $value){
			foreach ($search_list as $k => $v){
				if (!isset($value[$k]) || $value[$k] != $v) { 
					continue 2; 
				} 
			} 
			$result[] = $value; 
		} 
		return $result;
	}
}

if ( ! function_exists('echo_api')){
	function echo_api($data = array()){
		$CI = &get_instance();
		$CI->output->set_output(json_encode($data));
	}
}

if ( ! function_exists('tampil')){
	function tampil($data = ''){
		$CI = &get_instance();
		$CI->output->set_output($data);
	}
}

if ( ! function_exists('echo_tags')){
	function echo_tags($data = ''){
		echo htmlentities($data);
	}
}

if ( ! function_exists('pagging_display')){
	function pagging_display($jumlah_page = 0){
		$hasil = '';
		if($jumlah_page <= 1){
			$hasil = 'style="display:none;"';
		}
		return $hasil;
	}
}

if ( ! function_exists('table_row')){
	function table_row($name = '',$options = array(),$onchange = ''){
		return form_dropdown($name,$options,null,'class="form-control width-unset" onchange="'.$onchange.'"');
	}
}

if ( ! function_exists('table_search')){
	function table_search($name = ''){
		$html = '<form name="'.$name.'">';
		$html .= '<input class="form-control width-unset" name="search" placeholder="Cari" type="search">';
		$html .= '<button type="button" class="btn btn-default"><i class="fa fa-search"></i></button>';
		$html .= '</form>';
		return $html;
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
		$CI = &get_instance();
		$db = $CI->load->database($db, true);
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
						$ .= '<option value="' . $row->$value . '">' . str_replace("'", " ", implode(' - ', $label_multiple)) . '</option>';
					} else {
						$option[$row->$value] = str_replace("'", " ", implode(' - ', $label_multiple));
					}
				} else {
					if ($html != '') {
						$ .= '<option value="' . $row->$value . '">' . str_replace("'", " ", $row->$label) . '</option>';
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
		$hasil = (int)$input;
		if($hasil != 1){
			$hasil = 0;
		}
		return (bool)$hasil;
	}
}

if ( ! function_exists('check_json')){
	function check_json($string = ''){
		return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
	}
}

if ( ! function_exists('tambah_css_external')){
	function tambah_css_external($resource = array()){
		$hasil = '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url = '<link rel="stylesheet" href="';
				$single_url .= $url_resource;
				$single_url .= '">'."\n";

				$hasil .= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_css_internal')){
	function tambah_css_internal($resource = array()){
		$hasil = '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url = '<link rel="stylesheet" href="';
				$single_url .= base_url($url_resource);
				$single_url .= '">'."\n";
				
				$hasil .= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_js_external')){
	function tambah_js_external($resource = array()){
		$hasil = '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url = '<script type="text/javascript" src="';
				$single_url .= $url_resource;
				$single_url .= '"></script>'."\n";
				
				$hasil .= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('tambah_js_internal')){
	function tambah_js_internal($resource = array()){
		$hasil = '';
		if(!empty($resource)){
			foreach ($resource as $url_resource) {
				$single_url = '<script type="text/javascript" src="';
				$single_url .= base_url($url_resource);
				$single_url .= '"></script>'."\n";
				
				$hasil .= $single_url;
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('fa_icon')){
	function fa_icon($icon = '', $attribut = ''){
		$hasil = '<i class="fa ';
		$hasil .= $icon;
		$hasil .= '"></i>';

		return $hasil;  
	}
}

if ( ! function_exists('resit_div')){
	function resit_div($attribut_tambahan = ''){
		$params_start = 1;
		$params = func_get_args();
		$jumlah_params = count($params);
		$hasil = '<div';
		if(!empty($attribut_tambahan)){
			if(is_array($attribut_tambahan)){
				foreach ($attribut_tambahan as $attribut => $value){
					$hasil .= ' ';
					$hasil .= $attribut;
					$hasil .= '=';
					$hasil .= '"';
					$hasil .= $value;
					$hasil .= '"';
				}
			}else{
				$params_start = 0;
			}
		}
		$hasil .= '>';
		for($a = $params_start;$a<$jumlah_params;$a++){
			$hasil .= $params[$a]."\n";
		}
		$hasil .= '</div>';
		return $hasil;
	}
}

if ( ! function_exists('heading_user_page')){
	function heading_user_page($page_title = '',$page_subtitle = ''){
		$html = '<div class="content-heading clearfix">';
		$html .= '<div class="heading-left">';
		$html .= '<h1 class="page-title">'.(is_string($page_title)?$page_title:'').'</h1>';
		$html .= '<p class="page-subtitle">'.(is_string($page_subtitle)?$page_subtitle:'').'</p>';
		$html .= '</div>';
		$html .= '</div>';
		return $html;
	}
}

if ( ! function_exists('waktu_indo')){
	function waktu_indo($waktu_indo){ 
		$hasil = '';
		$waktu = explode(' ', $waktu_indo);
		$tanggal = tanggal_indo($waktu[0]);
		$jam = $waktu[1];
		$hasil = $tanggal.' - '.$jam;
		return $hasil;
	}
}

if ( ! function_exists('tanggal_indo')){
	function tanggal_indo($tanggal_indo){ 
		if (trim($tanggal_indo) != '' AND $tanggal_indo != '0000-00-00') {
			$newdate = new DateTime($tanggal_indo);
			$pcs = explode("-", $tanggal_indo);
			$y = $newdate->format('Y');
			$m = $newdate->format('n');
			$d = $newdate->format('j');
			$wk = $newdate->format('w');

			$nama_bulan = array();
			$nama_bulan[1] = 'Januari';
			$nama_bulan[2] = 'Februari';
			$nama_bulan[3] = 'Maret';
			$nama_bulan[4] = 'April';
			$nama_bulan[5] = 'Mei';
			$nama_bulan[6] = 'Juni';
			$nama_bulan[7] = 'Juli';
			$nama_bulan[8] = 'Agustus';
			$nama_bulan[9] = 'September';
			$nama_bulan[10] = 'Oktober';
			$nama_bulan[11] = 'November';
			$nama_bulan[12] = 'Desember';

			$nama_hari = array();
			$nama_hari[0] = 'Minggu';
			$nama_hari[1] = 'Senin';
			$nama_hari[2] = 'Selasa';
			$nama_hari[3] = 'Rabu';
			$nama_hari[4] = 'Kamis';
			$nama_hari[5] = 'Jumat';
			$nama_hari[6] = 'Sabtu';

			$hasil = $nama_hari[$wk]. ", ". $d ." ". $nama_bulan[$m] ." ". $y;
			return $hasil;
		}
	}
}

if ( ! function_exists('kode_acak')){
	function kode_acak($range1 = 1000,$range2 = 9999){
		$random = rand($range1,$range2);
		return $random.date('sYHmid').$random;
	}
}

if ( ! function_exists('huruf_acak')){
	function huruf_acak($length){
		$max    = ceil($length / 32);
		$random = '';
		for ($i = 0; $i < $max; $i++) {
			$ .= md5(microtime(true) . mt_rand(10000, 90000));
		}
		return substr($random, 0, $length);
	}
}

if ( ! function_exists('user_profile')){
	function user_profile($foto = '', $original = true){
		$hasil = '';
		$folder = './user/profile/';
		$type = 'original/';
		if(empty($foto)){
			$hasil = base_url('assets/user-image/default.png');
		}else{
			if($original){
				$type = 'original/';
			}else{
				$type = 'thumbnail/';
			}
			$folder .= $type;
			$file = $folder.$foto;
			if(file_exists($file)){
				$hasil = base_url('user/profile/'.$type.$foto);
			}else{
				$hasil = base_url('assets/user-image/default.png');
			}
		}
		return $hasil;
	}
}

if ( ! function_exists('huruf_depan_besar')){
	function huruf_depan_besar($text = ''){
		$text = strtolower($text);
		$text = ucwords($text);
		return $text;
	}
}

?>