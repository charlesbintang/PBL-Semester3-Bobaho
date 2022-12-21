<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index()
    {
        $this->form_validation->set_rules('nama_customer', 'Username', 'trim|required');
        $this->form_validation->set_rules('kata_sandi', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->load->view('customer/customerLogin');
        } else {
            $this->_loginCustomer();
        }
    }

    private function _loginCustomer()
    {
        $nama_customer = $this->input->post('nama_customer');
        $kata_sandi = $this->input->post('kata_sandi');

        $user = $this->db->get_where('customer', ['nama_customer' => $nama_customer])->row_array();

        if ($user) {

            if (password_verify($kata_sandi, $user['kata_sandi'])) {
                $data = [
                    'session_username' => $user['nama_customer']
                ];
                $this->session->set_userdata($data);
                //untuk mengarahkan ke halaman user
                redirect('menu');
            } else {
                echo '
                <script>
                alert("Password Salah");
                document.location.href = "' . base_url('') . '"
                </script>';
                exit;
            }
        } else {
            echo '
            <script>
            alert("Akun tidak terdaftar");
            document.location.href = "' . base_url('') . '"
            </script>';
            exit;
        }
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        if ($user) {

            if ($user['is_active'] == 1) {

                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    //untuk mengarahkan ke halaman user
                    redirect('admin');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert-danger" role="alert"> Wrong password </div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert-danger" role="alert"> This email has not activated !</div>');
                redirect('auth/login');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert-danger" role="alert"> Email is not registered !</div>');
            redirect('auth/login');
        }
    }

    public function registration()
    {

        // $this->form_validation->set_rules('nama_customer', 'Username', 'required|trim');
        $this->form_validation->set_rules('nama_customer', 'Username', 'required|trim|is_unique[customer.nama_customer]', ['is unique' => 'Username ini telah terdaftar!']);
        $this->form_validation->set_rules('kata_sandi', 'Password', 'required|trim|min_length[2]', ['min_length' => 'Password terlalu pendek']);
        // $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $this->load->view('customer/daftar');
        } else {
            $data = [
                'id_customer' => NULL,
                'nama_customer' => htmlspecialchars($this->input->post('nama_customer', true)),
                'kata_sandi' => password_hash($this->input->post('kata_sandi'), PASSWORD_DEFAULT)

            ];

            $this->db->insert('customer', $data);
            echo '
            <script>
            alert("Selamat akun Anda telah dibuat!");
            document.location.href = "' . base_url('') . '"
            </script>';
            exit;
        }
    }
}
