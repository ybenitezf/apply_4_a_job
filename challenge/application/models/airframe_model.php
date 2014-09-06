<?php

class AirFrame_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_data_list()
    {
        $query = $this->db->get("airframe");
        
        return $query->result();
    }
    
    public function get_data( $id = NULL )
    {
        $this->db->where("id", $id);
        $query = $this->db->get("airframe");
        return $query->first_row();
    }
    
    public function add_data()
    {
        $name = $this->input->post('name');
        $this->db->insert( 'airframe', array( 'name' => $name, ) );
    }
    
    public function delete($id = NULL)
    {
        if( $id )
        {
            $this->db->delete('airframe', array( 'id' => $id ));
        }
    }
}

?>