<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*|======================[ RESIT CORE - Codeigniter 3 ]==========================|
**|
**| 	Untuk Mengatur Response Api.
**|		Tinggal ubah variabel dengan nama yang sama
**| 	pada index array Response api,
**| 	dan tambahkan prefix api_ pada variabel tersebut
**|		Contoh
**| 	di api ada response "message", jika ingin mengubah valuenya
**| 	tinggal ubah $api_message = 'VALUE';
**|
**|==============================================================================|
**|
**| 	oh iya, 'echo' di controller di nonaktifkan
**| 	gunakan bawaan Core ini  'tampil()'.
**| 	Untuk mengetahui alasannya silahkan baca
**| 	Dokumentasi Codeigniter output
**|
**|==============================================================================|
**|
**| 	Sebenarnya function http_status_code bisa di tulis
**| 	1 kali dalam 1 function index, cuma nantinya
**| 	Semua response message akan mengikuti http status code
**| 	Sehingga jika ada error saat upload file, atau error lainnya
**| 	tidak akan bisa di munculkan di response api
**|
**|==============================================================================|*/

class Sepatu extends API_Controller 
{
	private $master_table = 'sepatu';
	function __construct()
	{
		parent::__construct();
		$this->load->model('master_model');
		$this->load->model('attach_model');
		$this->load->model('m_sepatu');
	}

	function index($type = '', $param_id = '')
	{
		//| 	Start Core Resit API
		eval(base64_decode(rest_api_resitcore()));

		$page = (int)$this->input->get('page');
		$limit = $this->input->get('limit');
		$offset = $this->input->get('offset');
		$search = $this->input->get('s');

		$page = (int)(($page != null && $page > 0) ? $page : '1');
		$response_error = false;
		$response_pagging = true;
		$response_result = true;
		$and_where = array();
		$or_where = array();
		$limit = (($limit != null) ? $limit : '10');
		$offset = (($offset != null) ? $offset : '0');
    $offset = $page > 1 ? offset($limit, $page) : $offset;
		$page = $page <= 1 ? floor(( $offset + $limit ) / $limit) : $page;
		
		//| 	Auto Create Variable ( Bulk with prefix $i_ )
		$v_input_list = array('id_sepatu', 'nama', 'harga', 'deskripsi', 'stok', 'terjual', 'foto', 'created_at');
		eval(ac_input_variabel($v_input_list));

		//| 	Auto Create Variable for Input Post ( Bulk )
		$v_post_list = array('nama','harga','deskripsi','stok', 'foto');
		eval(ac_input_post($v_post_list));
		
		//| 	Deklarasi Array $input untuk inject ke database
		$input['created_at'] = date_now();
		$input['terjual'] = 0;
		
		/*|=========================================================|
		**| 	Jika ada pertanyaan :
		**| 	Kenapa kondisi dibawah tidak dibuat Bulk Otomatis ?
		**| 	
		**| 	Jawaban : 
		**| 	Karna Saya belum menemukan Logika sederana 
		**| 	untuk bulk otomatis dibawah 
		**|=========================================================|*/

		//| 	Kondisi input field nama
		if(!empty($post_input['nama'])){
			$input['nama'] = $post_input['nama'];
		}
		
		//| 	Kondisi input field harga
		if(!empty($post_input['harga'])){
			$input['harga'] = $post_input['harga'];
		}
		
		//| 	Kondisi input field deskripsi
		if(!empty($post_input['deskripsi'])){
			$input['deskripsi'] = $post_input['deskripsi'];
		}
		
		//| 	Kondisi input field stok
		if(!empty($post_input['stok'])){
			$input['stok'] = $post_input['stok'];
		}
		
		//| 	Membuat Kondisi Untuk RestFull API
		switch ($type)
    {
      //    API RESPONSE - DETAIL DATA
			case 'detail':
				$response_pagging = false;
				if (!empty($param_id)){
					$and_where['a.notification_id'] = $param_id;
					$eksekusi_query_detail = $this->m_sepatu->detail($and_where);
					if (is_array($eksekusi_query_detail)){
						if (count($eksekusi_query_detail) > 0){
							$api_status = TRUE;
							$api_code = 200;
							$api_message = http_status_code($api_code);
							$api_datas = $this->_translate_detail($eksekusi_query_detail[0]);
						}else{
							$api_code = 204;
							$api_message = http_status_code($api_code);
						}
					}
				}
				break;
        
      //    API RESPONSE - DELETE DATA
			case 'delete':
				$response_result = false;
				$cek_keberadaan_data = 0;
				if (!empty($param_id)){
					$and_where['id_sepatu'] = $param_id;
					$cek_keberadaan_data = get_count($this->master_table, $and_where);
				}
				if ($cek_keberadaan_data > 0){
					$hapus_data = $this->m_sepatu->delete_data($and_where);
					if ($hapus_data){
						$api_status = TRUE;
						$api_code = 205;
						$api_message = http_status_code($api_code);
					}else{
						$api_code = 500;
						$api_message = http_status_code($api_code);
					}
				}else{
					if(!empty($param_id)){
						$api_code = 404;
						$api_message = http_status_code($api_code);
					}else{
						$api_code = 400;
						$api_message = http_status_code($api_code);
					}
				}
				break;
        
      //    API RESPONSE - SAVE DATA
			case 'create':
				$response_error = true;
				$response_pagging = false;
				$response_result = false;
				 
				/*|=========================================================|
				**| 	Validasi Input Create
				**| 	
				**| 	Catatan : 
				**| 	Terkadang validasi Create beda dengan Update 
				**|=========================================================|*/
				$this->form_validation->set_rules($i_nama, 'Nama Sepatu', 'required|strip_tags|trim|max_length[200]');
				$this->form_validation->set_rules($i_harga, 'Harga', 'required|strip_tags|trim|numeric|max_length[100]');
				$this->form_validation->set_rules($i_deskripsi, 'Deskripsi', 'required|strip_tags|trim|max_length[100]');
				$this->form_validation->set_rules($i_stok, 'Stok', 'required|strip_tags|trim|numeric');
				
				$upload_thumbnail	= $this->attach_model->attach_thumbnail($i_foto);
				if($this->form_validation->run()){ //| Jika inputan sesuai Peraturan Validasi
					$upload_thumbnail	= $this->attach_model->attach_thumbnail($i_foto);
					if($upload_thumbnail[0]){
						$input['foto'] = $upload_thumbnail[1];
					}
					
					$create = $this->m_sepatu->create_data($input); //| Melakukan Input data
					if($create){
						$api_status = TRUE;
						$api_code = 201;
						$api_message = http_status_code($api_code);
					}else{
						$api_code = 400;
						$api_message = http_status_code($api_code);
					}
				}else{
					$data_error = array();
					$error_code = error_generator_v2($v_input_list); //| Membuat variable otomatis untuk error handler
					
					eval($error_code['variabel']);
					eval($error_code['condition']);

					$api_message = 'Mohon sesuaikan kolom yang anda input';
					$api_error = $data_error;
				}
				break;
        
      //    API RESPONSE - UPDATE DATA
			case 'edit':
				$response_error = true;
				$response_result = false;
				$response_result = false;


				/*|=========================================================|
				**| 	Validasi Input Update
				**| 	
				**| 	Catatan : 
				**| 	Terkadang validasi Update beda dengan Create 
				**|=========================================================|*/
				$this->form_validation->set_rules($i_nama, 'Nama Sepatu', 'required|strip_tags|trim|max_length[200]');
				$this->form_validation->set_rules($i_harga, 'Harga', 'required|strip_tags|trim|numeric|max_length[100]');
				$this->form_validation->set_rules($i_deskripsi, 'Deskripsi', 'required|strip_tags|trim|max_length[100]');
				$this->form_validation->set_rules($i_stok, 'Stok', 'required|strip_tags|trim|numeric');
				
			 	if(!empty($param_id)){ //| Jika ID untuk Update tidak kosong, maka lakukan Code dibawah
					$upload_thumbnail	= $this->attach_model->attach_thumbnail($i_foto);
					if($this->form_validation->run()){ //| Jika inputan sesuai Peraturan Validasi
						$upload_thumbnail	= $this->attach_model->attach_thumbnail($i_foto);
						if($upload_thumbnail[0]){
							$input['foto'] = $upload_thumbnail[1];
						}

						$and_where['id_sepatu'] = $param_id; //| Where Untuk Update
						$update = $this->m_sepatu->update_data($input, $and_where); //| Melakukan Update
						if($update){
							$api_status = TRUE;
							$api_code = 200;
							$api_message = "Update Success";
						}else{
							$api_code = 400;
							$api_message = http_status_code($api_code);
						}
					}else{
						$data_error = array();
						$error_code = error_generator_v2($v_input_list); //| Membuat variable otomatis untuk error handler
						
						eval($error_code['variabel']);
						eval($error_code['condition']);

						$api_message = 'Mohon sesuaikan kolom yang anda input';
						$api_error = $data_error;
					}
			 	}else{
			 		$api_code = 400;
			 		$api_message = http_status_code($api_code);
			 	}

				break;
        
      //    API RESPONSE - LIST DATA
			default:
				$api_limit = $limit;
				$api_offset = $offset;
        $api_page = $page;
        
				$eksekusi_query = $this->m_sepatu->list($limit, $offset, $and_where, null, $search)->get()->result_array();
				$api_total_data = $this->m_sepatu->total($and_where, null, $search);
        $api_total_page = jumlah_page($api_limit, $api_total_data);
        
        if($page > 0 && $page <= $api_total_page)
        {
          if (is_array($eksekusi_query))
          {
            if (count($eksekusi_query) > 0)
            {
              $api_status = TRUE;
              $api_code = '200';
              $api_message = http_status_code($api_code);
              $api_datas = $this->_translate_list($eksekusi_query);
            }
            else
            {
              $api_code = '204';
              $api_message = http_status_code($api_code);
            }
          }
        }else{
          $api_code = '500';
          $api_message = http_status_code($api_code);
        }
				break;
		}
		eval(rest_api_response($response_error, $response_pagging, $response_result));
		eval(base64_decode('ZWNob19hcGkoJGhhc2lsKTs='));
	}

	function detail($id = '')
  {
		$this->index('detail', $id);
	}

	function delete($id = '')
  {
		$this->index('delete', $id);
	}

	function create()
  {
		$this->index('create');
	}

	function edit($id = '')
  {
		$this->index('edit', $id);
	}

  function _translate_detail($list_data)
  {
    $hasil = array();
    if(!empty($list_data))
    {
      if (is_array($list_data))
      {
				foreach ($list_data as $index_detail => $value)
				{
					if($index_detail == 'read')
					{
						$hasil[$index_detail] = (bool) $value;
					}
					else
					{
						$hasil[$index_detail] = $value;
					}
				}
      }
    }
    return $hasil;
  }
  function _translate_list($list_data)
  {
    $hasil = array();
    if(!empty($list_data))
    {
      if (is_array($list_data))
      {
        foreach ($list_data as $data_count => $detail_data)
        {
          foreach ($detail_data as $index_detail => $value)
          {
            if($index_detail == 'read')
            {
              $hasil[$data_count][$index_detail] = (bool) $value;
            }
            else
            {
              $hasil[$data_count][$index_detail] = $value;
            }
          }
        }
      }
    }
    return $hasil;
  }
}
