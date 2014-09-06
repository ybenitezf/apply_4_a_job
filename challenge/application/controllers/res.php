<?php

class Res extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('flight_model');
        $this->load->model('passenger_model');
        $this->load->model('seat_model');
        $this->load->model('res_model');
        
        $this->load->helper('url');
    }
    
    public function index()
    {
        $data['title'] = "Reservations control";
        $this->load->view("templates/header", $data);
        
        
        $data['data'] = $data; // lol ...
        // index will load the rest via ajax
        $this->load->view("res/index", $data);
        $this->load->view("templates/footer");
    }
    
    public function data_list()
    {
        $data['items'] = $this->res_model->get_data_list();
        $this->load->view("res/list", $data);
    }
    
    public function create()
    {
        // always called from AJAX
        $this->load->helper('form');
        $this->load->library('form_validation');
        // validation is on client side but CI don't pass the following test
        // unless you put some rules
        $this->form_validation->set_rules('flight', '', 'required');
        if ( $this->form_validation->run() ) {
            //add to database
            $this->res_model->add_data();
            $this->data_list();
            return;
        }
        
        $data['flights'] = $this->flight_model->get_data_list();
        $data['psg_list'] = $this->passenger_model->get_passengers();
        // the flight + passenger type give the type of seats
        //$data['seats'] = $this->seat_model->get_data_list();
        $this->load->view('res/create', $data);
    }
    
    public function delete($id = NULL)
    {
        $this->flight_model->delete( $id );
    }    
}

?>