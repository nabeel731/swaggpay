<?php
class Controller
{
	protected $helper;
	protected $custom;
	protected $db;
	protected $email;

	function __construct()
	{
		if(!in_array($_GET['route'],['login']) || strtolower($_SERVER['REQUEST_METHOD']) == 'post'){
			$this->db=new DB();
			$this->custom=new Custom();
		}
		$this->helper=new Helper();
		$this->email=new Email();
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}
	}
}
