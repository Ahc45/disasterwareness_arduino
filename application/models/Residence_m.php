<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residence_m extends MY_Model
{
	protected $_table_name = 'residence';
	protected $_order_by = 'id';
	protected $_timestamps = TRUE;


	function get_data(){
		$this->db->select('Data,created');
		$this->db->limit('20');
		$this->db->order_by("id", "DESC");
		return $this->db->get($this->_table_name);
	}
}