<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_transaksi extends MY_Model{
  private $master_tabel = 'master_transaksi';
  private $child_tabel = 'transaksi';
  private $kolom_search = array();

  public function __construct(){
    parent::__construct();
  }

  function list($limit = '',$offset = '',$and_where = array(),$or_where = array(),$search = ''){
    $select_query = 'a.id_keranjang, a.id_user, a.id_sepatu, b.nama as nama_user, c.nama as nama_sepatu, c.harga, a.kuantitas, (c.harga * a.kuantitas) as total_harga';
    $kolom_search = $this->kolom_search;
    $master_tabel = $this->master_tabel.' a';
    $eksekusi_query = $this->data($select_query,$master_tabel,$and_where,$or_where,null,null,null,null,$limit,$offset,null,$search,$kolom_search)->join("users b", "a.id_user = b.id_user", "LEFT")->join("sepatu c", "a.id_sepatu = c.id_sepatu", "LEFT");
    return $eksekusi_query;
  }

  function total($and_where = array(),$or_where = array(),$search = ''){
    $select_query = 'a.*';
    $kolom_search = $this->kolom_search;
    $master_tabel = $this->master_tabel.' a';
    $eksekusi_query = $this->data($select_query,$master_tabel,$and_where,$or_where,null,null,null,null,null,null,null,$search,$kolom_search)->count_all_results();
    return $eksekusi_query;
  }

  function detail($and_where = array(), $or_where = array()){
    $select_query = 'a.*';
    $master_tabel = $this->master_tabel.' a';
    $eksekusi_query = $this->data($select_query, $master_tabel, $and_where)->get()->result_array();
    return $eksekusi_query;
  }

  function delete_data($and_where = array(),$or_where = array()){
    $master_tabel = $this->master_tabel;
    $hapus_data = $this->delete($and_where, $or_where, $master_tabel);
    return $hapus_data;
  }

  function create_data($datas = array()){
    $master_tabel = $this->master_tabel;
    $eksekusi_query = $this->save($datas, $master_tabel);
    return $eksekusi_query;
  }

  function update_data($datas = array(), $and_where = array(), $or_where = array()){
    $master_tabel = $this->master_tabel;
    $eksekusi_query = $this->update($datas, $and_where, $or_where, $master_tabel);
    return $eksekusi_query;
  }

}