<?php
namespace Modules\Admin\Models;
use CodeIgniter\Model;

class admin_model extends Model{
	public function __construct()
	{
		parent::__construct();
		$this->db = \Config\Database::connect();
	}
	function getEmpList($params=array(),$condition=array()){

		if(!empty($condition['where']))
		{
			$params['where'] = $condition['where'];
		}
		if(!empty($condition['like']))
		{
			$params['like'] = $condition['like'];
		}

		$adsList = $this->getEmpRows($params);
		return $adsList;
	}
	function getEmpRows($params = array()){

		$this->builder = $this->db->table("emp")->select("*");
		if(array_key_exists("where", $params)){
			foreach($params['where'] as $key => $val){
				$this->builder->where($key,$val);
			}
		}
		if(array_key_exists("like", $params)){
			$search_keyword = $params['like'];
			$this->builder->like('name',$search_keyword);
		}
		if(array_key_exists("deleted_at",$params)){
			$this->builder->where('emp.deleted_at IS NULL', null, false);
		}
		if(array_key_exists("status",$params)){
			$this->builder->where('emp.status', 1);
		}
		if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
			$result = $this->builder->get()->getNumRows();

		}else{
			if(array_key_exists("emp.id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
				if(!empty($params['emp.id'])){
					$this->db->where('emp.id', $params['emp.id']);
				}
				$result = $this->builder->get()->getRow();
			}else{

				$this->builder->orderBy('emp.id', 'desc');
				if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->builder->limit($params['limit'],$params['start']);
				}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->db->limit($params['limit']);
				}

				$result = ($this->builder->get()->getNumRows() > 0)?$this->builder->get()->getResultArray():FALSE;

			}
		}
		// echo (string)$this->db->getLastQuery();die;
		return $result;
	}
	function getEmpCount(){

		$conditions['returnType'] = 'count';
		return $count = $this->getEmpRows($conditions);
	}
}


?>