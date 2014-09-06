<?php

class Flight_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_data_list()
    {
        $query = $this->db->get("flight");
        
        return $query->result();
    }
    
    public function get_by_id( $id )
    {
        $this->db->where("number", $id);
        $query = $this->db->get("flight");
        
        return $query->first_row();
    }    
    
    public function add_data()
    {
        $number = $this->input->post('number');
        $oairport = $this->input->post('oairport');
        $departure = $this->input->post('departure');
        $dairport = $this->input->post('dairport');
        $arrival = $this->input->post('arrival');
        $airframe = $this->input->post('airframe');
        $this->db->insert( 'flight', array( 
            'number' => $number,
            'oairport' => $oairport,
            'departure' => $departure,
            'dairport' => $dairport,
            'arrival' => $arrival,
            'airframe' => $airframe,
        ));
    }
    
    public function delete($id = NULL)
    {
        if( $id )
        {
            $this->db->delete('flight', array( 'number' => $id ));
        }
    }    
}

?>