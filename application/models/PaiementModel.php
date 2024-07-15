<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class PaiementModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Paiement',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Paiement',$id);
        return $this->db->update('Paiement',$data);
    }

    public function delete($id){
        $this->db->where('id_Paiement',$id);
        return $this->db->delete('Paiement');
    }

    public function getByid($id){
        $query = $this->db->get_where('Paiement',array('id_Paiement'=>$id));
        return $query->row_array();
    }

    public function getAll(){
    $query = $this->db->get('Paiement');
    return $query->result_array();
    }
    

}

?>