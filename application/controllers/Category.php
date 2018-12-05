<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('product_mst_m','user_mst_m'));
	}
	
	public function index()
	{
		$this->load->view('cart');
	}


	public function get_all_category()
	{
		$data=$this->getCategoryTree();
		echo json_encode($data);
	}
	public function getCategoryTree($p_id=0)
	{
	    $main_category_qry = "SELECT * FROM all_category WHERE ac_p_id=".$p_id;
	    $main_category_data = $this->db->query($main_category_qry)->result_array();
	    foreach ($main_category_data as $mcd=>&$main_category_data_array) 
	    {   
	        $main_category_data_array['sub_cat']=$this->getCategoryTree($main_category_data_array['ac_id']);
	    }
	    return $main_category_data;
	}

	public function get_product($id)
	{
		$product_list=$this->product_mst_m->get_all(array('p_category_id'=>$id));
		$data=array('product_list'=>$product_list);
		$this->load->view('welcome_message',$data);
		$this->load->view('product_list');
	}

	public function add_to_cart()
	{
		$p_id=$_POST['p_id'];
		$user_data=$this->session->userdata('cart_sessaion');
		$product_detail=$this->product_mst_m->get_all($p_id);
		$array_session = $product_detail;
		if(empty($user_data))
		{
			$this->session->set_userdata('cart_sessaion',$array_session);
		}
		else
		{
			$product_detail=$this->product_mst_m->get($p_id);
			array_push($user_data, $product_detail);
			$this->session->set_userdata('cart_sessaion',$user_data);
		}
	}

	public function remove_from_cart()
	{
		$p_id=$_POST['p_id'];
		$user_data=$this->session->userdata('cart_sessaion');
		$new_array=array();
		$status='0';
		foreach ($user_data as $ud) 
		{
			if($status=='0')
			{
				if($ud['p_id']==$p_id)
				{
					$status='1';
				}
				else
				{
					array_push($new_array, $ud);
				}
			}
			else
			{
				array_push($new_array, $ud);
			}
		}
		$this->session->set_userdata('cart_sessaion',$new_array);
	}
}
