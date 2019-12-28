<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class StudentModel extends CI_Model
{
	
	public function viewdata()
	{
		$query= $this->db->get_where('students',array('is_deleted ='=> 0));
		return $query->result();
	}
	public function getonerow($id)
	{
		$this->db->where('id',$id);
		$query=$this->db->get('students');
		return $query->row();
	}
	public function getmulresult($id)
	{
		$this->db->where('student_id',$id);
		$query=$this->db->get('students_certificate');
		return $query->result();
	}
}