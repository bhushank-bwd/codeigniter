<?php

namespace Modules\Welcome\Controllers;

use App\Controllers\BaseController;

class Welcome extends BaseController
{
    public function index()
    {
        echo BASE." code 4 HMVC";

        //return view('welcome_message');
        //$db_model = new db_model();
        //$res = $db_model->deleteData($where,"emp");
    }
}
