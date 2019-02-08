<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banner_model extends CI_Model {

    public $table = 'banner';
    public $id = 'id';
    public $order = 'ASC';

    public function __construct()
    {
        parent::__construct();
    }

    // get all
    public function get_all()
    {     
        $this->db->where('active', 'Y');
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }
}
