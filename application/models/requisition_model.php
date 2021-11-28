<?php
defined('BASEPATH') or exit('No direct script access allowed');

class requisition_model extends CI_Model
{

	// For adding expenses
	public function add($uid, $item, $description, $quantity, $estimated, $req_date, $po_num, $req_status)
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
			'req_status' => 'Submitted',
			
		);
		$query = $this->db->insert('requisition', $data);
		if ($query) {
			$this->session->set_flashdata('success', 'Requisition added successfully.');
			redirect('requisition/add');
			var_dump($this->session->flashdata('success'));
		} else {
			$this->session->set_flashdata('error', 'Something went wrong. Please try again.');
			redirect('requisition/add');
		}
	}
	//For Manage Expenses
	public function manage($uid)
	{
		$query = $this->db->select('user_id, item_name, description, quantity, req_date, po_num, req_status')
			->where('user_id', $uid)
			->group_by('sl')
			->get('requisition');
		return $query->result();
	}
	//for role control
	public function getRole(){
		$uiid = $this->session->userdata('fname');
		echo $uiid;
		$roleQuery = $this->db->select('Role')
				->from('tbluser')
				->where('FullName', $uiid);
			return $roleQuery->result();	
	}
	// For expense Deletion
	public function delete($uid)
	{
		$query = $this->db->where('ID', $uid)
			->delete('tblexpense');
	}
}
