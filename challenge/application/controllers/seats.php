<?php

class Seats extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('seat_model');
        $this->load->model('airframe_model');
        $this->load->model('flight_model');
        $this->load->model('passenger_model');
        $this->load->helper('url');
    }
    
    public function index()
    {
        $af = $this->input->get('af');
        if( !$af )
        {
            show_404();
        }else{
            $data['title'] = "Seats control";
            $data['airframe'] = $this->airframe_model->get_data( $af );
            $this->load->view("templates/header", $data);
            
            $data['data'] = $data;
            $this->load->view("seats/index", $data);
            $this->load->view("templates/footer");
        }
    }
    
    public function create()
    {
        // ajax called
        $af = $this->input->get('af');
        $data['airframe'] = $this->airframe_model->get_data( $af );
        $this->load->helper('form');
        $this->load->library('form_validation');
        
        $data['tty'] = $this->seat_model->seat_enums('seat', 'type');
        $this->form_validation->set_rules('col', 'col', 'required');
        if ( $this->form_validation->run() ) {
            $this->seat_model->add_data($af);
            $this->data_list();
            return;
        }
        $this->load->view('seats/create', $data);
    }
    
    public function data_list()
    {
        // ajax called
        $af = $this->input->get('af');
        $data['airframe'] = $this->airframe_model->get_data( $af );
        $data['items'] = $this->seat_model->get_data_list( $af );
        
        $this->load->view("seats/list", $data);
    }
    
    public function data_list_ajax( )
    {
        // send seats list for reservation form
        $pid = $this->input->get('pid'); //passenger
        $flight =  $this->flight_model->get_by_id( $this->input->get('flight') );
        if( $this->passenger_model->is_busisness($pid) ) {
            // get only busisness seats
            $data["seats"] = $this->seat_model->get_seats_by_type(1, $flight->airframe);
        } else {
            $data["seats"] = $this->seat_model->get_seats_by_type(2, $flight->airframe);
        }
        
        $this->load->view("seats/list-ajax", $data);
    }
    
    public function delete($id = NULL)
    {
        $this->seat_model->delete( $id );
    }
}

?>