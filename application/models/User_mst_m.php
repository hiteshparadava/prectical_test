<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User_mst_m extends MY_Model{
		protected $table = "user";
        protected $primary_key = "u_id";
        protected $fields = array('u_id','u_user_name','u_password','u_cart');
	}
?>