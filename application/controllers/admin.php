<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crudboba');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('admin', ['email' =>
        $this->session->userdata('email')])->row_array();

        $queryAllBoba = $this->crudboba->getDataBoba();
        $data = array('queryAB' => $queryAllBoba);
        $this->load->view('admin/tambah', $data);
    }

    public function tambah()
    {
        $this->load->view('admin/halamantambah');
    }

    public function ubah($id_produk)
    {
        $queryBobaDetail = $this->crudboba->getDataBobaDetail($id_produk);
        $DATA = array('queryBD' => $queryBobaDetail);
        $this->load->view('admin/edit', $DATA);
    }

    public function insert()
    {
        $jenis = $this->input->post('jenis');
        $kategori = $this->input->post('kategori');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $rating = $this->input->post('rating');
        $catatan = $this->input->post('catatan');
        $status = $this->input->post('status');

        $ArrInsert = array(
            'id_menu' => '',
            'src_gambar' => '',
            'jenis_produk' => $jenis,
            'kategori' => $kategori,
            'nama_produk' => $nama,
            'harga' => $harga,
            'rating' => $rating,
            'catatan' => $catatan,
            'status_produk' => $status
        );

        $this->crudboba->insertDataBoba($ArrInsert);
        redirect('admin');
    }

    public function update()
    {
        $id = $this->input->post('id');
        $jenis = $this->input->post('jenis');
        $kategori = $this->input->post('kategori');
        $rating = $this->input->post('rating');
        $status = $this->input->post('status');
        $nama = $this->input->post('nama');
        $harga = $this->input->post('harga');
        $catatan = $this->input->post('catatan');

        $ArrUpdate = array(
            'nama_produk' => $nama,
            'harga' => $harga,
            'jenis_produk' => $jenis,
            'kategori' => $kategori,
            'rating' => $rating,
            'status_produk' => $status,
            'catatan' => $catatan
        );

        $this->crudboba->updateDataBoba($id, $ArrUpdate);
        redirect('admin');
    }

    public function delete($id)
    {
        $this->crudboba->deleteDataBoba($id);
        redirect('admin');
    }
}
