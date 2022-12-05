<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class SubsmemberModel extends CI_Model
{
    protected $table = 'member_trxs';

    public function getAll()
    {
        $statement = "SELECT member_trxs.*, members.full_name AS memberName, subscriptions.title AS subsTitle FROM member_trxs JOIN members ON member_trxs.member_id = members.id JOIN subscriptions ON member_trxs.subs_id = subscriptions.id";
        return $this->db->query($statement)->result();
    }

    public function getById($id)
    {
        $statement = "SELECT * FROM $this->table";
        return $this->db->query($statement, ['id'=>$id])->row();
    }

    public function insert($data)
    {
        $statement = "INSERT INTO $this->table (member_id, subs_id, active_at, expire_at, status, total_order, note) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->db->query($statement, $data);
    }

    public function update($data, $id)
    {
        $statement = "UPDATE $this->table SET member_id=?, subs_id=?, active_at=?, expire_at=?, status=?, total_order=?, note=? WHERE id=?";
        return $this->db->query($statement, array_merge($data, ['id'=>$id]));
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, ['id'=>$id]);
    }
}