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
    function slotDisponibles($dateD, $idService)
    {
        $this->load->model('SlotModel');
        $sql = "SELECT * from Service where id_Service=$idService;";
        $query = $this->db->query($sql);
        $res = $query->row_array();
        $duree=$res["duree"];
        $dateF=$this->addHoursToDateTime($dateD,$duree);
       
        
        if($this->isWithinBusinessHours($dateD)){
            

            if(!$this->isWithinBusinessHours($dateF)){
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
        return [$slotDisponibles,$dateF];
    }
    public function demandeRdv($dateD,$idService,$idClient)
    {   
        $resultFunction=$this->slotDisponibles($dateD,$idService);
        $slotDisponibles=$resultFunction[0];
    
        $dateF=$resultFunction[1];
        if(count($slotDisponibles)>0){   
            $data=array(
                'dateHdebut'=>$dateD->format('Y-m-d H:i:s'),
                'Id_Service'=>$idService,
                'Id_Slot'=>$slotDisponibles[0]['Id_Slot'],
                'Id_Client'=>$idClient
            );
            $this->insert($data);
            $dateD=$dateD->format('Y-m-d H:i:s');
            $dateF=$dateF->format('Y-m-d H:i:s');
            $idSlot=$slotDisponibles[0]['Id_Slot'];
            
            $sql="INSERT INTO SlotOccupe (dateDOccupe, dateFOccupe,Id_Slot) VALUES ('$dateD','$dateF',$idSlot)";
            $this->db->query($sql);
            $query = $this->db->get_where('Rdv',$data);
            $rdv=$query->row_array();
            return $rdv['Id_Rdv'];
        }
       
        else{
            throw new Exception("Aucun slot disponible a cette date", 1);
        }
    }
}

?>