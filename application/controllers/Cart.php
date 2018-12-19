<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Public_Controller {

    public function __construct()
    {
		parent::__construct();
        $this->load->model('golongan_model');
        $this->load->model('stock_model');
    }


	public function index()
	{
        // $logged_in = $this->session->userdata('logged_in');
        // if(!$logged_in){
        //     header("location: ".base_url());
        // }

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
        }

		$this->load->view('layout/header', $this->data);
		$this->load->view('cart/index', $this->data);
		$this->load->view('layout/footer', $this->data);
	}

	public function add()
	{
        // $logged_in = $this->session->userdata('logged_in');
        // if(!$logged_in){
        //     header("location: ".base_url());
        // }

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
        }

        $kode = $this->input->post('kode');

        if ($kode != '') {
            
            // $detail = $this->stock_model->get_by_id($kode);
            $this->db->select('kdbar, kdurl, nama, hjual, format(hjual,0,"id") as hjualf, gambar');
            $this->db->where('kdbar', $kode);
            $detail = $this->db->get('stock')->row();
                
            $qty = $this->input->post('qty');
            
            $itemArray = array( $kode => array( 'kdbar' => $detail->kdbar, 'kdurl' => $detail->kdurl,
                                                'nama'  => $detail->nama,
                                                'qty'   => $qty,
                                                'harga' => $detail->hjual,
                                                'hargaf' => $detail->hjualf, // harga dgn pemisah ribuan
                                                'gambar'=> $detail->gambar));


            if(!empty($_SESSION["cart_item"])) {

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
            }
    
        }

        $_SESSION["totqty"] += $qty;
        // die(print_r($_SESSION["cart_item"]));
        
		$this->load->view('layout/header', $this->data);
		$this->load->view('cart/index', $this->data);
		$this->load->view('layout/footer', $this->data);
    }

	public function remove()
	{
        // $logged_in = $this->session->userdata('logged_in');
        // if(!$logged_in){
        //     header("location: ".base_url());
        // }

		$this->data['golongan'] = $this->golongan_model->get_all();

		foreach ($this->data['golongan'] as $item) {
			$this->data['item_'.$item->kdgol] = $this->golongan_model->get_sample($item->kdgol);
        }

        $kode = $this->input->post('kode');

        if ($kode != '') {
            
            // $this->db->select('kdbar, kdurl, nama, hjual, gambar');
            // $this->db->where('kdbar', $kode);
            // $detail = $this->db->get('stock')->row();
                
            $qty = $this->input->post('qty');
            
            // $itemArray = array( $kode => array( 'kdbar' => $detail->kdbar,
            //                                     'nama'  => $detail->nama,
            //                                     'qty'   => $qty,
            //                                     'harga' => $detail->hjual,
            //                                     'gambar'=> $detail->gambar));


            if(!empty($_SESSION["cart_item"])) {

                if(in_array($kode, array_keys($_SESSION["cart_item"]))) {

                    foreach($_SESSION["cart_item"] as $k => $v) {
                            
                        if($kode == $k) {
                                
                            /*if(empty($_SESSION["cart_item"][$k]["qty"])) {
                                $_SESSION["cart_item"][$k]["qty"] = 0;
                            }
                            $_SESSION["cart_item"][$k]["qty"] += $qty;*/
                            unset($_SESSION['cart_item'][$k]);
                            // die('item found! '. count($_SESSION["cart_item"]));
                        }
                    }
                } /*else {
                    $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                }*/

            } /*else {
                $_SESSION["cart_item"] = $itemArray;
            }*/
    
        }

        $_SESSION["totqty"] -= $qty;

        header("location: ".base_url().'cart');

		// $this->load->view('layout/header', $this->data);
		// $this->load->view('cart/index', $this->data);
		// $this->load->view('layout/footer', $this->data);
    }
}
