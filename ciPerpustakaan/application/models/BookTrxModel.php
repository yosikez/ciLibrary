<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class BookTrxModel extends CI_Model
{
    protected $table = "book_trxs";

    public function getAll()
    {
        $statement = " SELECT $this->table.*, books.title AS bookTitle, members.full_name AS memberName FROM book_trxs JOIN books ON $this->table.book_id = books.id JOIN members ON $this->table.member_id = members.id";
        return $this->db->query($statement)->result();
    }
    
    public function getById($id)
    {
        return $this->db->get_where($this->table, array('id'=>$id))->row();
    }

    public function insert($data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function update($data, $id)
    {
        return $this->db->update($this->table, $data, ['id'=>$id]);
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, [$id]);
    }
}