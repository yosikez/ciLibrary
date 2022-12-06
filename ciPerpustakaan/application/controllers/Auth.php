<?php defined('BASEPATH') OR exit("No direct script access allowed");

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel', 'auth');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->input->method() == 'post') {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        // die(var_dump($username));
        if($this->auth->login($username, $password))
        {
            $this->auth->getUserSessionData();
            redirect('Librarian');
        }
        else
        {
            $this->session->flashdata('error', 'username atau password anda salah');
            redirect('login/index');
        }
        }
        else {
            $this->load->view('login/index');
        }

    }
    public function logout()
    {
        $this->session->unset_userdata('user_session');
        $this->session->unset_userdata('isLogin');
        redirect('login');
    }
}