<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends Public_Controller {

    public function __construct()
    {
		parent::__construct();

		$this->load->model('golongan_model');
		$this->load->model('stock_model');
		$this->load->model('reviews_model');
		// unset($_SESSION["cart_item"]);
		// $this->output->enable_profiler(TRUE);
	}

	
	public function index()
	{
		// $this->load->config('common/dp_config');

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}
        
        // $kdgol = $this->uri->segment(2);
        $kode = $this->uri->segment(2);
		
		$this->data['product'] = $this->stock_model->get_by_kodeurl($kode);
		$this->data['related'] = $this->stock_model->get_related($this->data['product']->kdgol2, $kode);

		$action  = $this->input->get('action');
		
		if ($action) {

			$data = array(
				"kdbar"    => $this->input->post('kdbar'),
				"name"     => $this->input->post('name'),
				"email"    => $this->input->post('email'),
				"comment"  => $this->input->post('comment')
			);
			
			$captcha  = $this->input->post('captcha');
			$url 	  = $this->input->post('url');

			// if ($captcha == $_SESSION['captcha_session'])
			if ($captcha == $this->session->userdata('captcha_session'))
			{
				$this->reviews_model->insert($data);
				header("location: ".$url);
			}
			else
			{
				// $this->session->set_flashdata('message', 'Kode yang Anda masukkan tidak cocok.');
				$this->data['name']    = $this->input->post('name');
				$this->data['email']   = $this->input->post('email');
				$this->data['comment'] = $this->input->post('comment');
				$this->data['message'] = 'Kode yang Anda masukkan tidak cocok.<br>'.
				$this->session->userdata('captcha_session');
			}
		}
		
		$this->data['reviews']    = $this->reviews_model->get_limit_data(3,0,$kode);
		$this->data['totreviews'] = $this->reviews_model->total_rows($kode);

		$this->load->view('layout/header', $this->data);
		$this->load->view('detail/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	
	public function captcha()
	{
		header("Content-type: image/png");

		$captcha_image = imagecreatefrompng("<?=site_url('images/captcha.png')?>");
		$captcha_font = imageloadfont("<?=site_url('images/font.gdf')?>");
		$captcha_text = substr(md5(uniqid('')),-6,6);
		
		$this->session->set_userdata('captcha', $captcha_text);
		
		$captcha_color = imagecolorallocate($captcha_image,0,0,0);
		imagestring($captcha_image,$captcha_font,15,5,$captcha_text,$captcha_color);
		imagepng($captcha_image);
		imagedestroy($captcha_image);
	}
}
