<?php

class Seat_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    
    public function get_by_id( $id )
    {
        $this->db->where("id", $id);
        $query = $this->db->get("seat");
        
        return $query->first_row();
    }        
    
    public function get_data_list( $af ) {
        $this->db->where('airframe', $af);
        $query = $this->db->get('seat');
        
        return $query->result();
    }
    
    public function get_seats_by_type( $type, $af )
    {
        $query = $this->db->query("
            SELECT * FROM seat WHERE airframe = $af AND type = $type;
        ");
        
        return $query->result();
    }
    
    function seat_enums($table , $field){   
        // https://github.com/thiswolf/codeigniter-enum-select-boxes
        $query = "SHOW COLUMNS FROM ".$table." LIKE '$field'";
        $row = $this->db->query("SHOW COLUMNS FROM ".$table." LIKE '$field'")->row()->Type;
        $regex = "/'(.*?)'/";
        preg_match_all( $regex , $row, $enum_array );
        $enum_fields = $enum_array[1];
        
        foreach ($enum_fields as $key=>$value)
        {
            $enums[$value] = $value;
        }
        return $enums;
    }
    
    public function add_data( $af )
    {
        $col = $this->input->post('col');
        $row = $this->input->post('row');
        $type = $this->input->post('type');
        $this->db->insert( 'seat', 
            array( 
                'col' => $col, 
                'row' => $row,
                'type' => $type,
                'airframe' => $af
            ) 
        );
    }
    
    public function delete( $id = NULL )
    {
        if( $id )
        {
            $this->db->delete('seat', array( 'id' => $id ));
        }
    }
}

?>