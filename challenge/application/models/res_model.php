<?php

class Res_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_data_list()
    {
        $query = $this->db->get("res");
        
        return $query->result();
    }
    
    public function add_data()
    {
        $flight = $this->input->post('flight');
        $passenger = $this->input->post('passenger');
        $seat = $this->input->post('seat');
        
        $this->db->insert( 'res', array(
            'flight' => $flight,
            'seat' => $seat,
            'passenger' => $passenger
        ));
    }
    
    public function delete($id = NULL)
    {
        if( $id )
        {
            $this->db->delete('res', array( 'id' => $id ));
        }
    } 
}

?>