<?php
/* 
====================[ Contact Info ]=======================
==|                                                       |
==|     Created By Restu D. Cahyo                         |
==|     Youtube     : www.youtube.com/RestuDwiCahyo       |
==|     Instagram   : resitdc                             |
==|     Twitter     : resitdc                             |
==|     Facebook    : www.facebook.com/resitdc            |
==|     Whatsapp    : 081546416749                        |
==|                                                       |
===========================================================
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class CI_DB_ibase_utility extends CI_DB_utility {
	protected function _backup($filename){
		if ($service = ibase_service_attach($this->db->hostname, $this->db->username, $this->db->password)){
			$res = ibase_backup($service, $this->db->database, $filename.'.fbk');
			ibase_service_detach($service);
			return $res;
		}
		return FALSE;
	}
}