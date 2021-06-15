<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {
    public $db, $ndb;
    function __construct(){
        parent::__construct();
        ini_set('max_execution_time', '-1');
        ini_set('memory_limit','-1');
        $this->db = $this->load->database('default',true);
		$this->ndb = 'default';
	}
	function data($select = '*', $tabel = '', $and_where=array(), $or_where=array(), $and_where_in = array(), $or_where_in = array(), $having = array(), $or_having = array(), $limit=0, $offset=0, $order = '', $like = '', $field_like = '', $usedb = 'default'){
		$usedb = $this->load->database($usedb,true);
		
		if($select != null && $select != '' && $select != '*') {
			$usedb->select($select);
		}
		
		$usedb->from($tabel);

		if(is_array($and_where)){
			$usedb->where($and_where);
		}
		
		if(is_array($or_where)){
			$usedb->or_where($or_where);
		}

		if(is_array($and_where_in)){
			if(count($and_where_in) == 2){
				if(isset($and_where_in[0]) AND isset($and_where_in[1])){
					if(is_string($and_where_in[0]) AND is_array($and_where_in[1])){
						$usedb->where_in($and_where_in[0], $and_where_in[1]);
					}
				}
			}
		}

		if(is_array($or_where_in)){
			if(count($or_where_in) == 2){
				if(isset($or_where_in[0]) AND isset($or_where_in[1])){
					if(is_string($or_where_in[0]) AND is_array($or_where_in[1])){
						$usedb->or_where_in($or_where_in[0], $or_where_in[1]);
					}
				}
			}
		}

		if(is_array($having)){
			$usedb->having($having);
		}
		
		if(is_array($or_having)){
			$usedb->or_having($or_having);
		}
		
		if($like){
			if(is_array($field_like)){
				$usedb->group_start();
				$i=0;
				foreach($field_like as $key => $value){
					if($i==0){
						$usedb->like($value,$like);
					}else{
						$usedb->or_like($value,$like);
					}
					$i++;
				}
				$usedb->group_end();
			}else{
				$usedb->like($field_like,$like);
			}
		}
		
		if($order){
			$usedb->order_by($order);
		}
		
		if ($limit > 0){
			$usedb->limit($limit,$offset);
		}
		
		return $usedb;
	}
    function save($data = array(), $table = '', $usedb = 'default'){
		$usedb 				= $this->load->database($usedb,true);
        return $usedb->insert($table, $data);
    }
    function save_batch($data = array(), $table = '', $usedb = 'default'){
		$usedb 				= $this->load->database($usedb,true);
        return $usedb->insert_batch($table, $data);
    }
    function update($set = array(),$and_where = array(),$or_where = array(),$tabel = '', $usedb = 'default'){
		$usedb 				        = $this->load->database($usedb,true);
    	$update 			        = $usedb->set($set);

        if(is_array($and_where)){
            if(!empty($and_where)){
                $update             = $usedb->where($and_where);
            }
        }
        if(is_array($or_where)){
            if(!empty($or_where)){
                $update             = $usedb->or_where($or_where);
            }
        }

    	$update 			        = $usedb->update($tabel);
    	return $update;
    }
    function delete($and_where = array(),$or_where = array(),$tabel = '', $usedb = 'default'){
		$usedb 				= $this->load->database($usedb,true);
    	$hasil 				= FALSE;
    	if ((!empty($and_where) OR !empty($or_where)) AND $tabel != NULL){
    		if(is_array($and_where)){
    			if(!empty($and_where)){
    				$hasil	= $usedb->where($and_where);
    			}
    		}
    		if(is_array($or_where)){
    			if(!empty($or_where)){
    				$hasil	= $usedb->or_where($or_where);
    			}
    		}
    		$hasil 			= $usedb->delete($tabel);
    	}
    	return $hasil;
    }
    function reset($tabel = '', $usedb = 'default'){
		$usedb 				= $this->load->database($usedb,true);
    	return $usedb->truncate($tabel);
    }
    function navbar_landing_page(){
        $select_query                           = '*';
        $from_query                             = 'resit_m_front_menu';
        $and_where_query['status_aktif']        = '1';
        $eksekusi_query                         = $this->data($select_query, $from_query, $and_where_query)->order_by('urutan ASC')->get()->result_array();

        return $eksekusi_query;
    }
    function sidebar_menu($id_user = ''){
    	$where 	= array(
    					'a.id_user' 			=> $id_user,
    					'd.status_aktif' 		=> '1'
    					);
    	$this->db->select('a.id_user, b.nama as nama_role, d.id_menu, d.id_parent, d.judul, d.url, d.urutan, d.target, d.icon, d.hidden_menu, c.akses_view, c.akses_create, c.akses_update, c.akses_delete, c.akses_print');
    	$this->db->from('resit_user a');
    	$this->db->join('resit_m_role b','b.id_role = a.id_role','RIGHT');
    	$this->db->join('resit_mapping_otoritas_role c','c.id_role = b.id_role','LEFT');
    	$this->db->join('resit_m_back_menu d','c.id_menu = d.id_menu','RIGHT');
    	$this->db->where($where);
    	$this->db->order_by('d.urutan ASC');
    	$query = $this->db->get();
    	
    	return $query;
    }
    function sidebar_menu_parent($id_user = ''){
    	$where 	= array(
    					'a.id_user' 			=> $id_user,
    					'd.status_aktif' 		=> '1',
    					'd.id_parent IS NULL' 	=> NULL
    					);
    	$this->db->select('a.id_user, b.nama as nama_role, d.id_menu, d.id_parent, d.judul, d.url, d.target, d.icon, d.hidden_menu, c.akses_view, c.akses_create, c.akses_update, c.akses_delete, c.akses_print');
    	$this->db->from('resit_user a');
    	$this->db->join('resit_m_role b','b.id_role = a.id_role','RIGHT');
    	$this->db->join('resit_mapping_otoritas_role c','c.id_role = b.id_role','LEFT');
    	$this->db->join('resit_m_back_menu d','c.id_menu = d.id_menu','RIGHT');
    	$this->db->where($where);
    	$this->db->order_by('d.urutan ASC');
    	$query = $this->db->get();
    	
    	return $query;
    }
    function sidebar_menu_child($id_user = ''){
    	$where 	= array(
    					'a.id_user' 		=> $id_user,
    					'd.status_aktif' 	=> '1',
    					'd.id_parent IS NOT NULL' 	=> NULL
    					);
    	$this->db->select('a.id_user, b.nama as nama_role, d.id_menu, d.id_parent, d.judul, d.url, d.target, d.icon, d.hidden_menu, c.akses_view, c.akses_create, c.akses_update, c.akses_delete, c.akses_print');
    	$this->db->from('resit_user a');
    	$this->db->join('resit_m_role b','b.id_role = a.id_role','RIGHT');
    	$this->db->join('resit_mapping_otoritas_role c','c.id_role = b.id_role','LEFT');
    	$this->db->join('resit_m_back_menu d','c.id_menu = d.id_menu','RIGHT');
    	$this->db->where($where);
    	$this->db->order_by('d.urutan ASC');
    	$query = $this->db->get();
    	
    	return $query;
    }
}
