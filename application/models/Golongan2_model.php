<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Golongan2_model extends CI_Model
{

    public $table = 'golongan2';
    public $id = 'kdgol2';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return $this->db->get($this->table)->result();
    }

    // get sample
    function get_sample($kode)
    {
        // $this->db->query("select skdgol2, s.kdbar, g.nama where s.kdgol2 = g.kdgol2 and s.kdgol2 = '$kode'")
        $this->db->select('stock.kdgol2, stock.kdgol3, stock.kdbar, stock.gambar, golongan3.nama, golongan3.info, golongan3.gambar as gbr')
            ->from('stock')
            ->join('golongan3', 'stock.kdgol3 = golongan3.kdgol3')
            ->group_by('stock.kdgol3')
            ->having('stock.kdgol2', $kode)
            ->order_by('stock.kdgol3', 'ASC');
        return $this->db->get()->result();
    }

    // get sub category
    function get_sub_category($kode)
    {
        $this->db->select('CONCAT(kdgol2,"/",kdgol3) as kode, kdgol3, nama, info, gambar')
            ->from('golongan3')
            ->where('kdgol2', $kode)
            ->order_by('kdgol3', 'ASC');
        return $this->db->get()->result();
    }
    
    // get total sub category
    function total_sub_category($id) {
        $this->db->where('kdgol2', $id);
        $this->db->from('golongan3');
        return $this->db->count_all_results();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get data by category id
    function get_by_catid($id)
    {
        $this->db->where('kdgol', $id);
        return $this->db->get($this->table)->result();
    }

    // get data by sub-id
    function get_by_subid($id)
    {
        $this->db->where('kdgol2', $id);
        return $this->db->get('golongan2')->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('kdgol2', $q);
        $this->db->or_like('nama', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('kdgol2', $q);
        $this->db->or_like('nama', $q);
        // $this->db->or_like('detail', $q);
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

/* End of file Golongan_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-05 15:06:21 */
/* http://harviacode.com */