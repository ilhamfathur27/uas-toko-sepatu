<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Attach_model extends MY_Model {

    function __construct(){
        parent::__construct();
        $this->load->library('image_lib');
    }

    function attach_thumbnail($variabel_file = ''){
        $id_user                        = $this->session->userdata('id_user');
        $error                          = array();
        $hasil                          = '';
        $upload_path                    = './uploads/images/sepatu/';
        $extensi                        = 'jpg|jpeg|png|bmp';
        $config['allowed_types']        = $extensi;
        $config['image_library']        = 'gd2';
        $config['max_size']             = 10*1024;
        $config['upload_path']          = $upload_path;
        $config['encrypt_name']         = true;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (isset($_FILES[$variabel_file])){
            if(!empty($_FILES[$variabel_file])){
                $file_name              = $_FILES[$variabel_file]['name'];
                $file_type              = $_FILES[$variabel_file]['type'];
                $file_tmp_name          = $_FILES[$variabel_file]['tmp_name'];
                $file_error             = $_FILES[$variabel_file]['error'];
                $file_size              = $_FILES[$variabel_file]['size'];
                
                if (!$this->upload->do_upload($variabel_file)){
                    $error[]                        = $this->upload->display_errors();
                }else{
                    $data                           = $this->upload->data();
                    if (is_array($data) && (!empty($data))) {
                        $rasio                          = abs($data['image_height'] - $data['image_width']);
                        $img_conf['image_library']      = 'gd2';
                        $img_conf['source_image']       = './uploads/images/sepatu/'. $data['file_name'];
                        $img_conf['new_image']          = './uploads/images/sepatu/resize/';
                        $img_conf['maintain_ratio']     = TRUE;
                        $img_conf['create_thumb']       = TRUE;
                        $img_conf['thumb_marker']       = '';
                        $img_conf['width']              = 270;
                        $img_conf['quality']            = 25;

                        $this->image_lib->initialize($img_conf);
                        if(!$this->image_lib->resize()){
                            $error[]                    = $this->image_lib->display_errors();
                        }
                        $hasil                          = $data['file_name'];
                    }
                }
            }else{
                $error[]                                = 'Tidak yang diupload kosong';
            }
        }else{
            $error[]                                    = 'Tidak ada file yang diupload';
        }

        if(!empty($error)){
            return array(FALSE, $error);
        }else{
            return array(TRUE, $hasil);
        }
    }
}
