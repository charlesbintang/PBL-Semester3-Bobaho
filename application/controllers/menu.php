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
        $this->load->view('customer/Topping');
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
        $this->load->view('customer/');
    }
}
