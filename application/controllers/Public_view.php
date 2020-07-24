<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Public_view extends CI_Controller {


	public function index()
	{
		$this->load->view('_includes/header');
		$this->load->model('flood_m');

		$flood = $this->flood_m->get_data()->result();
		foreach ($flood as $i => $fl) {
			$flood[$i]->created =  date('y-m-d H:i', strtotime($fl->created));
			switch($flood[$i]->Data){
				case  1 :
						$flood[$i]->Data = 7;
						break;
				case  2 :
						$flood[$i]->Data = 6;
						break;
				case  3 :
						$flood[$i]->Data = 5;
						break;
				case  4 :
						$flood[$i]->Data = 4;
						break;
				case  5 :
						$flood[$i]->Data = 3;
						break;
				case  6 :
						$flood[$i]->Data = 2;
						break;
				case  7 :
						$flood[$i]->Data = 1;
						break;


				default :
						$flood[$i]->Data = 7;
						break;
			}
		}
		// print_r("<pre>"); print_r($flood); die();
		//echo json_encode($flood);
	}
	public function ajax_data(){
		$this->load->model('flood_m');

		$flood = $this->flood_m->get_data()->result();
		foreach ($flood as $i => $fl) {
			$flood[$i]->created =  date('y-m-d H:i', strtotime($fl->created));
			switch($flood[$i]->Data){
				case  1 :
						$flood[$i]->Data = 7;
						break;
				case  2 :
						$flood[$i]->Data = 6;
						break;
				case  3 :
						$flood[$i]->Data = 5;
						break;
				case  4 :
						$flood[$i]->Data = 4;
						break;
				case  5 :
						$flood[$i]->Data = 3;
						break;
				case  6 :
						$flood[$i]->Data = 2;
						break;
				case  7 :
						$flood[$i]->Data = 1;
						break;


				default :
						$flood[$i]->Data = 0;
						break;
			}
		}


		echo json_encode($flood); 
	}
	public function insert_data(){

		$this->load->model('flood_m');
		$params = array(
			'Data' => get('data')
		);
		$this->flood_m->save($params);
		echo "insert sucsess";
	}
	function register(){
		// die();	
	$this->load->library('form_validation');
      $this->form_validation->set_rules('firs_tname', 'First Name', 'trim|required');
      $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required');
      $this->form_validation->set_rules('PhoneNo', 'Phone No.', 'trim|required');
        if($this->form_validation->run() == FALSE){
          echo json_encode(array(
            'is_valid'=> false,
            'errors'=> $this->form_validation->error_array(),
          ));
        }else{    
          $this->load->model('residence_m');

          $resident_params = array(
            'Full_name' => post('firs_tname'). ' ' .post('last_name')  ,
            'PhoneNo' => post('PhoneNo'),
          );

          // if(post('id') && post('id') != ''){
          //   $id = $this->residence_m->save($patient_params,post('id'));
          // }else{
            $id = $this->residence_m->save($resident_params);
          // }
            // print_r($this->db->last_query()); 
          echo json_encode(array(
            'is_valid'=> true,
            'info'=> $resident_params,
          ));
        } 

        }
			
	
}
