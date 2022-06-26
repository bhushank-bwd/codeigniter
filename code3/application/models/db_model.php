<?php

class db_model extends CI_Model
{
	public function get_data($table,$params,$select = "*",$return = "array"){
		$this->db->select($select);
		$this->db->from($table);

		if(isset($params['where']) && is_array($params['where'])){
			$this->db->where($params['where']);
		}
		if(isset($params['orderby']) && is_array($params['orderby'])){
			$this->db->order_by($params['orderby']['order_column'], $params['orderby']['order']);
		}
		if(isset($params['limit']) && is_array($params['limit'])){
			$this->db->limit($params['limit']['limit'], $params['limit']['start']);
		}
		if(isset($params['groupby']) && is_array($params['groupby'])){
			$this->db->group_by($params['groupby']);
		}

		$query = $this->db->get();

		if($return == 'array'){
			return $query->result_array();;
		}else if($return == 'row'){
			return $query->row();
		}else{
			return $query->num_rows();
		}

	}
	public function get_data_by_query($sql,$return = "array"){
		$query = $this->db->query($sql);
		if($return == 'array'){
			return $query->result_array();;
		}else if($return == 'row'){
			return $query->row();
		}else{
			return $query->num_rows();
		}
	}
	public function insert_data($table,$data)
	{
		$query = $this->db->insert($table,$data);

		return $this->db->insert_id();
	}
	public function delete_data($where, $table)
	{

		$query = $this->db->where($where)
		->delete($table); 
		if($query === false)
			return false;
		else true;
	}
	public function update($set, $where, $table)
	{
		$query = $this->db->set($set)
		->where($where)
		->update($table); 
		return $this->db->affected_rows();
	}
}

?>
