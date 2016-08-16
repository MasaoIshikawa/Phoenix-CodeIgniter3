<?php

class states extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_state_by_id($id) {
        if (is_numeric($id)) {
            return $this->db->where('id', $id)->get('states')->row_array();
        }
    }
    function get_states_for_country($id) {
        if (is_numeric($id)) {
            return $this->db->where('country_id', $id)->get('states')->result();
        }
    }

    function get_all_states() {
        $query = $this->db->get('states');
        return $query->result();
    }

}

?>
