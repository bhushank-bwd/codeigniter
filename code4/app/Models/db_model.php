<?php
namespace App\Models;
use CodeIgniter\Model;

class db_model extends Model{

	public function __construct()
	{
	    parent::__construct();
	    $this->db = \Config\Database::connect();
	}
	public function get_data($table,$params,$select = "*",$return = "array")
	{
		

		$this->builder = $this->db->table($table)->select($select);

		if(isset($params['where']) && is_array($params['where']))
		{
			$this->builder->where($params['where']);
		}	 

		if(isset($params['orderby']) && is_array($params['orderby'])){
			$this->builder->orderBy($params['orderby']['order_column'], $params['orderby']['order']);
		}

		if(isset($params['limit']) && is_array($params['limit'])){
			$this->builder->limit($params['limit']['limit'], $params['limit']['start']);
		}
		if(isset($params['groupby']) && is_array($params['groupby'])){
			$this->builder->groupBy($params['groupby']);
		}


		if($return == 'array')
		{
			$res['res'] = $this->builder->get()->getResultArray();
			$res['sql'] = (string)$this->db->getLastQuery();
			// return $res['res'];
			return $res;
		}
		else if($return == 'row')
		{
			$res['res'] = $this->builder->get()->getRow();
			$res['sql'] = (string)$this->db->getLastQuery();
			// return $this->builder->get()->getRow();
			return $res;
		}
		else 
		{
			$res['res'] = $this->builder->get()->getNumRows();
			$res['sql'] = (string)$this->db->getLastQuery();
			// return $this->builder->get()->getNumRows();
			return $res;
		}
	}
	public function get_data_by_query($sql,$return = "array")
	{
		$res = $this->db->query($sql);

		if($return == 'array')
		{
			return $res->getResultArray();
		}
		else if($return == 'row')
		{
			return $res->getRow();
		}
		else 
		{
			return $res->getNumRows();
		}	
	}
	public function deleteData($where,$table)
	{
		$this->builder = $this->db->table($table);
		$this->builder->where($where);
		return $this->builder->delete(); 
	}
	public function updateData($table,$set, $where){

		$this->builder = $this->db->table($table);
		$this->builder->set($set);
		$this->builder->where($where);
		$return = $this->builder->update();
		return $return;
	}
	public function insertData($data,$table){
		$this->builder = $this->db->table($table);

		$this->builder->insert($data);
		return  $this->db->insertID();
	}

}


?>