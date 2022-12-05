<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Borrowbooks extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BorrowbooksModel', 'borrow');
        $this->load->model('BorrowdetailModel', 'borrowDetail');
        $this->load->model('MemberModel', 'Members');
        $this->load->model('Book_model', 'Books');
        $this->load->model('SubscriptionModel', 'Subscriptions');
        $this->load->model('SubsmemberModel', 'Subsmembers');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['borrow'] = $this->borrow->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('borrowbooks/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['members'] = $this->Members->getAll();
        $data['books'] = $this->Books->getAll();

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("member_id", 'Member Name', 'required');
            $this->form_validation->set_rules("note", 'Note', 'required');

            if ($this->form_validation->run() == true) {
       
                $hdr = $this->input->post('member_id');
                $note = $this->input->post('note');
                $book = $this->input->post('book_id');

                $this->borrow->insert_multi($hdr, $note, $book);
                redirect('/Borrowbooks');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('borrowbooks/add', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('borrowbooks/add', $data);
            $this->load->view('template/footer');
        }
    }
    public function edit($id)
    {
        $data['subscriptions'] = $this->Subscriptions->getAll();
        $data['members'] = $this->Members->getAll();
        $data['borrow'] = $this->borrow->getById($id);
        $data['books'] = $this->Books->getAll();

        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules("member_id", 'Member Name', 'required');
            $this->form_validation->set_rules("note", 'Note', 'required');

            if ($this->form_validation->run() == true) {
       
                $hdr = $this->input->post('member_id');
                $note = $this->input->post('note');
                $book = $this->input->post('book_id');

                $this->borrow->update_multi($id, $hdr, $note, $book);
                redirect('/Borrowbooks');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('borrowbooks/update', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('borrowbooks/update', $data);
            $this->load->view('template/footer');
        }
    }

    public function getDetail($id)
    {
        $data['detail'] = $this->borrow->getDetailBorrow($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('borrowbooks/details', $data);
        $this->load->view('template/footer');
    }

    public function delete($id)
    {
        $this->borrow->delete($id);
        redirect('/Borrowbooks');
    }

}
