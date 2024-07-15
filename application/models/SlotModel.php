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
            $this->db->select('COUNT(*) as count');
            $this->db->from('SlotOccupe');
            $this->db->where('Id_Slot', $slot['Id_Slot']);
            $this->db->where('dateDOccupe <', $dateFin);
            $this->db->where('dateFOccupe >', $dateDebut);

            $query = $this->db->get();
            $result = $query->row();

            if ($result->count == 0) {
                $availableSlots[] = $slot['Id_Slot'];
            }
        }

        return $availableSlots;
    }

}

?>