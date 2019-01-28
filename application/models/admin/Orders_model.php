<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Orders_model extends CI_Model
{

    public $table = 'orders';
    public $id = 'id';
    public $order = 'ASC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $this->db->select('select orders.id, concat(address.first_name, " ", address.last_name) as name, orders.tglinput, concat(address.address, ", ", address.district, ", ", address.regency, " - ", address.province, " ", address.post_code) as alamat, orders.gtotal')
        ->from('orders, address, users')
        ->where('orders.addrid = address.id and orders.mbrid = u.id')
        ->order_by('orders.id', 'ASC');
        return $this->db->get()->result();
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get item belum bayar
    function get_item_bb($mbrid)
    {
        $this->db->select('o1.kdbar, s.nama, o1.qty, o1.hjual, o1.jumlah, s.gambar');
        $this->db->from('orders o, orders_detail o1, stock s');
        $this->db->where('o.id = o1.id and o1.kdbar = s.kdbar and o.status = "P"');
        $this->db->where('o.mbrid', $mbrid);
        $this->db->order_by('o1.urut', 'ASC');
        return $this->db->get()->result();
    }

    // get item delivered
    function get_item_bs($mbrid)
    {
        $this->db->select('o1.kdbar, s.nama, o1.qty, o1.hjual, o1.jumlah, s.gambar');
        $this->db->from('orders o, orders_detail o1, stock s');
        $this->db->where('o.id = o1.id and o1.kdbar = s.kdbar and o.status = "D"');
        $this->db->where('o.mbrid', $mbrid);
        $this->db->order_by('o1.urut', 'ASC');
        return $this->db->get()->result();
    }

    // get history
    function get_history($mbrid)
    {
        $this->db->select('o.tglinput, o.id, o1.kdbar, s.nama, o1.qty, o1.hjual, o1.jumlah, s.gambar');
        $this->db->from('orders o, orders_detail o1, stock s');
        $this->db->where('o.id = o1.id and o1.kdbar = s.kdbar and o.status = "D"');
        $this->db->where('o.mbrid', $mbrid);
        $this->db->order_by('o.tglinput', 'DESC');
        $this->db->order_by('o.id', 'ASC');
        $this->db->order_by('o1.urut', 'ASC');
        return $this->db->get()->result();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id', $q);
        $this->db->or_like('mbrid', $q);
        $this->db->or_like('total', $q);
        $this->db->or_like('payment', $q);
        $this->db->or_like('note', $q);
        $this->db->or_like('delivery', $q);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->select('o.id, concat(a.first_name, " ", a.last_name) as name, o.tglinput, o.status, concat(a.address, ", ", d.name, ", ", r.name, " - ", p.name, " ", a.post_code) as address, o.gtotal');
        $this->db->from('orders o');
        $this->db->join('address a', 'o.addrid = a.id');
        $this->db->join('provinces p', 'a.province = p.id');
        $this->db->join('regencies r', 'a.regency = r.id');
        $this->db->join('districts d', 'a.district = d.id');
        $this->db->join('users u', 'o.mbrid = u.id');

        // $this->db->order_by($this->id, $this->order);
        $this->db->or_like('o.id', $q);

        $this->db->or_like('o.mbrid', $q);
        $this->db->or_like('o.total', $q);
        $this->db->or_like('o.payment', $q);
        $this->db->or_like('o.note', $q);
        $this->db->or_like('o.delivery', $q);
        $this->db->order_by('o.id', 'ASC');
        $this->db->limit($limit, $start);
        return $this->db->get()->result(); //$this->table
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

/* End of file Orders_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-05 15:06:21 */
/* http://harviacode.com */