<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class DashBoardModel extends CI_Model
{
    public function traiteParJour($dateD,$dateF)
    {
        $query='select * count from clientsTreatedPerDay where treatment_date >='$dateD' treatment_date <='$dateF'';
        $query=$this->db->query($query);
        $result = $query->result_array();


    }
}
