<?php

namespace Modules\Admin\Controllers;
use Modules\Admin\Models\admin_model; 
use App\Controllers\BaseController;

class Admin extends BaseController
{
    public function index()
    {
        echo BASE." code 4 HMVC";

        //return view('welcome_message');
        //$db_model = new db_model();
        //$res = $db_model->deleteData($where,"emp");
    }
    public function dataTable(){
         return view("Modules\Admin\Views\data-table");
    }
    public function getDataTableData(){

        $admin_model = new admin_model();
        $start = $_GET['start'];
        $limit = $_GET['length'];
        $search = $_GET['search'];
        $condition = array();
        if(isset($search['value']) && $search['value'] != '')
        {
            $condition['like'] = $search['value']; 
        }    
        $param = array('start'=>$start,'limit'=>$limit);
        $emp_data = $admin_model->getEmpList($param,$condition);
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
            $recordsFiltered = $admin_model->getEmpCount();
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
        $response['recordsTotal']= $admin_model->getEmpCount();
        $response['draw']= $_GET['draw'];
        echo json_encode($response);
    }
}
