<?php 

defined('BASEPATH') OR exit('No direct script access allowed');


class MemberModel extends CI_Model
{
    protected $table = 'members';

    public function getAll()
    {
        return $this->db->query("SELECT * FROM $this->table")->result();
    }

    public function getById($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id=?", ['id'=>$id])->row();
    }

    public function insert($data)
    {
        $statement  = "INSERT INTO $this->table (nik, full_name, phone, address, born_place, born_date, gender, country, nationality) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($statement, $data);
    }

    public function update($data, $id)
    {
        $statement = "UPDATE $this->table SET nik= ?, full_name= ?, phone= ?, address= ?, born_place= ?, born_date= ?, gender= ?, country= ?, nationality= ? WHERE id=?";
        return $this->db->query($statement, array_merge($data, ['id'=>$id]));
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, ['id'=>$id]);
    }
    
}