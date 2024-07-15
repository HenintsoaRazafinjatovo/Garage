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
    function isWithinBusinessHours(DateTime $date) {
    
        $dateClone = clone $date;
        $start = clone $dateClone;
        $start->setTime(8, 0, 0);
        $end = clone $dateClone;
        $end->setTime(18, 0, 0);
        if ($dateClone >= $start && $dateClone <= $end) {
            return true;
        } else {
            return false;
        }
    }
    function addHoursToDateTime(DateTime $date, int $hours): DateTime {
        $newDate = clone $date;
        $newDate->modify("+$hours hours");
        return $newDate;
    }
    public function demandeRdv($dateD,$idService)
    {   
        $this->load->Model('SlotModel');
        $sql = "SELECT * from Service where id_Service=$idService;";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        $duree=$res["duree"];
        $dateF=addHoursToDateTime($dateD,$duree);
        if(isWithinBusinessHours($dateD)){
            if(!isWithinBusinessHours($dateF)){
                $end18=clone $dateF;
                $end18->setTime(18,0,0);
                $diff=date_diff($dateF,$end18);
                $start8=clone $dateF;
                $start8->modify("+1 days");
                $start8->setTime(8,0,0);
                $dateF=date_add($diff,$start8);
            }
            $slotDisponibles= $this->SlotModel->get_available_slots($dateD,$dateF);
        }
        else{
            throw new Exception("Aucun slot disponible a cette date", 1);
        }
    }
   

}

?>