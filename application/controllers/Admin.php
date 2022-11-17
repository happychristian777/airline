<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 public function __construct(){
		 parent::__construct();
		 $this->load->model('AdminModel');
		 $this->load->helper(array('form','url','file','download'));
		 $this->load->library('session');
		 $this->load->library('form_validation');
	}
	public function index()
	{
		$this->load->view('backend/login');
	}
	public function isAdminLogin()
	{
		$email=$this->input->post('email');
		$password=$this->input->post('password');
		//$data=array('eamil'=>$email,'password'=>$password);
		$return=$this->AdminModel->loginAdmin($email,$password);

		if(count($return)>0)
		{
			foreach($return as $row)
			{
				$sessionArray=array(
					'adminname'=>$row->adminname,
				
				);
			}
			$this->session->set_userdata($sessionArray);
		//	$this->session->set_flashdata('success','Login Successful');
			redirect('Admin/dashboard');
		}
		else
		{
			$this->session->set_flashdata('failed','Invalid Admin Email or Password');
			redirect('Admin');
		}

	}
	/*public function test1()
	{
		$this->load->view();
	}*/

	public function dashboard()
	{
		$data['flights']=$this->AdminModel->flight_count();
		
		$data['passenger']=$this->AdminModel->passenger_count();
		$data['pilots']=$this->AdminModel->pilots_count();
		$this->load->view('backend/header');
		$this->load->view('backend/dashboard',$data);
		$this->load->view('backend/footer');
	}
	public function loadAddStaff()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/add_staff');

		$this->load->view('backend/footer');
	}
	public function loadAddMachine()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/add_machine');
		$this->load->view('backend/footer');
	}
	public function loadAddFlight()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/add_flight');
		$this->load->view('backend/footer');
	}
	public function loadAddPassenger()
	{
		$this->load->view('backend/header');
		$this->load->view('backend/add_passenger');
		$this->load->view('backend/footer');
	}
	public function loadManageStaff()
	{
		$data['res']=$this->AdminModel->getStaff();
		$this->load->view('backend/header');
		$this->load->view('backend/manage_staff',$data);
		$this->load->view('backend/footer');
	}
	public function loadManageFlight()
	{
		$data['res']=$this->AdminModel->getFlight();
		$this->load->view('backend/header');
		$this->load->view('backend/manage_flight',$data);
		$this->load->view('backend/footer');
	}
	public function loadManagePassenger()
	{
		$data['res']=$this->AdminModel->getPassenger();
		$this->load->view('backend/header');
		$this->load->view('backend/manage_passenger',$data);
		$this->load->view('backend/footer');
	}
	public function loadManageMachine()
	{
		$data['res']=$this->AdminModel->getMachine();
		$this->load->view('backend/header');
		$this->load->view('backend/manage_machine',$data);
		$this->load->view('backend/footer');
	}
	public function ins_staff()
	{
			$surname=$this->input->post('surname');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
			$salary=$this->input->post('salary');
			$data=array(
			'surname'=>$surname,
			'name'=>$name,
			'address'=>$address,
			'phone'=>$phone,
			'salary'=>$salary
			);
			$res=$this->AdminModel->ins_staff($data);
			if($res){
			
				redirect('Admin/loadManageStaff');
			}
			else{
				echo "Error";
			}
	}
	public function ins_passenger()
	{
		$surname=$this->input->post('surname');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
	
 
			$data=array('surname'=>$surname,
			'name'=>$name,
			'address'=>$address,
			'phone'=>$phone
			);
	
			$res=$this->AdminModel->ins_passenger($data);
			if($res){
			
				redirect('Admin/loadManagePassenger');
			}
			else{
				echo "Error";
			}
	}
	public function ins_flight()
	{
			$origin=$this->input->post('origin');
			$dest=$this->input->post('dest');
			$arr_time=$this->input->post('arr_time');
			$dep_time=$this->input->post('dep_time');
			$data=array('origin'=>$origin,
			'dest'=>$dest,
			'arr_time'=>$arr_time,
			'dep_time'=>$dep_time
			);
	
			$res=$this->AdminModel->ins_flight($data);
			if($res){
			
				redirect('Admin/loadManageFlight');
			}
			else{
				echo "Error";
			}
	}
	public function ins_machine()
	{
		$model=$this->input->post('model');
			$data=array('model'=>$model);
	
			$res=$this->AdminModel->ins_machine($data);
			if($res){
			
				redirect('Admin/loadManageMachine');
			}
			else{
				echo "Error";
			}
	}
	public function editStaff()
	{

		$id=$this->input->get('id');
		$data['res']=$this->AdminModel->editStaff($id);
		$this->load->view('backend/header');
		$this->load->view('backend/edit_staff',$data);
	}
	public function editFlight()
	{
		$id=$this->input->get('id');
		$data['res']=$this->AdminModel->editFlight($id);
		$this->load->view('backend/header');
		$this->load->view('backend/edit_flight',$data);
	}
	public function editMachine()
	{
		$id=$this->input->get('id');
		$data['res']=$this->AdminModel->editMachine($id);
		$this->load->view('backend/header');
		$this->load->view('backend/edit_machine',$data);
	}
	public function editPassenger()
	{
		$id=$this->input->get('id');
		$data['res']=$this->AdminModel->editPassenger($id);
		$this->load->view('backend/header');
		$this->load->view('backend/edit_passenger',$data);
	}

	public function deleteStaff()
	{
		$id=$this->input->get('id');
		$this->AdminModel->del_staff($id);
		redirect('Admin/loadManageStaff');
	}
	public function deleteFlight()
	{
		$id=$this->input->get('id');
		$this->AdminModel->del_flight($id);
		redirect('Admin/loadManageFlight');
	}
	public function deleteMachine()
	{
		$id=$this->input->get('id');
		$this->AdminModel->del_machine($id);
		redirect('Admin/loadManageMachine');
	}
	public function deletePassenger()
	{
		$id=$this->input->get('id');
		$this->AdminModel->del_passenger($id);
		redirect('Admin/loadManagePassenger');
		
	}
	public function upd_staff()
	{
		$id=$this->input->post('id');
			$surname=$this->input->post('surname');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
			$salary=$this->input->post('salary');
			$data=array(
			'surname'=>$surname,
			'name'=>$name,
			'address'=>$address,
			'phone'=>$phone,
			'salary'=>$salary
			);
			$res=$this->AdminModel->upd_staff($id,$data);
			if($res){
			
				redirect('Admin/loadManageStaff');
			}
			else{
				echo "Error";
			}
	}
	public function upd_passenger()
	{
		$id=$this->input->post('id');
		$surname=$this->input->post('surname');
			$name=$this->input->post('name');
			$address=$this->input->post('address');
			$phone=$this->input->post('phone');
	
 
			$data=array('surname'=>$surname,
			'name'=>$name,
			'address'=>$address,
			'phone'=>$phone
			);
	
			$res=$this->AdminModel->upd_passenger($id,$data);
			if($res){
			
				redirect('Admin/loadManagePassenger');
			}
			else{
				echo "Error";
			}
	}
	public function upd_machine()
	{
		$id=$this->input->post('id');
		$model=$this->input->post('model');
		
			$data=array('model'=>$model
			
			);
			$res=$this->AdminModel->upd_machine($id,$data);
			if($res){
			
				redirect('Admin/loadManageMachine');
			}
			else{
				echo "Error";
			}
	}
	public function upd_flight()
	{
		$id=$this->input->post('id');
		$origin=$this->input->post('origin');
			$dest=$this->input->post('dest');
			$arr_time=$this->input->post('arr_time');
			$dep_time=$this->input->post('dep_time');
			$data=array('origin'=>$origin,
			'dest'=>$dest,
			'arr_time'=>$arr_time,
			'dep_time'=>$dep_time
			);
	
			$res=$this->AdminModel->upd_flight($id,$data);
			if($res){
			
				redirect('Admin/loadManageFlight');
			}
			else{
				echo "Error";
			}
	}
	public function loadPBookings()
	{
		$data['passenger']=$this->AdminModel->getpb();
		$data['flight']=$this->AdminModel->getfb();
		$this->load->view('backend/header');
		$this->load->view('backend/add_booking',$data);
		$this->load->view('backend/footer');
	}
	public function addBooking()
	{
		$pasnum=$this->input->post('pasnum');
		$flightnum=$this->input->post('flightnum');
		$data=array(
			'pasnum'=>$pasnum,
			'flightnum'=>$flightnum
		);
		$this->AdminModel->insBooking($data);
		redirect('Admin/bookDetails');

	}
	public function bookDetails()
	{
		$data['booking']=$this->AdminModel->getBookings();
		$this->load->view('backend/header');
		$this->load->view('backend/manage_booking',$data);
		$this->load->view('backend/footer');
	}
	public function delBook()
	{
		$id=$this->input->get('id');
		$this->AdminModel->delBooking($id);
		redirect('Admin/bookDetails');
	}

	public function logout()
	{
		session_destroy();
		redirect('Admin');
	}
}
