<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BorrowReturn extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('BorrowReturnModel', 'return');
        $this->load->model('BorrowdetailModel', 'borrowDetail');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['return'] = $this->return->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('borrowreturns/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        $data['detail'] = $this->borrowDetail->getAll();
        
        
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('detail_id', 'detail_id', 'required');
            $this->form_validation->set_rules('return_at', 'Return at', 'required');
           

            if($this->form_validation->run() == true){
                $data = [
                    'detail_id'=>$this->input->post('detail_id'),
                    'return_at'=>$this->input->post('return_at'),
                
                ];
    
                $this->return->insert($data);
                redirect('/BorrowReturn');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('borrowreturns/add', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('borrowreturns/add', $data);
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['detail'] = $this->borrowDetail->getAll();
        $data['return'] = $this->return->getById($id);
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('detail_id', 'detail_id', 'required');
            $this->form_validation->set_rules('return_at', 'Return at', 'required');

            if($this->form_validation->run() == true){
                $id = $this->input->post('id');
                $data = [
                    'detail_id'=>$this->input->post('detail_id'),
                    'return_at'=>$this->input->post('return_at'),
                ];
                $this->return->update($data, $id);
                
                redirect('/BorrowReturn');
            } 
        }

        
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('borrowreturns/update', $data);
        $this->load->view('template/footer');
        
    }

    public function delete($id)
    {
        $this->return->delete($id);
        redirect('BorrowReturn');
    }


}