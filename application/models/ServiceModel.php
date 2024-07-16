<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class ServiceModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Service',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Service',$id);
        return $this->db->update('Service',$data);
    }

    public function delete($id){
        $this->db->where('id_Service',$id);
        return $this->db->delete('Service');
    }

    public function getByid($id){
        $query = $this->db->get_where('Service',array('id_Service'=>$id));
        return $query->row_array();
    }

    public function getAll(){
        $query = $this->db->get('Service');
        $result= $query->result_array();
        foreach ($result as $key=>$value) {
            $result[$key]['duree']=$this->formatHour($value['duree']);
        }

        return $result;
    }
    
    function formatHour($double_heure){
        $heures = floor($double_heure);
        $minutes = ($double_heure - $heures) * 60;
        return sprintf("%02d:%02d", $heures, $minutes);
    }

    function doubleHour($heure) {
        list($heures, $minutes) = explode(':', $heure);
        return $heures + ($minutes / 60);
    }
}