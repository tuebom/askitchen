<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subcategories extends Admin_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->lang->load('admin/subcategory');
		$this->load->model('golongan_model');

        /* Title Page :: Common */
        // $this->page_title->push(lang('menu_categories'));
        $this->data['pagetitle'] = '<h1>Sub Categories</h1>'; //$this->page_title->show();

        /* Breadcrumbs :: Common */
        $this->breadcrumbs->unshift(1, lang('menu_sub_categories'), 'admin/subcategories');
        // $this->output->enable_profiler(TRUE);
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

            $catid = $this->uri->segment(3);
            $this->data['subcategories']  = $this->golongan_model->get_sub_category($catid);

            /* Load Template */
            $this->template->admin_render('admin/subcategories/index', $this->data);
        }
    }


	public function create()
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin())
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('subcategory_create'), 'admin/subcategories/create');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

		/* Validate form input */
		$this->form_validation->set_rules('nama', 'Sub Category Name', 'required');

		if ($this->form_validation->run() == TRUE)
		{
            $category_data = array(
                'kdgol'  => $this->input->post('kdgol'),
                'kdgol2' => $this->input->post('kdgol2'),
                'name'   => $this->input->post('name')
            );
            
            $this->subcategory_model->insert($category_data);
            // $this->session->set_flashdata('message', '');
            redirect('admin/subcategories', 'refresh');
		}
		else
		{
            $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));

			$this->data['subcategory_code'] = array(
				'name'  => 'kdgol2',
				'id'    => 'kdgol2',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('kdgol2')
			);

			$this->data['subcategory_name'] = array(
				'name'  => 'nama',
				'id'    => 'nama',
				'type'  => 'text',
                'class' => 'form-control',
				'value' => $this->form_validation->set_value('nama')
			);

            /* Load Template */
            $this->template->admin_render('admin/subcategories/create', $this->data);
		}
	}


	public function delete()
	{
        if ( ! $this->ion_auth->logged_in())
        {
            redirect('auth/login', 'refresh');
        }
        elseif ( ! $this->ion_auth->is_admin())
		{
            return show_error('You must be an administrator to view this page.');
        }
        else
        {
            $this->load->view('admin/subcategories/delete');
        }
	}


	public function edit($id)
	{
		if ( ! $this->ion_auth->logged_in() OR ! $this->ion_auth->is_admin() OR ! $id OR empty($id))
		{
			redirect('auth', 'refresh');
		}

        /* Breadcrumbs */
        $this->breadcrumbs->unshift(2, lang('menu_subcategory_edit'), 'admin/subcategories/edit');
        $this->data['breadcrumb'] = $this->breadcrumbs->show();

        /* Variables */
		$subcategories = $this->golongan2_model->get_by_id($id);

		/* Validate form input */
        $this->form_validation->set_rules('nama', 'Sub Category Name', 'required');

		if (isset($_POST) && ! empty($_POST))
		{
			if ($this->form_validation->run() == TRUE)
			{
                $this->golongan2_model->update($kdgol2, array('nama' => $this->input->post('nama')));
                $this->session->set_flashdata('message', '');
                redirect('admin/subcategories', 'refresh');
			}
		}

        $this->data['message'] = (validation_errors() ? validation_errors() : ($this->ion_auth->errors() ? $this->ion_auth->errors() : $this->session->flashdata('message')));
        $this->data['subcategories'] = $subcategories;

		$this->data['nama'] = array(
			'type'    => 'text',
			'name'    => 'nama',
			'id'      => 'nama',
			'value'   => isset($CI->form_validation) ? $this->form_validation->set_value('nama') : $this->data['subcategories']->nama,
            'class'   => 'form-control',
		);

        /* Load Template */
        $this->template->admin_render('admin/subcategories/edit', $this->data);
	}
}
