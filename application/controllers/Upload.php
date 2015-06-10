<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('session');
		$this->load->library('form_validation');
	}


	//function to display the upload page
	public function ShowUpload()
	{
		//if the user is logged
		if($this->session->userdata('logged') == true)
		{
			//display the upload view
			$this->load->view('upload_view');
		}
	}


	//function to upload a file
	public function new_file()
	{

	}


	//function to display files of a user
	public function files($username)
	{
		//if the user is logged and his username if the same as the profile he's trying to access
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			//show the files view
			$this->load->view('files_view');
		}
		else
		{
			//else redirect to the index
			redirect();
		}
	}
}