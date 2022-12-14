<?php
defined('BASEPATH') or exit('No direct script access allowed');

class menu extends CI_Controller
{
    public function index()
    {
        error_reporting(0);
        $this->load->view('customer/menu');
    }

    public function cart()
    {
        error_reporting(0);
        $this->load->view('customer/cart');
    }

    public function add()
    {
        error_reporting(0);
        $this->load->view('customer/addToCart');
    }

    public function delete()
    {
        error_reporting(0);
        $this->load->view('customer/deleteOrder');
    }

    public function note()
    {
        error_reporting(0);
        $this->load->view('customer/note');
    }

    public function payment()
    {
        error_reporting(0);
        $this->load->view('customer/payment');
    }

    public function verification()
    {
        error_reporting(0);
        $this->load->view('customer/notifQRIS');
        $this->_sendEmail();
    }

    private function _sendEmail()
    {
        $config = [
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'chadianjos3@gmail.com',
            'smtp_pass' => 'osugmpspvxfrpxtz',
            'smtp_port' => 465,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('chadianjos3@gmail.com', 'PBL-Semester3',);
        $this->email->to('josephleonardo199@gmail.com');
        $this->email->subject('Customer');
        $this->email->message('Ada yang baru saja order nih, tolong dicek ya');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function cash()
    {
        error_reporting(0);
        $this->load->view('customer/notifCash');
        $this->_sendEmail();
    }
}
