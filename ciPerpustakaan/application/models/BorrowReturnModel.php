<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowReturnModel extends CI_Model
{
    protected $table = "borrow_return";

    public function getAll()
    {
        $statement ="SELECT $this->table.*, borrow_details.book_id, books.title FROM $this->table JOIN borrow_details ON borrow_details.id = borrow_return.detail_id JOIN books ON books.id = borrow_details.book_id";
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