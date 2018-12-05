<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Product_mst_m extends MY_Model{
		
		protected $table = "product";
        protected $primary_key = "p_id";
        protected $fields = array('p_id','p_name','p_price','p_qty','p_category_id');
	}
?>