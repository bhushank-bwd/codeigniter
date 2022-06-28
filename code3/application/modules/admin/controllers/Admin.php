<?php
class Admin extends MX_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model("admin_model");
    }

    public  function dataTable()
    {
        $this->load->view("data-table");
    }
    public function getDataTableData(){
        $start = $this->input->get('start');
        $limit = $this->input->get('length');
        $search = $this->input->get('search');
        $condition = array();
        if(isset($search['value']) && $search['value'] != '')
        {
            $condition['like'] = $search['value']; 
        }    
        $param = array('start'=>$start,'limit'=>$limit);
        $emp_data = $this->admin_model->getEmpList($param,$condition);
        if(isset($search['value']) && $search['value'] != '' )
        {

            if(!empty($emp_data)){
                $recordsFiltered = count($emp_data);
            }else{
                $recordsFiltered = 0;

            }
        }    
        else
        {
            $recordsFiltered = $this->admin_model->getEmpCount();
        }

        $result = array();
        $i=1;
        if(!empty($emp_data)){

            foreach ($emp_data as $row) { 

                $row['srno'] = $i++;
                $result[] = $row;

            }
        }
        $response['data']= $result;
        $response['recordsFiltered']= $recordsFiltered;
        $response['recordsTotal']= $this->admin_model->getEmpCount();
        $response['draw']= $this->input->get('draw');
        echo json_encode($response);
    }
}

?>