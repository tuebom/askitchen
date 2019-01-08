<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Reviews_model extends CI_Model
{

    public $table = 'reviews';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($kode)
    {
        $this->db->order_by('timestamp', 'DESC');
        $this->db->where('kdbar', $kode);
        return $this->db->get($this->table)->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }
    
    function get_rating($kode)
    {
        $total = $this->total_rows($kode);

        $sql = 'SELECT ROUND(SUM(rating) / ?,1) as rating FROM reviews WHERE kdbar = ?';
        $query = $this->db->query($sql, array($total, $kode));
            // ->from($this->table)
            // ->where('kdbar', $kode);
        return $query->row(); //get()->row();
    }
    
    // get total rows - limited by code
    function total_rows($q = NULL) {
        $this->db->where('kdbar', $q);
        // $this->db->or_like('name', $q);
        // $this->db->or_like('email', $q);
        // $this->db->or_like('comment', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by('timestamp', 'DESC');
        $this->db->like('kdbar', $q);
        $this->db->or_like('name', $q);
        $this->db->or_like('email', $q);
        $this->db->or_like('comment', $q);
        $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

}

/* End of file Reviews_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-05 15:06:21 */
/* http://harviacode.com */