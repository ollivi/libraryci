<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Folder_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		$this->load->helper("file");
	}


}
?>