<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		
		$this->lang->load('account');
		
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		// $this->output->enable_profiler(TRUE);
    }


	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		$page = $this->input->get('p');

		if ($page) {
			$this->load->view('layout/header', $this->data);
			if ($page === 'bb') {
				$this->load->view('akun/belanja-bb', $this->data);
			}
			elseif ($page === 'bk') {
				$this->load->view('akun/belanja-bk', $this->data);
			}
			elseif ($page === 'bt') {
				$this->load->view('akun/belanja-bt', $this->data);
			}
			else { // selesai
				$this->load->view('akun/belanja-bs', $this->data);
			}
			$this->load->view('layout/footer', $this->data);

			return;
		}
		
		if (!$this->ion_auth->logged_in())
        {
			// siapkan data member
			$this->data['anggota'] = $this->ion_auth->user()->row();
        }

		// $this->form_validation->set_rules('email', 'Email', 'required');
		
		// if ($this->form_validation->run() == TRUE)
		// {
		// 	// send email
		// }
		// else
		// {
		// 	$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
		// }

		$this->load->view('layout/header', $this->data);
		$this->load->view('akun/profil', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
