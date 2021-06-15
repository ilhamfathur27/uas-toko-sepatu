<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template {
	var $template_data = array();
	function set($name, $value){
		$this->template_data[$name] = $value;
	}
	function load($template = '', $view = '' , $view_data = array(), $return = FALSE){               
		$this->CI =& get_instance();
		$this->CI->load->helper('slice');
		$this->CI->load->library('slice');

		$this->set('contents', $this->CI->slice->view($view, $view_data, TRUE));

		return $this->CI->slice->view($template, $this->template_data, $return);
	}
}