<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ClientModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Client',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Client',$id);
        return $this->db->update('Client',$data);
    }

    public function delete($id){
        $this->db->where('id_Client',$id);
        return $this->db->delete('Client');
    }

    public function getByid($id){
        $query = $this->db->get_where('Client',array('id_Client'=>$id));
        return $query->row_array();
    }

    public function getAll(){
    $query = $this->db->get('Client');
    return $query->result_array();
    }
    public function loginOrSignUp($numero, $type)
    {
        $query = $this->db->get_where('Client', array(
            'numero' => $numero,
            'type' =>$type
        ));
        var_dump($query->num_rows());
        if($query->num_rows()==0)
        {   
            $this->insert(array(
                'numero' => $numero,
                'type' => $type
            ));
            $query = $this->db->get_where('Client', array(
                'numero' => $numero,
                'type' =>$type
            ));
        }
        return $query->row_array();
    }
}
?>