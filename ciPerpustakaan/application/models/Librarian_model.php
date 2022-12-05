<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Librarian_model extends CI_Model
{
    
    protected $table = 'librarians';

    public function all()
    {
        return $this->db->query("SELECT * FROM $this->table")->result();
    }

    public function getById($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id=?", [$id])->row();
    }

    public function insert($data)
    {
        $statement = "INSERT INTO $this->table (username, name, email, password, avatar, created_at) VALUES (?,?,?,?,?,?)";
        return $this->db->query($statement, $data);
    }

    public function update($data, $id)
    {
        $dataImg =  $this->getById($id);
        if($data['avatar']){
            $statement = "UPDATE $this->table SET username=?, name=?, email=?, avatar=?, updated_at=? WHERE id=?";
            if($statement){
                unlink('assets/profile/'.$dataImg->avatar);
            }
        } else {
            unset($data['avatar']);
            $statement = "UPDATE $this->table SET username=?, name=?, email=?, updated_at=? WHERE id=?";
        }
        
        
        return $this->db->query($statement, array_merge($data, array($id)));
    }

    public function delete($id)
    {
        $data = $this->getById($id);
        $statement = "DELETE FROM $this->table WHERE id=?";
        unlink('assets/profile/'.$data->avatar);
        return $this->db->query($statement, [$id]);
    }
}