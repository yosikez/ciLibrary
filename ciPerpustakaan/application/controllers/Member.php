<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('MemberModel', 'Members');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['members'] = $this->Members->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('members/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("nik", 'NIK', 'required');
            $this->form_validation->set_rules("full_name", 'Full Name', 'required');
            $this->form_validation->set_rules("phone", 'Phone', 'required');
            $this->form_validation->set_rules("born_place", 'Born Place', 'required');
            $this->form_validation->set_rules("born_date", 'Born Date', 'required');
            $this->form_validation->set_rules("gender", 'Gender', 'required');

            if ($this->form_validation->run() == true) {
                $data = [
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality')
                ];
                $this->Members->insert($data);
                redirect('/Member');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('members/add');
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('members/add');
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['member'] = $this->Members->getById($id);
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("nik", 'NIK', 'required');
            $this->form_validation->set_rules("full_name", 'Full Name', 'required');
            $this->form_validation->set_rules("phone", 'Phone', 'required');
            $this->form_validation->set_rules("born_place", 'Born Place', 'required');
            $this->form_validation->set_rules("born_date", 'Born Date', 'required');
            $this->form_validation->set_rules("gender", 'Gender', 'required');

            if ($this->form_validation->run() == true) {
                $data = [
                    'nik' => $this->input->post('nik'),
                    'full_name' => $this->input->post('full_name'),
                    'phone' => $this->input->post('phone'),
                    'address' => $this->input->post('address'),
                    'born_place' => $this->input->post('born_place'),
                    'born_date' => $this->input->post('born_date'),
                    'gender' => $this->input->post('gender'),
                    'country' => $this->input->post('country'),
                    'nationality' => $this->input->post('nationality')
                ];
                $this->Members->update($data, $id);
                redirect('/Member');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('members/update', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('members/update', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->Members->delete($id);
        redirect('/Member');
    }
}
