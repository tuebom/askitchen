<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Stock_model extends CI_Model
{

    public $table = 'stock';
    public $id = 'kdbar';
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

    // get data by id
    function get_by_id($id)
    {
        $this->db->select('kdbar, kdurl, nama, kdgol2, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar');
        $this->db->where('kdbar', $id);
        return $this->db->get($this->table)->row();
    }

    // get data by kodeurl
    function get_by_kodeurl($id)
    {
        $this->db->select('kdbar, kdurl, nama, kdgol2, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar');
        $this->db->where('kdurl', $id);
        return $this->db->get($this->table)->row();
    }

    // get data by category
    function get_by_category($limit, $start = 0, $code)
    {
        $this->db->select('kdbar, kdurl, nama, format(hjual,0,"de") as hjual, pnj, lbr, tgi, gambar');
        // $this->db->where('kdgol2', $code);
        $this->db->like('kdgol', $code);
        $this->db->or_like('kdgol2', $code);
        $this->db->or_like('kdgol3', $code);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data by food category
    function get_by_food_category($limit, $start = 0, $tag)
    {
        $this->db->select('kdbar, kdurl, nama, format(hjual,0,"de") as hjual, pnj, lbr, tgi, gambar');
        // $this->db->where('kdgol2', $code);
        $this->db->like('tag', $tag);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get data by brand
    function get_by_brand($limit, $start = 0, $brand)
    {
        $this->db->where($this->merk, $brand);
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->row();
    }

    // get related product
    function get_related($kode, $kdbar)
    {
        $this->db->select('kdbar, kdurl, nama, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar')
            ->from('stock')
            ->where('kdgol2', $kode)
            ->where('kdbar !=', $kdbar)
            ->order_by('kdbar', 'ASC');
        return $this->db->get()->result();
    }

    // get random product
    function get_random_products($kode, $kdbar)
    {
        $this->db->select('kdbar, kdurl, nama, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar')
            ->from('stock')
            ->where('kdgol2', $kode)
            ->where('kdbar !=', $kdbar)
            ->order_by('kdbar', 'ASC');
        return $this->db->get()->result();
    }
    
    // get total rows
    // function total_rows($q = NULL) {
    //     $this->db->like('kdbar', $q);
    //     $this->db->or_like('nama', $q);
    //     $this->db->or_like('kdgol', $q);
    //     $this->db->or_like('kdgol2', $q);
    //     $this->db->or_like('pnj', $q);
    //     $this->db->or_like('lbr', $q);
    //     $this->db->or_like('tgi', $q);
    //     $this->db->or_like('listrik', $q);
    //     $this->db->or_like('kapasitas', $q);
    //     $this->db->or_like('gas', $q);
    //     $this->db->or_like('berat', $q);
    //     $this->db->or_like('fitur', $q);
    //     $this->db->or_like('disc', $q);
    //     $this->db->from($this->table);
    //     return $this->db->count_all_results();
    // }
    
    // get total rows
    function total_rows($q = NULL, $b = NULL, $p1 = 0, $p2 = 0) {
        
        if ($q) {
            $this->db
            ->group_start()
            ->or_like(['kdbar'=> $q, 'nama'=> $q, 'kdgol'=> $q, 'kdgol2'=> $q, 'kdgol3'=> $q, 'pnj'=> $q, 'lbr'=> $q, 'tgi'=> $q, 'tag'=> $q])
            ->group_end();
        }
        
        // with price condition
        if ($p2) {
            if ($p2 > 0) {
                // $this->db->where('hjual between '.$p1.' and '.$p2);
                $this->db->where('hjual >=', $p1);
                $this->db->where('hjual <=', $p2);
            }
        } elseif ($p1) {
            $this->db->where('hjual > '.$p1);
        }

        // with brand condition
        if ($b) {
            if ($b !== 'OTHER') {
                $this->db->where('merk', $b);
            } else {
                $this->db->where('merk not in (select name from brands)');
            }
        }
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    // function get_limit_data($limit, $start = 0, $q = NULL) {
        
    //     $this->db->select('kdbar, kdurl, nama, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar');
    //     $this->db->order_by($this->id, $this->order);
    //     $this->db->like('kdbar', $q);
    //     $this->db->or_like('nama', $q);
    //     $this->db->or_like('kdgol', $q);
    //     $this->db->or_like('kdgol2', $q);
    //     $this->db->or_like('pnj', $q);
    //     $this->db->or_like('lbr', $q);
    //     $this->db->or_like('tgi', $q);
    //     $this->db->or_like('listrik', $q);
    //     $this->db->or_like('kapasitas', $q);
    //     $this->db->or_like('gas', $q);
    //     $this->db->or_like('berat', $q);
    //     $this->db->or_like('fitur', $q);
    //     $this->db->or_like('disc', $q);
	//     $this->db->limit($limit, $start);
    //     return $this->db->get($this->table)->result();
    // }

    function get_limit_data($limit, $start = 0, $q = NULL, $b = NULL, $p1 = 0, $p2 = 0) {
        
        $qry = $this->db->select('kdbar, kdurl, nama, format(hjual,0,"id") as hjual, pnj, lbr, tgi, gambar');
        
        if ($q) {
            $qry->group_start()
            ->or_like(['kdbar'=> $q, 'nama'=> $q, 'kdgol'=> $q, 'kdgol2'=> $q, 'kdgol3'=> $q, 'pnj'=> $q, 'lbr'=> $q, 'tgi'=> $q])
            ->group_end();
        }
        
        // with price condition
        if ($p2) {
            if ($p2 > 0) {
                // $this->db->where('hjual between '.$p1.' and '.$p2);
                $this->db->where('hjual >=', $p1);
                $this->db->where('hjual <=', $p2);
            }
        } elseif ($p1) {
            $this->db->where('hjual > '.$p1);
        }

        // with brand condition
        if ($b) {
            if ($b !== 'OTHER') {
                $this->db->where('merk', $b);
            } else {
                $this->db->where('merk not in (select name from brands)');
            }
        }

        if ($p1) {
            $this->db->order_by('hjual', $this->order);
        } else {
            $this->db->order_by($this->id, $this->order);
        }
	    $this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // get item reviews
    // function get_reviews($code)
    // {
    //     $this->db->select('comment');
    //     $this->db->order_by('timestamp', 'DESC');
    //     $this->db->where('kdbar', $code);
    //     return $this->db->get('reviews')->result();
    // }

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

/* End of file Stock_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2017-05-05 15:06:53 */
/* http://harviacode.com */