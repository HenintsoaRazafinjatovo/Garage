<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class RdvModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Rdv',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Rdv',$id);
        return $this->db->update('Rdv',$data);
    }

    public function delete($id){
        $this->db->where('id_Rdv',$id);
        return $this->db->delete('Rdv');
    }

    public function getByid($id){
        $query = $this->db->get_where('Rdv',array('id_Rdv'=>$id));
        return $query->row_array();
    }

    public function getAll(){
    $query = $this->db->get('Rdv');
    return $query->result_array();
    }
   

}

?>