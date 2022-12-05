<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subsmembers extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('SubsmemberModel', 'Subsmembers');
        $this->load->model('MemberModel', 'Members');
        $this->load->model('SubscriptionModel', 'Subscriptions');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['subsmembers'] = $this->Subsmembers->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('subsmembers/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['subscriptions'] = $this->Subscriptions->getAll();
        $data['subsmembers'] = $this->Subsmembers->getAll();
        $data['members'] = $this->Members->getAll();
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("member_id", 'Member Name', 'required');
            $this->form_validation->set_rules("subs_id", 'Subscription Title', 'required');
            $this->form_validation->set_rules("active_at", 'Active At', 'required');
            $this->form_validation->set_rules("total_order", 'Total Order', 'required');
            $this->form_validation->set_rules("note", 'Note', 'required');

            if ($this->form_validation->run() == true) {

                $idSubs = $this->input->post('subs_id');
                $dataSubs = $this->Subscriptions->getById($idSubs);
                $data = [
                    'member_id' => $this->input->post('member_id'),
                    'subs_id' => $idSubs,
                    'active_at' => $this->input->post('active_at'),
                    'expire_at' => date("Y:m:d", strtotime("+$dataSubs->month month", strtotime($this->input->post('active_at')))),
                    'status' => $this->input->post('status'),
                    'total_order' => $this->input->post('total_order'),
                    'note' => $this->input->post('note'),
                ];
                $this->Subsmembers->insert($data);
                redirect('/Subsmembers');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('subsmembers/add', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('subsmembers/add', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['subscriptions'] = $this->Subscriptions->getAll();
        $data['subsmember'] = $this->Subsmembers->getById($id);
        $data['members'] = $this->Members->getAll();
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("member_id", 'Member Name', 'required');
            $this->form_validation->set_rules("subs_id", 'Subscription Title', 'required');
            $this->form_validation->set_rules("active_at", 'Active At', 'required');
            $this->form_validation->set_rules("total_order", 'Total Order', 'required');
            $this->form_validation->set_rules("note", 'Note', 'required');
            
            if ($this->form_validation->run() == true) {
                
                $idSubs = $this->input->post('subs_id');
                $dataSubs = $this->Subscriptions->getById($idSubs);
                
                $data = [
                    'member_id' => $this->input->post('member_id'),
                    'subs_id' => $idSubs,
                    'active_at' => $this->input->post('active_at'),
                    'expire_at' => date("Y:m:d", strtotime("+$dataSubs->month month", strtotime($this->input->post('active_at')))),
                    'status' => $this->input->post('status'),
                    'total_order' => $this->input->post('total_order'),
                    'note' => $this->input->post('note'),
                ];
                $this->Subsmembers->update($data, $id);
                redirect('/Subsmembers');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('subsmembers/update', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('subsmembers/update', $data);
            $this->load->view('template/footer');
        }
    }

    public function delete($id)
    {
        $this->Subsmembers->delete($id);
        redirect('/Subsmembers');
    }
}