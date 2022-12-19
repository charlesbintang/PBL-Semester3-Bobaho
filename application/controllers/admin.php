<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('crudboba');
        //load Helper for Form
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
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

    public function delete($id)
    {
        $this->crudboba->deleteDataBoba($id);
        redirect('admin');
    }

    public function deletePesanan($id)
    {
        $this->crudboba->deletePesanan($id);
        redirect('admin/pesanan');
    }

    public function lihatGambar()
    {
        $this->load->view('admin/imageView');
    }

    public function pesanan()
    {
        $qryPesanan = $this->crudboba->getDataPesanan();
        $data = array('qryPesanan' => $qryPesanan);
        $this->load->view('admin/lihatPesanan', $data);
    }

    public function selesai()
    {
        $qryPesanan = $this->crudboba->getDataPesananSelesai();
        $data = array('qryPesanan' => $qryPesanan);
        $this->load->view('admin/lihatPesananSelesai', $data);
    }

    public function dibuat($id_cart, $id_customer)
    {
        $this->crudboba->insertToDibuat($id_cart, $id_customer);
        $this->crudboba->deletePesanan($id_cart);
        redirect('admin/pesanan');
    }

    public function insert()
    {
        $config['upload_path'] = './assets/aset boba/1x/';
        $config['allowed_types'] = 'jpg|png';
        $config['max_size'] = 1000;
        // $config['max_width'] = 500;
        // $config['max_height'] = 500;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('gambar')) {
            $error = array('error' => $this->upload->display_errors('<p style="color:red;">', '</p>'));

            $this->load->view('admin/halamantambah', $error);
        } //elseif (condition) {
        //     # code... }
        else {
            $data = array('upload_data' => $this->upload->data());


            $src = $this->upload->data('file_name');
            $jenis = $this->input->post('jenis');
            $kategori = $this->input->post('kategori');
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $rating = $this->input->post('rating');
            $deskripsi = $this->input->post('deskripsi');
            $status = $this->input->post('status');

            $ArrInsert = array(
                'id_menu' => '',
                'src_gambar' => $src,
                'jenis_produk' => $jenis,
                'kategori' => $kategori,
                'nama_produk' => $nama,
                'harga' => $harga,
                'rating' => $rating,
                'deskripsi' => $deskripsi,
                'status_produk' => $status
            );

            $this->crudboba->insertDataBoba($ArrInsert);
            $this->load->view('admin/halamantambah', $data);
        }
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
}
