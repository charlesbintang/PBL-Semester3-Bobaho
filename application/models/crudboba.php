<?php
defined('BASEPATH') or exit('No direct script access allowed');

class crudboba extends CI_Model
{
    function getDataBoba()
    {
        $query = $this->db->get('menu_costumer');
        return $query->result();
    }

    function insertDataBoba($data)
    {
        $this->db->insert('crud', $data);
    }

    function getDataBobaDetail($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $query = $this->db->get('crud');
        return $query->row();
    }

    function updateDataBoba($id, $data)
    {
        $this->db->where('id_produk', $id);
        $this->db->update('crud', $data);
    }

    function deleteDataBoba($id)
    {
        $this->db->where('id_produk', $id);
        $this->db->delete('crud');
    }
}
