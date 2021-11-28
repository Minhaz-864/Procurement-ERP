<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class cpurequ extends CI_Controller {
    function __construct(){
        parent::__construct();
        if(!$this->session->userdata('uid'))
        redirect('login');
    }
    public function manage(){
        $uid=$this->session->userdata('uid');
        $this->load->model('cpurequ_model');
        $alldetails = $this->cpurequ_model->manage($uid);

        $this->load->view('cpurequ_view',['details'=>$alldetails]);
        }
    public function update(){

        $pos =  $this->input->post('poid');
        $config['allowed_types'] = 'jpeg|jpg|png|pdf';
        $config['upload_path'] = 'assets/Uploads/';
        $config['file_name'] = $pos;
        $config['overwrite'] = TRUE;
        $this->load->library('upload',$config);
        if( $this->upload->do_upload('fileUpload')){

            print_r($this->upload->data());
        }
        else{
            echo $this->upload->display_errors();
        }

        $this->form_validation->set_rules('statusUpdate','status');

        $data = array(
            'req_status' =>$this->input->post('statusUpdate'),

            'files' => $pos.".pdf"
        );

        $this->load->model('cpurequ_model');
        $this->cpurequ_model->updateNew($data,$pos);


    }
    public function printing($data){
        
        $data_arr = explode("%20",$data);
        $status = $data_arr[1];
        
        $poid = $data_arr[0];
        
        if($status =='Submitted'){
            $this->load->model('cpurequ_model');
            $printingDetails = $this->cpurequ_model->printing($poid);
            $this->load->view('printable_view',['printingDetails'=>$printingDetails]);
        }
        else{
            $this->load->model('cpurequ_model');
            $printingFile = $this->cpurequ_model->getFile($poid);
            $this->load->view('short_print',['printingFile' => $printingFile]);   
        }
    }

}