<?php
class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('news/login');
    }

    public function out()
    {
        $this->session->sess_destroy();
        $this->load->view('news/login');
    }
}