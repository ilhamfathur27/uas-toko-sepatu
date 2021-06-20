<?php
// echo password_hash("ganteng",PASSWORD_DEFAULT,array('cost' => 13));
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends MY_Controller{
	function __construct(){
		parent::__construct();
		header('Content-Type: application/json');
		$this->load->model('m_users');
	}

	function login()
  {
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$hasil['status'] = FALSE;
		$hasil['code'] = 403;
		$hasil['message'] = 'Email atau Password tidak boleh kosong';
		$hasil['redirect'] = "";
    
		if (!empty($email) AND !empty($password))
    {
			$cek_user = $this->m_users->find_user($email, $password);
			if ($cek_user->num_rows() == 1)
      {
				$data_user = $cek_user->result_array()[0];
        if ((bool)$data_user['status'])
        {
          $hasil['status'] = TRUE;
          $hasil['code'] = 200;
          $hasil['message'] = 'Login berhasil';
          $hasil['redirect'] = $data_user['role'] == 'admin' ? site_url("dashboard") : site_url("home");
          
          $data = array(
                        'user_login' => true,
                        'id_user' => $data_user['id_user'],
                        'nama' => $data_user['nama'],
                        'email' => $data_user['email'],
                        'status' => $data_user['status'],
                        'role' => $data_user['role'],
                        );
          $this->session->set_userdata($data);
        }
        else
        {
          $hasil['code'] = 400;
          $hasil['message'] = 'User dengan '.$email.' tidak aktif';
        }
			}
      else
      {
        $hasil['code'] = 404;
				$hasil['message'] = 'User tidak ditemukan';
			}
		}
		echo_api($hasil);
	}

  function register()
  {
		eval(base64_decode(rest_api_resitcore()));
		$v_input_list = array("id_user","nama","email","password","status","role");
		eval(ac_input_variabel($v_input_list));
		$v_post_list = array("nama","email","password");
		eval(ac_input_post($v_post_list));

    $response_error = true;
    $response_pagging = false;
    $response_result = false;
    
    $this->form_validation->set_rules($i_nama, 'Nama', 'required|strip_tags|trim|min_length[3]|max_length[150]');
    $this->form_validation->set_rules($i_email, 'Email', 'required|trim|valid_email|min_length[3]|max_length[200]|is_unique[users.email]');
    $this->form_validation->set_rules($i_password, 'Password', 'required');
    
		$input['nama'] = $post_input['nama'];
		$input['email'] = $post_input['email'];
		$input['password'] = md5($post_input['password']);
		$input['status'] = 1;
		$input['role'] = "customer";

    if($this->form_validation->run()){
      $create = $this->m_users->create_data($input);
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
      $error_code = error_generator_v2($v_input_list);
      
      eval($error_code['variabel']);
      eval($error_code['condition']);

      $api_message = 'Mohon sesuaikan kolom yang anda input';
      $api_error = $data_error;
    }

		eval(rest_api_response($response_error, $response_pagging, $response_result));
		eval(base64_decode('ZWNob19hcGkoJGhhc2lsKTs='));
  }
	function logout()
  {
		$this->session->sess_destroy();
		// $hasil['status'] = true;
		// $hasil['code'] = 200;
		// $hasil['message'] = 'Berhasil logout';
		// $hasil['redirect'] = base_url(); 
		// echo_api($hasil);
    
		redirect(base_url());
	}
}