<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    protected $table = "librarians";

    public function login($username, $password)
    {
        $query = $this->db->get_where($this->table, ['username'=>$username])->row();
        if($query > 0)
        {
            if(password_verify($password, $query->password))
            {
                $this->session->set_userdata('user_session', $query->id);
                $this->session->set_userdata('isLogin', true);
                return true;
            }
            else
            {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function isLogin()
    {
        if(empty($this->session->userdata('isLogin')))
        {
            redirect('auth');
        }
    }


    public function getUserSessionData(){

        $data = $this->db->get_where($this->table, ['id'=>$this->session->userdata('user_session')])->row();
        return $data;
    }
}