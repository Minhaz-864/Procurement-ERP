<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reports_Model extends CI_Model{
// Date wise report
public function datewisereport($fdate,$tdate,$uid){
	$data=array(
'ExpenseDate>='=>$fdate,
'ExpenseDate<='=>$tdate
);
	$query=$this->db->select('ExpenseItem,ExpenseDate,sum(ExpenseCost) as ExpenseCost')
                    ->where($data)
                    ->group_by('ExpenseDate, ExpenseItem')
                    ->get('tblexpense');
                    return $query->result();

}

// Month wise report
public function monthwisereport($fdate,$tdate,$uid){
	$data=array(
'ExpenseDate>='=>$fdate,
'ExpenseDate<='=>$tdate
);
	$query=$this->db->select('ExpenseItem,sum(ExpenseCost) as ExpenseCost,month(ExpenseDate) as m,year(ExpenseDate) as y')
                    ->where($data)
                    ->group_by(array("month(ExpenseDate),year(ExpenseDate), ExpenseItem"))
                    ->get('tblexpense');
                    return $query->result();

}

// Month wise report
public function yearwisereport($fdate,$tdate,$uid){
	$data=array(
'ExpenseDate>='=>$fdate,
'ExpenseDate<='=>$tdate
);
	$query=$this->db->select('ExpenseItem,sum(ExpenseCost) as ExpenseCost,year(ExpenseDate) as y')
                    ->where($data)
                    ->group_by(array("year(ExpenseDate), ExpenseItem"))
                    ->get('tblexpense');
                    return $query->result();

}
}
