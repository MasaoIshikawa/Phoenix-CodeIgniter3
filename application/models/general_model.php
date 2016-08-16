<?php
	class General_model extends CI_Model{
		
		function __construct(){
			parent::__construct();
		}
		
		/**
		 * Purpose : Function to get records from database
		 * Input : @param table_name and conditions
		 * Return : return_type array
		 * Created on : 22-Feb-2013
		 */
		function get_record($table_name = '',$number = 'result',$where = '',$sort = '')
		{
			if($sort)
			{
				$this->db->order_by($sort);
			}
			$qry = $this->db->get_where($table_name, $where);
			
			if ($qry->num_rows())
			{
				if ($number == 'result')
				{
					return $qry->result_array();
				}
				else
				{
					return $qry->row_array();
				}
			}
			else
			{
				return false;
			}
		}
		/**
		 * Purpose : Function to get records from database
		 * Input : @param table_name and conditions
		 * Return : return_type array
		 * Created on : 22-Feb-2013
		 */
		function count_record($table_name = '',$number = 'result',$where = '',$sort = '')
		{
			if($sort)
			{
				$this->db->order_by($sort);
			}
			$qry = $this->db->get_where($table_name, $where);
			
			if ($qry->num_rows())
			{
				return $qry->num_rows();
			}
			else
			{
				return "0";
			}
		}
		
		/**
		 * Purpose : Function to delete records from database
		 * Input : @param table_name and condition
		 * Return : return_type TRUE and FALSE
		 * Created on : 22-Feb-2013
		 */
		function delete_record($table_name = '',$where = '')
		{
			if ($this->db->delete($table_name,$where))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		
		/**
		 * Purpose : function to insert or update records in database
		 * param string $table_name, $fields and $where condition
		 * return TRUE and FALSE
		 * Created on : 22-Feb-2013
		 */
		function update_records($table_name = '',$fields = array(), $where = array())
		{
			
			if(!empty($where))
			{
				if ($this->db->update($table_name, $fields,$where))
				{
					return true;
				}
				else
				{
					return false;
				}
			}
			else
			{
				if ($this->db->insert($table_name, $fields))
				{
					return $this->db->insert_id();
				}
				else
				{
					return false;
				}
			}
		}
		
		function get_country($id = "")
		{
			$query = $this->db->get('countries');
			$out= "";
			$select = "";
			foreach ($query->result() as $row)
			{
			  	if($id != "")
				{
					if($id == $row->country_2_code)
					{
						$select = "selected";
					}
					else
					{
						$select = "";
					}
				}
			  	$out.= "<option value='".$row->country_2_code."' ".$select." >".$row->country_name."</option>";
			}
			  
			return $out;
			
		}
	}	
