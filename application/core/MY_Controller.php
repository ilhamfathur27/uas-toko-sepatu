<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller{

    public $class, $method, $is_print, $db, $ndb;
    public function __construct(){
        parent::__construct();
        ini_set('max_execution_time', '-1');
        ini_set('memory_limit', '-1');

        $this->db                   = $this->load->database('default', true);
        $this->ndb                  = 'default';
        $this->method               = $this->router->fetch_method();
        $this->class                = $this->router->fetch_class();
		$this->load->model('api/m_keranjang');

		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_message('strip_tags', '%s tidak boleh mengandung karakter html.');
		$this->form_validation->set_message('in_list', '%s harus sesuai pilihan yang tertera.');
		$this->form_validation->set_message('required', '%s tidak boleh kosong.');
		$this->form_validation->set_message('numeric', '%s harus berisi angka.');
		$this->form_validation->set_message('is_unique', '%s sudah digunakan user lain.');
		$this->form_validation->set_message('min_length', '%s minimal %s karakter.');
		$this->form_validation->set_message('max_length', '%s maximal karakter %s.');
		$this->form_validation->set_message('valid_email', '%s harus sebuah email yang aktif.');
		$this->form_validation->set_message('alpha', '%s hanya boleh berisikan huruf.');
    }

    public function mobile($view = '', $view_data = array(), $toolbar = false, $navbar = false, $toolbar_active = '', $header = '', $footer = '', $meta = ''){
        $template                       = 'template_user';
        $judul                          = 'The Things Corner';
        $view_data['judul']             = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $view_data['header_tambahan']   = $header;
        $view_data['footer_tambahan']   = $footer;
        $view_data['meta_tambahan']     = $meta;
        $view_data['style_none']        = 'style="display: none;"';
        $view_data['resit_toolbar']     = $toolbar;
        $view_data['resit_navbar']      = $navbar;
        $view_data['toolbar_active']    = (int) $toolbar_active;

        // $view_data['konfigurasi']               = konfigurasi_web($konfigurasi);
        $this->template->load($template, $view, $view_data);
    }

    public function page($view = '', $view_data = array()){
        $judul = 'Toko Sepatu';
        $view_data['judul'] = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $this->slice->view($view, $view_data);
    }

    public function lp($view = '', $view_data = array(), $header = '', $footer = '', $meta = ''){
        $judul                          = 'Toko Sepatu';
        $view_data['judul']             = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $view_data['header_tambahan']   = $header;
        $view_data['footer_tambahan']   = $footer;
        $view_data['meta_tambahan']     = $meta;

        $and_where['a.id_user'] = user("id_user");
        $jumlah_isi_keranjang = $this->m_keranjang->total($and_where);
        $view_data['jumlah_isi_keranjang'] = $jumlah_isi_keranjang;

        $this->view('template/landing_page/index', $view, $view_data);
    }

    public function admin($view = '', $view_data = array(), $header = '', $footer = '', $meta = ''){
        $judul                          = 'Toko Sepatu';
        $view_data['judul']             = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $view_data['header_tambahan']   = $header;
        $view_data['footer_tambahan']   = $footer;
        $view_data['meta_tambahan']     = $meta;

        $this->view('template/admin/index', $view, $view_data);
    }

    public function view($template = '', $view = '', $view_data = array(), $header = '', $footer = '', $meta = ''){
        $judul                          = 'Toko Sepatu';
        $view_data['judul']             = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $view_data['header_tambahan']   = $header;
        $view_data['footer_tambahan']   = $footer;
        $view_data['meta_tambahan']     = $meta;

        $this->template->load($template, $view, $view_data);
    }
}
