<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Librarian extends CI_Controller
{
    private const CONFIG_UPLOAD = [
        'upload_path' => FCPATH . '/assets/profile',
        'allowed_types' => 'gif|jpg|png',
        'upload_max_filesize' => '1M',
        'overwrite' => true
    ];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Librarian_model', 'Librarian');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['librarians'] = $this->Librarian->all();
        $this->load->view('template/header');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        $this->load->view('librarian/index', $data);
        $this->load->view('template/footer');
    }


    public function add()
    {
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name'=>md5(time())]));
            
            if(isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')){
                $this->form_validation->set_rules('avatar', 'Avatar', 'required');
            } else {
                $filename = $this->upload->data();
            }


            if ($this->form_validation->run() == true) {
                $data = [
                    'username' => $this->input->post('username'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                    'avatar' => $filename['file_name'],
                    'created_at' => null
                ];
                $this->Librarian->insert($data);
                redirect('/Librarian/index');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('librarian/add');
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('librarian/add');
            $this->load->view('template/footer');
        }
    }

    public function edit($id)
    {
        $data['librarians'] = $this->Librarian->getById($id);
        if ($this->input->method() == 'post') {
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');

            $this->load->library('upload', array_merge(self::CONFIG_UPLOAD, ['file_name'=>md5(time())]));
            
            if(isset($_FILES['avatar']) && !$this->upload->do_upload('avatar')){
                
            } else {
                $filename = $this->upload->data();
            }

            if ($this->form_validation->run() == true) {
                $id = $this->input->post('id');
                $data = [
                    'username' => $this->input->post('username'),
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'avatar' => $filename['file_name'],
                    'updated_at' => null
                ];

                $this->Librarian->update($data, $id);
                redirect('/Librarian');
            } else {
                $this->load->view('template/header');
                $this->load->view('template/navbar');
                $this->load->view('template/sidebar');
                $this->load->view('librarian/update', $data);
                $this->load->view('template/footer');
            }
        } else {
            $this->load->view('template/header');
            $this->load->view('template/navbar');
            $this->load->view('template/sidebar');
            $this->load->view('librarian/update', $data);
            $this->load->view('template/footer');

        }
    }

    public function delete($id)
    {
        $this->Librarian->delete($id);
        return redirect(base_url('librarian'));
    }
}
