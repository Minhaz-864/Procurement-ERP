<?php
defined('BASEPATH') or exit('No direct script access allowed');

class probstate_model extends CI_Model
{

	// For adding 
	public function add($uid,$name,$room,$pc_num,$statement,$prodate)
	{
		//work on the db table to insert data as it is required
		$data = array(
			'user_id' => $uid,
			'FullName' => $name,
			'room' => $room,
			'pc_num' => $pc_num,
			'problem' => $statement,
			'prob_date' => $prodate,
            'attended' => 0
		);
		$query = $this->db->insert('probstate', $data);
		if ($query) {
			$this->session->set_flashdata('success', 'Problem Statement Forwarded successfully.');
			redirect('probstate/add');
			var_dump($this->session->flashdata('success'));
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('probstate/add');
		}
	}
	//For Manage 


    public function manage($value)
	{
		$query = $this->db->select('FullName, room, pc_num, problem, prob_date,ID')
			->where('attended', $value)
            ->group_by('ID')
			->get('probstate');
		return $query->result();
	}
    
    public function updatestate($id){
        $data=[
            'attended' => 1
        ];
        $this->db->where('ID', $id);
        $this->db->update('probstate',$data);

    }
    // public function update($state){

    //     $this->db->where('po_num', $pos);
    //     $query = $this->db->update('requisition', $data);
    //     if($query){
    //         $this->session->set_flashdata('success','Requisition updated successfully.');
    //         redirect('cpurequ/manage');
    //         var_dump($this->session->flashdata('success'));
    //     } else {
    //         $this->session->set_flashdata('error','Something went wrong. Please try again.');
    //         redirect('cpurequ/manage');
    //     }
	// 		}

    



	
	
}
