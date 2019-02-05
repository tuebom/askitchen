<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventory extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        /* Load :: Common */
		
		$this->load->library('pagination');
		
		$this->lang->load('admin/inventory');
		
		$this->load->model('admin/inventory_model');
		$this->load->model('golongan_model');
		$this->load->model('golongan2_model');
		$this->load->model('golongan3_model');
		
		// $this->output->enable_profiler(TRUE);

        /* Title Page :: Common */
        $this->page_title->push(lang('menu_inventory'));
        $this->data['pagetitle'] = '<h1>Inventory</h1>'; //$this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, 'Inventory', 'admin/inventory');
    }


	public function index()
	{
        if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
        {
            redirect('auth/login', 'refresh');
        }
        else
        {
            /* Breadcrumbs */
            $this->data['breadcrumb'] = $this->breadcrumbs->show();

            /* Get all users */
            $this->data['inventory'] = $this->inventory_model->get_all();
			
			if ($this->input->get('p')) {
				$page   = $this->input->get('p');
				$offset = ((int)$page-1)*8;
			} else {
				$page   = 1;
				$offset = 0;
			}
				
			$this->data['inventory'] = $this->inventory_model->get_limit_data(8, $offset);
			$total = $this->inventory_model->total_rows();
			$url   = current_url() . '?p=';
			$this->data['pagination'] = $this->paging($total, $page, $url);			
			/* Load Template */
            $this->template->admin_render('admin/inventory/index', $this->data);
        }
	}


	public function create()
	{
        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, 'Create Inventory', 'admin/inventory/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		// $tables = $this->config->item('tables', 'ion_auth');

		/* Validate form input */
		$this->form_validation->set_rules('kdbar',  'Kode barang', 'required');
		$this->form_validation->set_rules('kdurl',  'Kode url', 'required');
		$this->form_validation->set_rules('nama',   'Nama barang', 'required');

		$this->form_validation->set_rules('kdgol',  'Golongan', 'required');
		$this->form_validation->set_rules('kdgol2', 'Golongan 2', 'required');
		$this->form_validation->set_rules('kdgol3', 'Golongan 3', 'required');

		$this->form_validation->set_rules('satuan', 'Satuan', 'required');
		$this->form_validation->set_rules('merk',   'Merk', 'required');

		$this->form_validation->set_rules('pnj',    'Panjang', 'required');
		$this->form_validation->set_rules('lbr',    'Lebar', 'required');
		$this->form_validation->set_rules('tgi',    'Tinggi', 'required');
		$this->form_validation->set_rules('gambar', 'Gambar', 'required');
		$this->form_validation->set_rules('hjual',  'Harga jual', 'required');
		// $this->form_validation->set_rules('disc',   'Diskon', 'required');

		if ($this->form_validation->run() == TRUE)
		{
			
			$detail_data = array(
			'kdbar'  => $this->input->post('kdbar'),
			'kdurl'  => $this->input->post('kdurl'),
			'nama'   => $this->input->post('nama'),
			
			'kdgol'  => $this->input->post('kdgol'),
			'kdgol2' => $this->input->post('kdgol2'),
			'kdgol3' => $this->input->post('kdgol3'),
			
			'satuan' => $this->input->post('satuan'),
			'merk'   => $this->input->post('merk'),

			'pnj'    => $this->input->post('pnj'),
			'lbr'    => $this->input->post('lbr'),
			'tgi'    => $this->input->post('tgi'),
			'gambar' => $this->input->post('gambar'),
			'hjual'  => $this->input->post('hjual'),
			// 'disc'   => $this->input->post('disc'),
			);
		}

		if ($this->form_validation->run() == TRUE && $this->inventory_model->insert($username, $password, $email, $additional_data))
		{
            $this->session->set_flashdata('message', $this->ion_auth->messages());
			redirect('admin/inventory', 'refresh');
		}
		else
		{

			$this->data['golongan'] = $this->golongan_model->get_all();
			
			if (isset($_SESSION["kdgol"])) {
				$this->data['golongan2'] = $this->golongan2_model->get_all();
				$this->data['golongan3'] = $this->golongan3_model->get_all();
			}

			$this->data['brands'] = $this->inventory_model->all_brands();

			$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['kdbar'] = array(
				'name'  => 'kdbar',
				'id'    => 'kdbar',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kdbar'),
			);
			$this->data['kdurl'] = array(
				'name'  => 'kdurl',
				'id'    => 'kdurl',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kdurl'),
			);
			$this->data['nama'] = array(
				'name'  => 'nama',
				'id'    => 'nama',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('nama'),
			);
			
			$this->data['satuan'] = array(
				'name'  => 'satuan',
				'id'    => 'satuan',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('satuan'),
			);
			$this->data['merk'] = array(
				'name'  => 'merk',
				'id'    => 'merk',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('merk'),
			);
			$this->data['pnj'] = array(
				'name'  => 'pnj',
				'id'    => 'pnj',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('pnj'),
			);
			$this->data['lbr'] = array(
				'name'  => 'lbr',
				'id'    => 'lbr',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('lbr'),
			);
			$this->data['tgi'] = array(
				'name'  => 'tgi',
				'id'    => 'tgi',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('tgi'),
			);
			
			$this->data['listrik'] = array(
				'name'  => 'listrik',
				'id'    => 'listrik',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('listrik'),
			);
			$this->data['kapasitas'] = array(
				'name'  => 'kapasitas',
				'id'    => 'kapasitas',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kapasitas'),
			);
			$this->data['gas'] = array(
				'name'  => 'gas',
				'id'    => 'gas',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('gas'),
			);
			$this->data['berat'] = array(
				'name'  => 'berat',
				'id'    => 'berat',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('berat'),
			);
			$this->data['fitur'] = array(
				'name'  => 'fitur',
				'id'    => 'fitur',
				'rows'  => '3',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('fitur'),
			);
			
			// $this->data['kriteria'] = array(
			// 	'name'  => 'kriteria',
			// 	'id'    => 'kriteria',
            //     'class' => 'form-control',
			// 	'value' => $this->form_validation->set_value('kriteria'),
			// );
			$this->data['tag'] = array(
				'name'  => 'tag',
				'id'    => 'tag',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('tag'),
			);
			$this->data['hjual'] = array(
				'name'  => 'hjual',
				'id'    => 'hjual',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('hjual'),
			);
			$this->data['saldo'] = array(
				'name'  => 'saldo',
				'id'    => 'saldo',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('saldo'),
			);
			$this->data['gambar'] = array(
				'name'  => 'gambar',
				'id'    => 'gambar',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('gambar'),
			);
			$this->data['tmpgambar'] = array(
				'name'  => 'prdfile',
				'id'    => 'prdfile',
				'type'  => 'text',
				'class' => 'form-control',
				'style' => 'display: none;',
				'value' => $this->form_validation->set_value('userfile'),
			);

            /* Load Template */
            $this->template->admin_render('admin/inventory/create', $this->data);
        }
	}


	public function delete()
	{
        /* Load Template */
		$this->template->admin_render('admin/inventory/delete', $this->data);
	}


	public function edit($kode)
	{
		if ( ! $this->ion_auth->logged_in() OR ( ! $this->ion_auth->is_admin()))
		{
			redirect('auth', 'refresh');
		}

		$this->session->set_userdata('kdbar', $kode);

		/* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_inventory_edit'), 'admin/inventory/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('kdbar', 'lang:inventory_kdbar', 'required');
		$this->form_validation->set_rules('kdurl', 'lang:inventory_kdurl', 'required');
		$this->form_validation->set_rules('nama',  'lang:inventory_name', 'required');
		$this->form_validation->set_rules('satuan', 'lang:inventory_unit', 'required');

		if (isset($_POST) && ! empty($_POST))
		{

			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'kdurl'      => $this->input->post('kdurl'),
					'nama'       => $this->input->post('nama'),

					'kdgol'      => $this->input->post('kdgol'),
					'kdgol2'     => $this->input->post('kdgol2'),
					'kdgol3'     => $this->input->post('kdgol3'),

					'satuan'     => $this->input->post('satuan'),
					'merk'       => $this->input->post('merk'),
					'pnj'        => $this->input->post('pnj'),
					'lbr'        => $this->input->post('lbr'),
					'tgi'        => $this->input->post('tgi'),

					'listrik'    => $this->input->post('listrik'),
					'kapasitas'  => $this->input->post('kapasitas'),
					'gas'        => $this->input->post('gas'),
					'berat'      => $this->input->post('berat'),
					
					'fitur'      => $this->input->post('fitur'),
					'kriteria'   => $this->input->post('kriteria'),
					
					'tag'        => $this->input->post('tag'),
					'hjual'      => $this->input->post('hjual'),
					'saldo'      => $this->input->post('saldo'),
					'gambar'     => $this->input->post('gambar'),
				);

                if($this->inventory_model->update($kode, $data))
			    {
                    // $this->session->set_flashdata('message', $this->ion_auth->messages());

				    if ($this->ion_auth->is_admin())
					{
						redirect('admin/inventory', 'refresh');
					}
					else
					{
						redirect('admin', 'refresh');
					}
			    }
			    else
			    {
                    // $this->session->set_flashdata('message', $this->ion_auth->errors());

				    if ($this->ion_auth->is_admin())
					{
						redirect('auth', 'refresh');
					}
					else
					{
						redirect('/', 'refresh');
					}
			    }
			}
		}


		$this->data['golongan'] = $this->golongan_model->get_all();
		
		if (isset($_SESSION["kdgol"])) {
			$this->data['golongan2'] = $this->golongan2_model->get_all();
			$this->data['golongan3'] = $this->golongan3_model->get_all();
		}

		$this->data['brands'] = $this->inventory_model->all_brands();

		// set the flash data error message if there is one
		$this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

		$this->data['kdbar'] = array(
			'name'  => 'kdbar',
			'id'    => 'kdbar',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kdbar'),
		);
		$this->data['kdurl'] = array(
			'name'  => 'kdurl',
			'id'    => 'kdurl',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kdurl'),
		);
		$this->data['nama'] = array(
			'name'  => 'nama',
			'id'    => 'nama',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('nama'),
		);

		$this->data['satuan'] = array(
			'name'  => 'satuan',
			'id'    => 'satuan',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('satuan'),
		);
		$this->data['merk'] = array(
			'name'  => 'merk',
			'id'    => 'merk',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('merk'),
		);
		$this->data['pnj'] = array(
			'name'  => 'pnj',
			'id'    => 'pnj',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('pnj'),
		);
		$this->data['lbr'] = array(
			'name'  => 'lbr',
			'id'    => 'lbr',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('lbr'),
		);
		$this->data['tgi'] = array(
			'name'  => 'tgi',
			'id'    => 'tgi',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('tgi'),
		);

		$this->data['listrik'] = array(
			'name'  => 'listrik',
			'id'    => 'listrik',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('listrik'),
		);
		$this->data['kapasitas'] = array(
			'name'  => 'kapasitas',
			'id'    => 'kapasitas',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('kapasitas'),
		);
		$this->data['gas'] = array(
			'name'  => 'gas',
			'id'    => 'gas',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('gas'),
		);
		$this->data['berat'] = array(
			'name'  => 'berat',
			'id'    => 'berat',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('berat'),
		);
		$this->data['fitur'] = array(
			'name'  => 'fitur',
			'id'    => 'fitur',
			'rows'  => '3',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('fitur'),
		);

		$this->data['tag'] = array(
			'name'  => 'tag',
			'id'    => 'tag',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('tag'),
		);
		$this->data['hjual'] = array(
			'name'  => 'hjual',
			'id'    => 'hjual',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('hjual'),
		);
		$this->data['saldo'] = array(
			'name'  => 'saldo',
			'id'    => 'saldo',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('saldo'),
		);
		$this->data['gambar'] = array(
			'name'  => 'gambar',
			'id'    => 'gambar',
			'type'  => 'text',
			'class' => 'form-control',
			'value' => $this->form_validation->set_value('gambar'),
		);
		$this->data['tmpgambar'] = array(
			'name'  => 'prdfile',
			'id'    => 'prdfile',
			'type'  => 'text',
			'class' => 'form-control',
			'style' => 'display: none;',
			'value' => $this->form_validation->set_value('userfile'),
		);

        /* Load Template */
		$this->template->admin_render('admin/inventory/edit', $this->data);
	}
	
	
	public function paging($total,$curr_page,$url){
    
		$page = '';
		$total_page = ceil($total/8);
		
		if($total > 8) { // hasil bagi atau jumlah halaman lebih dari satu
		
			$page = '<ul class="pagination no-print">';
			
			if ($total_page > 9 && $curr_page > 2)
		   		$page .='<li><a href="'.$url.'1"><<</a></li>';
			if ($curr_page > 1)
				$page .='<li><a href="'.$url.($curr_page-1).'"><</a></li>';
		   
			if ($total_page < 10) {
				for($x = 1;$x <= $total_page;$x++) {
					
					$active = '';
					
					if($x == $curr_page)
						$active = 'class="active"';
					
					$page .='<li '.$active.'><a href="'.$url.$x.'">'.$x.'</a></li>';
					
				}
			}
			else
			{
				if ($curr_page > 3) {
					for($x = $curr_page-2;$x <= $curr_page-1; $x++) {
						$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
					}
				}
				else
				{
					for($x = 1;$x <= 2;$x++) {
						$active = '';
					
						if($x == $curr_page)
							$active = ' class="active"';
						
						$page .='<li'.$active.'><a href="'.$url.$x.'">'.$x.'</a></li>';
					}
				}

				if ($curr_page >= 3 && $total_page - $curr_page > 3)
					// $page .='<li><a href="#">'.($curr_page).' / '.$total_page.'</a></li>';
					$page .='<li class="active"><a href="#">'.($curr_page).'</a></li>';

				if ($total_page - $curr_page > 3) {
					
					if ($curr_page == 1) {
						for($x = $curr_page+2;$x <= $curr_page+3; $x++) {
							$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
						}
					}
					else
					{
						for($x = $curr_page+1;$x <= $curr_page+2; $x++) {
							$page .='<li><a href="'.$url.$x.'">'.$x.'</a></li>';
						}
					}
				}
			}
			if ($curr_page < $total_page)
				$page .='<li><a href="'.$url.($curr_page+1).'">></a></li>';
			if ($total_page > 9)
				$page .='<li><a href="'.$url.$total_page.'">>></a></li>';
				
			$page .='</ul>';
		}
			
		return $page;
	}
	
	public function upload_file() {
		
		$config = array(
            'upload_path' => './upload/gambar/',
            'allowed_types' => 'png', //'gif|jpg|png',
            'file_name' => $_SESSION['kdbar'].'png', //.date_default_timezone_set('Asia/Taipei'), //dmYHis
            'file_ext_tolower' => TRUE,
            'overwrite' => TRUE,
            'max_size' => 512,
            'max_width' => 640,
            'max_height' => 640,           
            'min_width' => 32,
            'min_height' => 32,     
            'max_filename' => 0,
            'remove_spaces' => TRUE
        );

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload())
        {
            $hasil = $this->upload->display_errors();
            ?>
                <label class="label label-danger msg">Upload file gagal!</label>
                <table class="table table-hover table-bordered">
                    <?php echo "<tr><td><strong>".$hasil."</strong></td></tr>"; ?>
                </table>
                <?php
        }
        else
        {
			$hasil = $this->upload->data();
        }
    }

	public function level2()
	{
		$groupid = $this->uri->segment(4);
		// $groupid = $this->input->post("id");
		$data = $this->golongan_model->get_sub_category($groupid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}

	public function level3()
	{
		$groupid = $this->uri->segment(4);
		// $groupid = $this->input->post("id");
		$data = $this->golongan2_model->get_sub_category($groupid);
		return $this->output
		->set_content_type('application/json')
		->set_status_header(200)
		->set_output(json_encode(array(
				'data' => $data
		)));
	}
}
