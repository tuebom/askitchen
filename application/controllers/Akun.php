<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		
		$this->lang->load('account');
		
		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		
		$this->load->model('provinsi_model');
		$this->load->model('kabupaten_model');
		$this->load->model('kecamatan_model');
		// $this->output->enable_profiler(TRUE);
    }


	public function index()
	{
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
		
		if ($this->ion_auth->logged_in())
        {
			// siapkan data member

			$member = $this->ion_auth->user()->row();
			$this->data['anggota']  = $member;
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
			elseif ($page === 'bs') {
				$this->load->view('akun/belanja-bs', $this->data);
			}
			else { // histori
				$this->load->view('akun/histori', $this->data);
			}
			$this->load->view('layout/footer', $this->data);

			return;
		}
		else // halaman profil
		{
			$this->data['provinsi']  = $this->provinsi_model->get_all();
			$this->data['kabupaten'] = $this->kabupaten_model->get_by_province_id($member->province);
			$this->data['kecamatan'] = $this->kecamatan_model->get_by_regency_id($member->regency);
		}

		
		$submit = $this->input->post('submit1');

        if ($submit) {

			// $this->form_validation->set_rules('email', 'Email', 'required');
			
			// if ($this->form_validation->run() == TRUE)
			// {
			// 	// send email
			// }
			// else
			// {
			// 	$this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');
			// }

			$id = $this->input->post('mbrid');

			$user_data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'company'    => $this->input->post('company'),
				'address'    => $this->input->post('address'),
				'province'   => $this->input->post('province'),
				'regency'    => $this->input->post('regency'),
				'district'   => $this->input->post('district'),
				'post_code'  => $this->input->post('post_code'),
				'phone'      => $this->input->post('phone'),
				'email'      => $this->input->post('email'),
			);
		
			$this->db->where('id =', $id);
			$this->db->update('users', $user_data);
		}

		$this->load->view('layout/header', $this->data);
		$this->load->view('akun/profil', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function regencies()
	{
		$provid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kabupaten_model->search($provid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}

	public function districts()
	{
		$kbpid = $this->uri->segment(3);
		// $provid = $this->input->post("id");
		$data = $this->kecamatan_model->search($kbpid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}
}
