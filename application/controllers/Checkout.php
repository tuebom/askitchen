<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
		$this->load->model('golongan_model');
    }


	public function index()
	{
		// $this->load->view('public/home', $this->data);
		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
		}

		/*if(!empty($_SESSION["cart_item"])) {

			if(in_array($kode, array_keys($_SESSION["cart_item"]))) {

				foreach($_SESSION["cart_item"] as $k => $v) {
						
					if($kode == $k) {
							
						if(empty($_SESSION["cart_item"][$k]["qty"])) {
							$_SESSION["cart_item"][$k]["qty"] = 0;
						}
						$_SESSION["cart_item"][$k]["qty"] += $qty;
					}
				}
			} else {
				$_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
			}
		} else {
			$_SESSION["cart_item"] = $itemArray;
		}*/

		$this->load->view('layout/header', $this->data);
		$this->load->view('checkout/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}
}
