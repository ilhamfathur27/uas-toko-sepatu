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
        
        $this->form_validation->set_error_delimiters('', '');
        $this->form_validation->set_message('strip_tags', '%s tidak boleh mengandung karakter html.');
        $this->form_validation->set_message('required', '%s tidak boleh kosong.');
        $this->form_validation->set_message('max_length', '%s maximal karakter %s.');
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

    public function mobile_sp($view = '', $view_data = array(), $header = '', $footer = '', $meta = ''){
        $judul                          = 'The Things Corner';
        $view_data['judul']             = (isset($view_data['judul']) ? $view_data['judul'] : $judul);
        $view_data['header_tambahan']   = $header;
        $view_data['footer_tambahan']   = $footer;
        $view_data['meta_tambahan']     = $meta;

        // $view_data['konfigurasi']               = konfigurasi_web($konfigurasi);
        $this->slice->view($view, $view_data);
    }

}
