<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HypertablesController extends Controller
{
    // This is the HyperTables controller, which will handle all the requests and return outputs
    // for the HyperTables UI
    // You can easily incoporate HyperTables by including the Hypertables controller and Hypertable model to your existing Larvel project
    // See the GitHub for more information - https://github.com/rukshn/hypertables

    // getTables function will return data of exsisting tables in your Database
    // You can use this data to select the tables that will be used for your hypertable frontend to perform CURD actions
    public function getTables() {
        $tables = array_map('reset', \DB::select('SHOW TABLES'));
        echo json_encode($tables);
    }

    // getTableStructure function will send the structure of a given table to the HyperTable frontend
    // You can use the output of the function to select the columns that will be used for your HyperTables frontend
    public function getTableStructure(Request $request) {
        echo $request->table;
    }
}
