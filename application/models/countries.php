<?php

class countries extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_country_by_id($id) {
        if (is_numeric($id)) {
            return $this->db->where('id', $id)->get('countries')->row_array();
        }
    }

    function get_all_countries() {
        $query = $this->db->get('countries');
        return $query->result();
    }

}

?>
