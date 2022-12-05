<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class SubscriptionModel extends CI_Model
{
    protected $table = 'subscriptions';

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
        $statement = "INSERT INTO $this->table (title, month, price) VALUES (?, ?, ?)";
        return $this->db->query($statement, $data);
    }

    public function update($data, $id)
    {
        $statement = "UPDATE $this->table SET title=?, month=?, price=?, is_active=? WHERE id=?";
        return $this->db->query($statement, array_merge($data, ['id'=>$id]));
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, ['id'=>$id]);
    }

    
}