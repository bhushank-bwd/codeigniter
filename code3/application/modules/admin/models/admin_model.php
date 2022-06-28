<?php
class admin_model extends CI_Model
{
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

		$this->db->select('*');
		$this->db->from('emp');
		if(array_key_exists("where", $params)){
			foreach($params['where'] as $key => $val){
				$this->db->where($key, $val);
			}
		}
		if(array_key_exists("like", $params)){
			$search_keyword = $params['like'];
			$this->db->like('name',$search_keyword);
		}
		if(array_key_exists("deleted_at",$params)){
			$this->db->where('emp.deleted_at IS NULL', null, false);
		}
		if(array_key_exists("status",$params)){
			$this->db->where('emp.status', 1);
		}
		if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
			$result = $this->db->count_all_results();

		}else{
			if(array_key_exists("emp.id", $params) || (array_key_exists("returnType", $params) && $params['returnType'] == 'single')){
				if(!empty($params['emp.id'])){
					$this->db->where('emp.id', $params['emp.id']);
				}
				$query = $this->db->get();
				$result = $query->row_array();
			}else{

				$this->db->order_by('emp.id', 'desc');
				if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->db->limit($params['limit'],$params['start']);
				}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->db->limit($params['limit']);
				}

				$query = $this->db->get();
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;

			}
		}

		return $result;
	}
	function getEmpCount(){

		$conditions['returnType'] = 'count';
		return $count = $this->getEmpRows($conditions);
	}
}

?>