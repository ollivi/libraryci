<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('upload_model');
		$this->load->helper('url');
		$this->load->helper('html');
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
		//if the array $_FILES is not empty
		if(!empty($_FILES))
		{
			$name = $_FILES['file']['name'];

			//set a random name to avoid duplicates
			$tmp_name = rand(0, 999).time().$_FILES['file']['name'];

			//path for miniatures
			$min_path = 'public/uploads/' . $tmp_name;

			$config['upload_path'] = './public/uploads/';

			//this line is the list of the extensions that are allowed to be uploaded to avoid security problems
			$config['allowed_types'] = 'gif|jpg|png|jpeg|txt|pdf|bmp|docx';

			$this->load->library('upload', $config);

			if($this->upload->do_upload("file"))
			{
				$this->upload_model->add_file($tmp_name, $name, $min_path);
			}
		}
	}


	//function to display files of a user
	public function files($username)
	{
		//if the user is logged and his username if the same as the profile he's trying to access
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			//get the files of this user
			$data = $this->upload_model->user_files();
			$info = array('info' => $data);

			//show the files view
			$this->load->view('files_view', $info);
		}
		else
		{
			//else redirect to the index
			redirect();
		}
	}


	//function to display the update view for files
	public function update($username, $id)
	{
		//if the user is logged and his username if the same as the profile he's trying to access
		if($this->session->userdata('logged') == true && $this->session->userdata('username') == $username)
		{
			$info = array('id' => $id);

			//show the file update view
			$this->load->view('update_file_view', $info);
		}
		else
		{
			//else redirect to the index
			redirect();
		}
	}


	public function update_filename($user_id, $id)
	{
		$this->upload_model->update_file($user_id, $id);
	}


	public function delete_file($user_id, $id)
	{
		$this->upload_model->remove_file($user_id, $id);
	}


	//function to search a file
	public function search($username)
	{
		$data = $this->upload_model->get_info();

		$info = array('info' => $data);

		$this->load->view('search_result_view', $info);
	}
}