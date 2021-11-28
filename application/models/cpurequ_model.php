<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cpurequ_model extends CI_Model
{

	// For adding 
	/*public function add($uid, $item, $description, $quantity, $estimated, $req_date, $po_num, $req_status, $s_person)
	{
		//work on the db table to insert data as it is required
		$data = array(
			'user_id' => $uid,
			'item_name' => $item,
			'description' => $description,
			'quantity' => $quantity,
			'estimate' => $estimated,
			'req_date' => $req_date,
			'po_num' => $po_num,
			'req_status' => $req_status,
			's_person' => $s_person,
		);
		$query = $this->db->insert('requisition', $data);
		if ($query) {
			$this->session->set_flashdata('success', 'Expense added successfully.');
			redirect('requisition/add');
			var_dump($this->session->flashdata('success'));
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('requisition/add');
		}
	}*/
	//For Manage 


    public function manage()
	{
		$query = $this->db->select('user_id, item_name, description, quantity, req_date, po_num, req_status')
			->group_by('sl')
			->get('requisition');
		return $query->result();
	}
    
    public function updateNew($data,$pos){


        $this->db->where('po_num', $pos);
        $query = $this->db->update('requisition', $data);
        if($query){
            $this->session->set_flashdata('success','Requisition updated successfully.');
            
            var_dump($this->session->flashdata('success'));
        } else {
            $this->session->set_flashdata('error','Something went wrong. Please try again.');
            
        }
		redirect('cpurequ/manage');
			}

    public function  printing($poid){
        
		$query =$this->db->query("SELECT po_num, req_date,item_name,description,quantity,estimate,FullName, Email, MobileNumber FROM `requisition` join tbluser ON requisition.user_id = tbluser.ID WHERE po_num = {$poid}");

		return $query->result();
     }
	public function getFile($poid){
		 $query =$this->db->query("SELECT files from `requisition` WHERE po_num = {$poid}");
		 return $query->row();
	 }



	
	
}
