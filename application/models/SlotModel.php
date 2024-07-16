<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class SlotModel extends CI_Model
{
    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert($data){
        return $this->db->insert('Slot',$data);
    }

    public function update($id,$data){
        $this->db->where('id_Slot',$id);
        return $this->db->update('Slot',$data);
    }

    public function delete($id){
        $this->db->where('id_Slot',$id);
        return $this->db->delete('Slot');
    }

    public function getByid($id){
        $query = $this->db->get_where('Slot',array('id_Slot'=>$id));
        return $query->row_array();
    }

    public function getAll(){
    $query = $this->db->get('Slot');
    return $query->result_array();
    }
    public function get_available_slots($dateDebut, $dateFin) {
        $allSlots = $this->getAll();

        $availableSlots = [];

        foreach ($allSlots as $slot) {
        //     $this->db->select('COUNT(*) as count');
        //     $this->db->from('SlotOccupe');
        //     $this->db->where('Id_Slot', $slot['Id_Slot']);
        //     $this->db->where('dateDOccupe <', $dateFin->format('Y-m-d H:i:s'));
        //     $this->db->where('dateFOccupe >', $date->format('Y-m-d H:i:s'));
        //     $query = $this->db->get();
        //     $result = $query->row();
        //     if ($result->count == 0) {
        //         $availableSlots[] = $slot;
        //     }

            $dateDebut1=$dateDebut->format('Y-m-d H:i:s');
            $dateFin1=$dateFin->format('Y-m-d H:i:s');
            $idSlot=$slot['Id_Slot'];
            $query="SELECT count(*) as count FROM SlotOccupe WHERE Id_Slot=$idSlot and ((('$dateDebut1' > dateDOccupe and '$dateDebut1' < dateFOccupe) or ('$dateFin1' > dateDOccupe and '$dateFin1' < dateFOccupe)) or ('$dateDebut1' <= dateDOccupe and '$dateFin1'>= dateFOccupe))";

            $query = $this->db->query($query);
            $result = $query->row_array();
            

            if ($result['count'] == 0) {
                $availableSlots[] = $slot;
            }
        }

        return $availableSlots;
    }
    public function etatSlot($date)
    {
        $slots=$this->getAll();

        foreach ($slots as $key=>$value) {
            $id= $value['Id_Slot'];
            $sql="Select * from SlotOccupe where Id_Slot = $id and('$date'>= dateDOccupe and '$date'<= dateFOccupe );";
            $sql=$this->db->query($sql);
            $result = $sql->result_array();
            if(count($result)>0)
            {
                $slots[$key]['etat']='occupe';
            }
            else
            {
                $slots[$key]['etat']='libre';
            }
        }
        return $slots;
    }
}

?>