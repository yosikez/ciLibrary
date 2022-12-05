<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class BorrowbooksModel extends CI_Model
{
    protected $table = "borrow_books";

    public function getAll()
    {
        return $this->db->query("SELECT $this->table.*, members.full_name AS memberName, COUNT(borrow_details.book_id) AS cnt FROM $this->table JOIN members ON borrow_books.member_id = members.id JOIN borrow_details ON borrow_details.borrow_id = borrow_books.id GROUP BY borrow_details.borrow_id")->result();
    }

    public function getById($id)
    {
        return $this->db->query("SELECT $this->table.*, members.full_name as full_name FROM $this->table JOIN members ON $this->table.member_id=members.id WHERE $this->table.id=?", ['id'=>$id])->row();
    }

    public function getNameAndId()
    {
        return $this->db->query("SELECT $this->table.id AS borrow_id, members.full_name FROM $this->table JOIN members ON $this->table.member_id = members.id")->result();
    }

    public function getLastId()
    {
        $statement = " SELECT id FROM $this->table ORDER BY id DESC LIMIT 1";
        return $this->db->query($statement)->row();
    }

    public function insert($data)
    {
        $statement  = "INSERT INTO $this->table (member_id, note) VALUES (?, ?)";
        return $this->db->query($statement, $data);
    }

    public function update($data, $id)
    {
        $statement = "UPDATE $this->table SET member_id= ?, note=? WHERE id=?";
        return $this->db->query($statement, array_merge($data, ['id'=>$id]));
    }

    public function delete($id)
    {
        $statement = "DELETE FROM $this->table WHERE id=?";
        return $this->db->query($statement, ['id'=>$id]);
    }

    public function insert_multi($hdr, $note , $books)
    {
        $this->db->trans_start();
            $data = array(
                'member_id'=> $hdr,
                'note'=> $note
            );

            $this->db->insert($this->table, $data);
            $hdrMemberId = $this->db->insert_id();
            $result = array();
            foreach($books as $key => $val){
                $result[] = array(
                    'book_id'=>$books[$key],
                    'borrow_id' => $hdrMemberId,
                    'deadline_at'=>date("Y:m:d", strtotime("+5 day", strtotime(date('Y:m:d H:i:s', time()))))
                );
            }
            $this->db->insert_batch('borrow_details', $result);
        $this->db->trans_complete();
    }
    public function update_multi($id, $hdr, $note , $books)
    {
        $this->db->trans_start();
            $data = array(
                'member_id'=> $hdr,
                'note'=> $note
            );

            $this->db->where('id', $id);
            $this->db->update($this->table, $data);
        
            $this->db->delete('borrow_details', array('borrow_id' => $id));
            $result = array();
            foreach($books as $key => $val){
                $result[] = array(
                    'book_id'=>$books[$key],
                    'borrow_id' => $id,
                    
                );
            }
            $this->db->insert_batch('borrow_details', $result);
        $this->db->trans_complete();
    }

    public function getDetailBorrow($id)
    {
        $statement = "SELECT books.title as bookTitle, members.full_name AS memberName, borrow_details.deadline_at AS deadline, borrow_details.created_at AS created_at, borrow_details.id AS brwId FROM borrow_details JOIN books ON borrow_details.book_id=books.id JOIN borrow_books ON borrow_details.borrow_id = borrow_books.id JOIN members ON borrow_books.member_id = members.id WHERE borrow_id=?";
        return $this->db->query($statement, ['id'=>$id])->result();
    }
}