<?php

class Passenger_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_passengers()
    {
        $query = $this->db->query(
            "SELECT * FROM passenger"
        );
        return $query->result();
    }
    
    public function get_itinerary( $id )
    {
        $query = $this->db->query(
            "SELECT flight, passenger, seat FROM res WHERE passenger = $id ORDER BY flight;"
        );
        return $query->result();
    }
  
    public function get_by_id( $id )
    {
        $this->db->where("id", $id);
        $query = $this->db->get("passenger");
        
        return $query->first_row();
    }
    
    public function is_busisness( $id )
    {
        $this->db->where("passenger_id", $id);
        $query = $this->db->get("businesspassenger");
        if( $query->first_row() )
        {
            return TRUE;
        }
        
        return FALSE;
    }
    
    public function get_busisness_passengers()
    {
        $query = $this->db->query(
            "SELECT * FROM passenger, businesspassenger WHERE \n
             passenger.id = businesspassenger.passenger_id;
            "
        );
        return $query->result();
    }    
    
    public function add_passenger()
    {
        $name = $this->input->post('name');
        $data1 = array(
            'name' => $name,
        );
        $this->db->insert('passenger', $data1);
        
        if( $this->input->post('isBusinessClass') )
        {
            // add a business passenger record to
            $name = $this->input->post('name');
            $query = $this->db->query("SELECT * FROM passenger WHERE name='$name'");
            $psg = $query->row_array();

            $data2 = array(
                'passenger_id' => $psg['id'],
                'flight_miles' => $this->input->post('flight_miles'),
            );
            $this->db->insert('businesspassenger', $data2);
        }
    }
    
    public function delete($id = NULL)
    {
        if( $id )
        {
            $query = $this->db->query("SELECT * FROM passenger WHERE id=$id");
            $psg = $query->first_row();
            if ($psg)
            {
                 $this->db->delete('passenger', array('id' => $id)); 
            }
        }
    }
}

?>