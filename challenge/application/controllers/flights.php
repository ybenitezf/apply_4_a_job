<?php

class Flights extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('flight_model');
        $this->load->model('airframe_model');
    }
    
    public function index()
    {
        $data['title'] = "Flight control";
        $this->load->view("templates/header", $data);
        
        
        $data['data'] = $data; // lol ...
        // index will load the rest via ajax
        $this->load->view("flights/index", $data);
        $this->load->view("templates/footer");
    }
    
    public function data_list()
    {
        $data['items'] = $this->flight_model->get_data_list();
        $this->load->view("flights/list", $data);
    }
    
    public function create()
    {
        // always called from AJAX
        $this->load->helper('form');
        $this->load->library('form_validation');
        // validation is on client side but CI don't pass the following test
        // unless you put some rules
        $this->form_validation->set_rules('number', '', 'required');
        if ( $this->form_validation->run() ) {
            //add to database
            $this->flight_model->add_data();
            $this->data_list();
            return;
        }
        
        $data['frames'] = $this->airframe_model->get_data_list();
        $this->load->view('flights/create', $data);
    }
    
    public function delete($id = NULL)
    {
        $this->flight_model->delete( $id );
    }    
}

?>