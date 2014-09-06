<?php

class AirFrame extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('airframe_model');
    }
    
    public function index()
    {
        $data['title'] = "Air frames control";
        $this->load->view("templates/header", $data);
        
        // do something .. query data, etc.
        
        $data['data'] = $data; // lol ...
        // index will load the rest via ajax
        $this->load->view("airframe/index", $data);
        $this->load->view("templates/footer");
    }
    
    public function create()
    {
        // always called from AJAX
        $this->load->helper('form');
        $this->load->library('form_validation');
        // validation is on client side but CI don't pass the following test
        // unless you put some rules
        $this->form_validation->set_rules('name', 'air frame name', 'required');
        if ( $this->form_validation->run() ) {
            //add to database
            $this->airframe_model->add_data();
            $this->data_list();
            return;
        }
        
        $this->load->view('airframe/create');
    }
    
    public function data_list()
    {
        $data['items'] = $this->airframe_model->get_data_list();
        $this->load->view("airframe/list", $data);
    }
    
    public function delete($id = NULL)
    {
        $this->airframe_model->delete( $id );
    }
}

?>