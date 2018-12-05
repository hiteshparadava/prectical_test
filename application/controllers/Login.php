<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
		if($_POST)
		{
			$uname=$_POST['uname'];
			$psw=$_POST['psw'];

			$user_data=$this->user_mst_m->get(array('u_user_name'=>$uname,'u_password'=>$psw));
			if(!empty($user_data))
			{
				$u_cart=json_decode($user_data['u_cart'],true);
				$cart_sessaion=$this->session->userdata('cart_sessaion');
				if(!empty($cart_sessaion))
				{
					if (!empty($u_cart)) 
					{
						foreach ($u_cart as $uc)
						{
							array_push($cart_sessaion, $uc);
						}	
					}
				}
				else
				{
					$cart_sessaion=$u_cart;
				}

				$this->session->set_userdata('user_sessaion',$user_data);
				$this->session->set_userdata('cart_sessaion',$cart_sessaion);
				$cart_data=$this->session->userdata('cart_sessaion');
				$this->session->set_flashdata('success', 'Successfully...');
				redirect('welcome');
			}
			else
			{
				$this->session->set_flashdata('error', 'Username or password not match..');
				redirect('login');
			}
		}
		$this->load->view('login');
	}
	public function logout()
	{
		$user_data=$this->session->userdata('user_sessaion');
		$user_id=$user_data['u_id'];
		$cart_data=$this->session->userdata('cart_sessaion');
		if(!empty($cart_data))
		{
			$cart_data_json=json_encode($cart_data);
		}
		else
		{
			$cart_data_json='';	
		}
		$update_data=array('u_cart'=>$cart_data_json);
		$this->user_mst_m->update($user_id,$update_data);
		$this->session->sess_destroy();
		redirect('welcome');
	}
}
