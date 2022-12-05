<?php

defined('BASEPATH') or exit('No direct script access allowed');

class BorrowdetailModel extends CI_Model
{
    protected $table = "borrow_details";

    public function getAll()
    {
        return $this->db->query("SELECT borrow_details.*, books.title, members.full_name FROM borrow_details JOIN books ON borrow_details.book_id = books.id JOIN borrow_books ON borrow_details.borrow_id = borrow_books.id JOIN members ON borrow_books.member_id = members.id;")->result();
    }

    public function getById($id)
    {
        return $this->db->query("SELECT * FROM $this->table WHERE id=?", ['id' => $id])->row();
    }

    public function insert($data)
    {
        return $this->db->insert_batch($this->table, $data);
    }

    public function update($data, $id)
    {
        $statement = "UPDATE $this->table SET book_id= ?, note=? WHERE id=?";
        return $this->db->query($statement, array_merge($data, ['id' => $id]));
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, ['id' => $id]);
    }
}
