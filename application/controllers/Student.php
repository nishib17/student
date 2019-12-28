<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller
{

	public function index()
	{
		$this->load->view("index");

	}
	public function add()
	{
		$this->load->view("add");

	}
	// Date Function
	public function current_date(){
		date_default_timezone_set('Asia/Kolkata');
		$date = date('Y-m-d H:i:s');
		return $date;
	}
	public function insertdata()
	{
		$config['upload_path']   = './upload/certificates/'; 
     	$config['allowed_types'] = 'jpeg|jpg|png|pdf'; 
     	$config['max_size']      = '2048';            

     	$this->load->library('upload',$config);
     	if ( ! $this->upload->do_upload('userfile'))
     	{
     		$error = array('error' => $this->upload->display_errors());
     		$this->load->view('Student/add', $error);
     	}
     	else
     	{
     		$upload_data=$this->upload->data();
     	}
     	$image_path=base_url("upload/certificates/");
     	$data['image']=$image_path;
		//create array for get data from index
		$data= array(
			'f_name' 	=> $this->input->post('f_name'),
			'm_name' 	=> $this->input->post('m_name'),
			'l_name' 	=> $this->input->post('l_name'),
			'mobile' 	=> $this->input->post('mobile'),
			'standard' 	=> $this->input->post('standard'),
			'course'	=> $this->input->post('course'),
			'email_id' 	=> $this->input->post('email_id'),
			'birth_certificate' => ($_FILES['userfile']['name'] !="") ? base_url()."upload/certificates/".$upload_data['file_name'] : "",
			'created' 	=> $this->current_date()
			);
		$this->db->insert('students',$data);
		$insert_id =  $this->db->insert_id();

		$total = count($_FILES['images']['name']);
		$data = array();
		for( $i=0 ; $i < $total ; $i++ ) {
			 $_FILES['file']['name']     = $_FILES['images']['name'][$i];
                $_FILES['file']['type']     = $_FILES['images']['type'][$i];
                $_FILES['file']['tmp_name'] = $_FILES['images']['tmp_name'][$i];
                $_FILES['file']['error']     = $_FILES['images']['error'][$i];
                $_FILES['file']['size']     = $_FILES['images']['size'][$i];

			    // File upload configuration
                $uploadPath = 'upload/certificates/';
                $config['upload_path'] = $uploadPath;
                $config['allowed_types'] = 'jpg|jpeg|png|gif';
                
                // Load and initialize upload library
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                // Upload file to server
                if($this->upload->do_upload('file')){
                    // Uploaded file data
                    $fileData = $this->upload->data();
                    $uploadData[$i]['path'] = $fileData['file_name'];
                    $data= array(
						'student_id'    => $insert_id,
						'certificate' 	=> $_POST['certificate'][$i],
						'path' 			=> 
						($_FILES['images']['name'][$i] !="") ? base_url()."upload/certificates/".$uploadData[$i]['path']  : "",
						'created' 		=> $this->current_date()
					);

                }
	     	
	     	
			$this->db->insert('students_certificate',$data);


		}
		
		
		redirect("Student/index");
	}
	public function edit($id)
	{
		$row=$this->StudentModel->getonerow($id);
		$data['row']=$row;
		$result=$this->StudentModel->getmulresult($id);
		$data['result']=$result;
		$this->load->view('edit',$data);
		//redirect('Student/edit');
	}
	public function update($id)
	{
		$config['upload_path']   = './upload/certificates/'; 
     	$config['allowed_types'] = 'jpeg|jpg|png|pdf'; 
     	$config['max_size']      = '2048';            

     	$this->load->library('upload',$config);
     	if ( ! $this->upload->do_upload('userfile'))
     	{
     		$error = array('error' => $this->upload->display_errors());
     		$this->load->view('edit', $error);
     	}
     	else
     	{
     		$upload_data=$this->upload->data();
     	}
     	$image_path=base_url("upload/certificates/");
     	$data['image']=$image_path;
		$id=$this->input->post('id');
		$data= array(

			'f_name' 	=> $this->input->post('f_name'),
			'm_name' 	=> $this->input->post('m_name'),
			'l_name' 	=> $this->input->post('l_name'),
			'mobile' 	=> $this->input->post('mobile'),
			'standard' 	=> $this->input->post('standard'),
			'course'	=> $this->input->post('course'),
			'email_id' 	=> $this->input->post('email_id'),
			'birth_certificate' => ($_FILES['userfile']['name'] !="") ? base_url()."upload/certificates/".$upload_data['file_name'] : $this->input->post('img_hidden'),
			'modified' 	=> $this->current_date()

			);
		$this->db->where('id',$id);
		$this->db->update('students',$data);
		// print($this->db->last_query());exit();
		redirect("Student/index");
		
	}
	public function delete($id)
	{
		$field=array(
     		'is_deleted' => 1
     	);
		$id=$this->db->where('id',$id);
		$this->db->update('students',$field);
		redirect("Student/index");

	}
	
}
