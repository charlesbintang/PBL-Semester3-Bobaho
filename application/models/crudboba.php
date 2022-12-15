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
        $this->db->insert('menu_costumer', $data);
    }

    function getDataBobaDetail($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get('menu_costumer');
        return $query->row();
    }

    function updateDataBoba($id, $data)
    {
        $this->db->where('id_menu', $id);
        $this->db->update('menu_costumer', $data);
    }

    function deleteDataBoba($id)
    {
        $this->db->where('id_menu', $id);
        $this->db->delete('menu_costumer');
    }
}
