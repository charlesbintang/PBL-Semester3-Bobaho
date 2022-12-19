<?php
defined('BASEPATH') or exit('No direct script access allowed');

class crudboba extends CI_Model
{
    function getDataBoba()
    {
        $query = $this->db->get('menu_costumer');
        return $query->result();
    }

    function getDataBobaDetail($id_menu)
    {
        $this->db->where('id_menu', $id_menu);
        $query = $this->db->get('menu_costumer');
        return $query->row();
    }

    function getDataPesanan()
    {
        $query = $this->db->get('dibayar');
        return $query->result();
    }

    function getDataPesananSelesai()
    {
        $query = $this->db->get('dibuat');
        return $query->result();
    }

    function getGambarPesanan($id_cart)
    {
        $query = $this->db->get_where('dibayar', ['id_cart' => $id_cart]);
        return $query->result();
    }

    function insertDataBoba($data)
    {
        $this->db->insert('menu_costumer', $data);
    }

    function insertToDibuat($id_cart, $id_customer)
    {
        $this->db->query("INSERT INTO dibuat SELECT * FROM dibayar WHERE `dibayar`.`id_cart` = '$id_cart' AND `dibayar`.`id_customer` = '$id_customer';");
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

    function deletePesanan($id)
    {
        $this->db->where('id_cart', $id);
        $this->db->delete('dibayar');
    }
}
