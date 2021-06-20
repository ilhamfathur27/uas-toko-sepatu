<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends MY_Model{
    public $master_tabel = 'm_shoes';
    public function __construct(){
        parent::__construct();
    }
    function data_list($limit = '',$offset = '',$and_where = array(),$or_where = array(),$search = '', $order = ''){
        $kolom_search               = array( 'a.name', 'a.price' );
        
		$select_query 				= "a.*, min(b.price) as low_price, max(b.price) as high_price, c.image_name";
        $master_tabel 				= $this->master_tabel.' a';
        $group_by 					= 'a.shoes_id';
        
        $join1_tabel 	            = 'r_shoes_variants b';
        $join1_on                   = 'b.shoes_id = a.shoes_id';
        $join1_method               = 'LEFT';
        
        $join2_tabel 	            = 'r_shoes_images c';
        $join2_on                   = 'c.shoes_id = a.shoes_id AND c.is_thumbnail = 1';
        $join2_method               = 'LEFT';

        $eksekusi_query 			= $this->data($select_query,$master_tabel,$and_where,$or_where,null,null,null,null,$limit,$offset,null,$search,$kolom_search)
                                      ->join($join1_tabel, $join1_on, $join1_method)
                                      ->join($join2_tabel, $join2_on, $join2_method)
                                      ->group_by($group_by)
                                      ->order_by($order);
    	return $eksekusi_query;
    }
    function jumlah_data($and_where = array(),$or_where = array(),$search = ''){
		$kolom_search 					= array( 'a.judul', 'a.url' );
        $select_query                   = 'a.*';                                      
        $master_tabel 					= 'resit_m_artikel a';
    	$eksekusi_query 				= $this->data($select_query,$master_tabel,$and_where,$or_where,null,null,null,null,null,null,null,$search,$kolom_search)->count_all_results();
    	return $eksekusi_query;
    }
    function delete_artikel($and_where = array(),$or_where = array()){
    	$eksekusi_query					= $this->delete($and_where,$or_where,'resit_m_artikel');
    	return $eksekusi_query;
    }
    function detail_artikel($and_where = array(), $or_where = array()){
		$select_query                   = 'a.kode_artikel, a.id_user, IF(b.nama IS NULL, b.nama, b.username) AS nama_user, b.foto, b.tentang_saya, a.judul, a.parent_artikel, a.isi, a.url, a.status, a.visibility, a.hide_header, a.hide_navbar, a.hide_footer, a.hide_sidebar, a.share, a.tags, a.tanggal_create, a.tanggal_update, a.custom_css, a.custom_js, a.meta_deskripsi, a.meta_keywords, a.meta_author, a.meta_facebook_url, a.meta_facebook_type, a.meta_facebook_title, a.meta_facebook_deskripsi, a.meta_facebook_image, a.meta_facebook_sitename, a.meta_facebook_appid, a.meta_twitter_title, a.meta_twitter_deskripsi, a.meta_twitter_image, a.meta_twitter_card, a.meta_twitter_site, a.meta_twitter_creator, a.dilihat, a.thumbnail, b.foto_sampul';

        $master_tabel 					= 'resit_m_artikel a';
        $tabel_join1_query              = 'resit_user b';
        $on_join1_query                 = 'a.id_user = b.id_user';
        $method_join1_query             = 'LEFT';
    	$eksekusi_query 				= $this->data($select_query, $master_tabel, $and_where, $or_where)->join($tabel_join1_query, $on_join1_query, $method_join1_query)->get()->result_array();
    	return $eksekusi_query;
    }
    function create_artikel($data = array()){
        $eksekusi_query                 = $this->save($data, 'resit_m_artikel');
        return $eksekusi_query;
    }
    function update_artikel($data = array(), $and_where = array(), $or_where = array()){
        $eksekusi_query                 = $this->update($data, $and_where, $or_where, 'resit_m_artikel');
        return $eksekusi_query;
    }
}