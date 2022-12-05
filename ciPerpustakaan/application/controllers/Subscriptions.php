<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subscriptions extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubscriptionModel', 'Subscriptions');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['subscriptions'] = $this->Subscriptions->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('subscriptions/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("title", 'Subscription Title', 'required');
            $this->form_validation->set_rules("month", 'month', 'required');
            $this->form_validation->set_rules("price", 'Price', 'required');
           

            if ($this->form_validation->run() == true) {
                $data = [
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price'),
                ];
                $this->Subscriptions->insert($data);
                redirect('/Subscriptions');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('subscriptions/add');
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('subscriptions/add');
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['subscription'] = $this->Subscriptions->getById($id);
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("title", 'Subscription Title', 'required');
            $this->form_validation->set_rules("month", 'month', 'required');
            $this->form_validation->set_rules("price", 'Price', 'required');
           

            if ($this->form_validation->run() == true) {
                $id = $this->input->post('id');
                $data = [
                    'title' => $this->input->post('title'),
                    'month' => $this->input->post('month'),
                    'price' => $this->input->post('price'),
                    'is_active' => $this->input->post('is_active'),
                ];
                $this->Subscriptions->update($data, $id);
                redirect('/Subscriptions');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('subscriptions/update', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('subscriptions/update', $data);
            $this->load->view('template/footer');
        }
    }
}