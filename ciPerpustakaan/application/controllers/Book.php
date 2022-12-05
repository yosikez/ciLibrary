<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Book extends CI_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Book_model', 'books');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['books'] = $this->books->getAll();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('books/index', $data);
        $this->load->view('template/footer');
    }

    public function add()
    {
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('isbn', 'ISBN', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('language', 'Language', 'required');

            if($this->form_validation->run() == true){
                $data = [
                    'isbn'=>$this->input->post('isbn'),
                    'title'=>$this->input->post('title'),
                    'synopsis'=>$this->input->post('synopsis'),
                    'author'=>$this->input->post('author'),
                    'category'=>$this->input->post('category'),
                    'publisher'=>$this->input->post('publisher'),
                    'language'=>$this->input->post('language'),
                    'created_at' =>date('Y:m:d H:i:s')
                ];
                $this->books->insert($data);
                redirect('/Book');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('books/add');
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('books/add');
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $this->books->getById($id);
        if($this->input->method()=='post'){
            $this->form_validation->set_rules('isbn', 'ISBN', 'required');
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('author', 'Author', 'required');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('language', 'Language', 'required');

            if($this->form_validation->run() == true){
                $id = $this->input->post('id');
                $data = [
                    'isbn'=>$this->input->post('isbn'),
                    'title'=>$this->input->post('title'),
                    'synopsis'=>$this->input->post('synopsis'),
                    'author'=>$this->input->post('author'),
                    'publisher'=>$this->input->post('publisher'),
                    'category'=>$this->input->post('category'),
                    'language'=>$this->input->post('language'),
                    'updated_at' =>date('Y:m:d H:i:s')
                ];
                $this->books->update($data, $id);
                // die(var_dump($data));
                redirect('/Book');
            } 
        }

        $data['book'] = $this->books->getById($id);
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('books/update', $data);
        $this->load->view('template/footer');
        
    }

    public function delete($id)
    {
        $this->books->delete($id);
        redirect('Book');
    }


}