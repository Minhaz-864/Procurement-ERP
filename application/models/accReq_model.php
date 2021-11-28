<?php
defined('BASEPATH') or exit('No direct script access allowed');

class accReq_model extends CI_Model
{

    public function manage()
    {
        $query = $this->db->select('Role, FullName, Email, MobileNumber, RegDate, Approval')
            ->where('Approval', 0)
            ->group_by('ID', 'RegDate')
            ->get('tbluser');
        return $query->result();
    }

    public function update($data, $fname)
    {


        $this->db->where('FullName', $fname);
        $query = $this->db->update('tbluser', $data);
        if ($query) {
            $this->session->set_flashdata('success', 'User info updated successfully.');
            redirect('accReq/manage');
            var_dump($this->session->flashdata('success'));
        } else {
            $this->session->set_flashdata('error', 'Something went wrong. Please try again.');
            redirect('accReq/manage');
        }
    }
}
