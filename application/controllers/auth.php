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
        $this->load->view('customer/customerLogin');
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

    // public function registration()
    // {

    //     $this->form_validation->set_rules('name', 'Name', 'required|trim');
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', ['is unique' => 'This email is already registered']);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[2]|matches[password2]', ['matches' => 'Password dont match', 'min_length' => 'Password too short']);
    //     $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = 'Registration';
    //         $this->load->view('templates/auth_header', $data);
    //         $this->load->view('auth/registration');
    //         $this->load->view('templates/auth_footer');
    //     } else {
    //         $data = [
    //             'nama' => htmlspecialchars($this->input->post('name', true)),
    //             'email' => htmlspecialchars($this->input->post('email', true)),
    //             'gambar' => 'default.jpg',
    //             'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
    //             'role_id' => 2,
    //             'is_active' => 1,
    //             'waktu_pembuatan' => time()
    //         ];

    //         $this->db->insert('user', $data);
    //         $this->session->set_flashdata('message', '<div class="alert-success" role="alert"> Congatulation your account has been created, Please login !</div>');
    //         redirect('auth');
    //     }
    // }
}
