<?php

class Passenger extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('passenger_model');
        $this->load->model('res_model');
        $this->load->model('seat_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = "Passenger Register";
        $this->load->view('templates/header', $data);
       
        $data['passengers'] = $this->passenger_model->get_passengers();
        $data['busisness_passengers'] = $this->passenger_model->get_busisness_passengers();
        $this->load->helper('form');
        $this->load->view('passenger/create');
        
        $data['data'] = $data;
        $this->load->view('passenger/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function delete($id = NULL)
    {
        $this->passenger_model->delete($id);
    }
    
    public function itinerary( $pid )
    {
        $data['title'] = "Passenger Itinerary";
        $this->load->view('templates/header', $data);
        
        $data['itinerary'] = $this->passenger_model->get_itinerary( $pid );
        $data['passenger'] = $this->passenger_model->get_by_id( $pid );
                
        $data['data'] = $data;
        $this->load->view('passenger/itinerary', $data);
        $this->load->view('templates/footer');        
    }
    
    public function createAJAX() 
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'passenger name', 'required');
        if( $this->form_validation->run() )
        {
            $this->passenger_model->add_passenger();
        }
        $data['passengers'] = $this->passenger_model->get_passengers();
        $data['busisness_passengers'] = $this->passenger_model->get_busisness_passengers();  
        $this->load->view('passenger/indexAJAX', $data);      
    }

}

?>