<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Public_Controller {

    public function __construct()
    {
        parent::__construct();
		$this->load->model('golongan_model');
    }


	public function index()
	{
		// $this->load->view('public/home', $this->data);
		$this->load->view('layout/header', $this->data);
		$this->load->view('dashboard/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
