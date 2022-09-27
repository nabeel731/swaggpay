<?php
class LandingController extends Controller
{
	
	public function index(){
	
		include 'views/products.php';
	}
	
	
	public function portfolioDeatils(){
		$data['settings']=$this->db->getSingleRowIfMatch("settings",'id',0,'>');
		include 'views/portfolio-details.php';
	}
	
	public function signup()
	{
		include 'views/signup.php';
	}
	
    public function login()
	{
		include 'views/login.php';
	}
	
	public function home()
	{
		$setting=$this->db->getSingleRowIfMatch("settings",'id',0,'>');
		include 'views/index.php';
	}
}
