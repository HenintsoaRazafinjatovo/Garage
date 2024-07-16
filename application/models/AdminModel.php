<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class AdminModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Admin',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Admin',$id);
        return $this->db->update('Admin',$data);
    }

    public function delete($id){
        $this->db->where('id_Admin',$id);
        return $this->db->delete('Admin');
    }

    public function getByid($id){
        $query = $this->db->get_where('Admin',array('id_Admin'=>$id));
        return $query->row_array();
    }

    public function getAll(){
    $query = $this->db->get('Admin');
    return $query->result_array();
    }
    public function verifLogin($email, $mdp)
    {
        $query = $this->db->get_where('Admin', array(
            'email' => $email,
            'mdp' => md5($mdp),
            
        ));

        if ($query->num_rows() != 0){
            return $query->row_array();
        }
        throw new Exception("Login introuvable", 1);
    }
    
    public function suppressiondonnees()
    {
        $query="delete from Paiement";
        $this->db->query($query);
        $query="delete from SlotOccupe";
        $this->db->query($query);
        $query="delete from Rdv";
        $this->db->query($query);
        $query="delete from Client";
        $this->db->query($query);
    }
}

?>