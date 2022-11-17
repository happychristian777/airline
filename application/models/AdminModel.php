<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminModel extends CI_Model {

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
		 $this->load->database();
	 }
	 public function loginAdmin($email,$password)
	 {
		 	$this->db->where('adminemail',$email);
			$this->db->where('adminpwd',$password);
			$result=$this->db->get('admin');
			return $result->result();
	 }
	 public function ins_staff($data)
	 {
			$this->db->insert('staff',$data);
			return true;
	 }
	 public function ins_flight($data)
	 {
		$this->db->insert('flight',$data);
		return true;
	 }
	 public function ins_passenger($data)
	 {
		$this->db->insert('passenger',$data);
		return true;
	 }
	 public function ins_machine($data)
	 {
		$this->db->insert('airplane',$data);
		return true;
	 }
	 public function getStaff()
	 {
		 $res=$this->db->get('staff');
		 return $res->result();
	 }
	 public function getFlight()
	 {
		 $res=$this->db->get('flight');
		 return $res->result();
	 }
	 public function getPassenger()
	 {
		 $res=$this->db->get('passenger');
		 return $res->result();
	 }
	 public function getMachine()
	 {
		 $res=$this->db->get('airplane');
		 return $res->result();
	 }
	 public function updateStaff($id)
	 {
		 $this->db->where('id',$id);
		 $this->db->update('staff',$data);
		 return true;
	 }
	 public function updateFlight($id)
	 {
		 $this->db->where('id',$id);
		 $this->db->update('flight',$data);
		 return true;
	 }
	 public function updatePassenger($id)
	 {
		 $this->db->where('id',$id);
		 $this->db->update('passenger',$data);
		 return true;
	 }
	 public function updateMachine($id)
	 {
		 $this->db->where('id',$id);
		 $this->db->update('airplane',$data);
		 return true;
	 }
	 public function del_staff($id)
	 {
		 $this->db->where('empnum',$id);
		 $this->db->delete('staff');
		 return true;
	 }
	 public function del_flight($id)
	 {
		 $this->db->where('flightnum',$id);
		 $this->db->delete('flight');
		 return true;
	 }
	 public function del_passenger($id)
	 {
		 $this->db->where('pasnum',$id);
		 $this->db->delete('passenger');
		 return true;
	 }
	 public function del_machine($id)
	 {
		 $this->db->where('numser',$id);
		 $this->db->delete('airplane');
		 return true;
	 }
	 public function editStaff($id)
	 {
	 	$this->db->where('empnum',$id);
		 $res=$this->db->get('staff');
		 return $res->result();
	 }
	 public function editPassenger($id)
	 {
		$this->db->where('pasnum',$id);
		 $res=$this->db->get('passenger');
		 return $res->result();
	 }
	 public function editFlight($id)
	 {
		$this->db->where('flightnum',$id);
		 $res=$this->db->get('flight');
		 return $res->result();
	 }
	 public function editMachine($id)
	 {
		$this->db->where('numser',$id);
		 $res=$this->db->get('airplane');
		 return $res->result();
	 }
	 public function upd_staff($id,$data)
	 {
		$this->db->where('empnum',$id);
		$this->db->update('staff',$data);
		return true;
	 }
	 public function upd_flight($id,$data)
	 {
		$this->db->where('flightnum',$id);
		$this->db->update('flight',$data);
		return true;
	 }
	 public function upd_passenger($id,$data)
	 {
		$this->db->where('pasnum',$id);
		$this->db->update('passenger',$data);
		return true;
	 }
	 public function upd_machine($id,$data)
	 {
		$this->db->where('numser',$id);
		$this->db->update('airplane',$data);
		return true;
	 }
	 public function getpb()
	 {
		$res=$this->db->get('passenger');
		return $res->result();
	 }
	 public function getfb()
	 {
		$res=$this->db->get('flight');
		return $res->result();
	 }
	 public function insBooking($data)
	 {
		 $this->db->insert('bookings',$data);
		 return true;
	 }
	 public function getBookings()
	 {
		 $res=$this->db->get('bookings');
		 return $res->result();

		 $this->db->select('*');
		 $this->db->from('bookings');
		 $this->db->join('passenger', 'bookings.pasnum = passenger.panum');
		 $query = $this->db->get();
		 return $query->result();
	 }
	 public function delBooking($id)
	 {
		 $this->db->where('bookid',$id);
		 $this->db->delete('bookings');
		 return true;
	 }
	 public function flight_count() {
		return $this->db->count_all("flight");
	}
	public function passenger_count() {
		return $this->db->count_all("passenger");
	}
	public function pilots_count() {
		return $this->db->count_all("staff");
	}
	
}