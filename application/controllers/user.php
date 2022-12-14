<?php
defined('BASEPATH') or exit('No direct script access allowed');

class user extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crudboba');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $queryAllBoba = $this->crudboba->getDataBoba();
        $data = array('queryAB' => $queryAllBoba);
        $this->load->view('admin/tambah', $data);
    }

    public function tambah_produk()
    {
        $this->load->view('admin/halamantambah');
    }

    public function edit_produk($id_produk)
    {
        $queryBobaDetail = $this->crudboba->getDataBobaDetail($id_produk);
        $DATA = array('queryBD' => $queryBobaDetail);
        $this->load->view('admin/edit', $DATA);
    }

    public function tambah()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $catatan = $this->input->post('catatan');

        $ArrInsert = array(
            'id_produk' => $id,
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'catatan' => $catatan
        );

        $this->crudboba->insertDataBoba($ArrInsert);
        redirect(base_url('user'));
    }

    public function fungsi_edit()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $catatan = $this->input->post('catatan');

        $ArrUpdate = array(
            'id_produk' => $id,
            'nama_produk' => $nama,
            'harga_produk' => $harga,
            'catatan' => $catatan
        );

        $this->crudboba->updateDataBoba($id, $ArrUpdate);
        redirect(base_url('user'));
    }

    public function fungsi_delete($id)
    {
        $this->crudboba->deleteDataBoba($id);
        redirect(base_url('user'));
    }
}
