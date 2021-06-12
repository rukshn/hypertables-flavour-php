<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\HTColumnsModel;
use App\Models\HTCentralModel;

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
        return json_encode($tables);
    }

    // getTableStructure function will send the structure of a given table to the HyperTable frontend
    // You can use the output of the function to select the columns that will be used for your HyperTables frontend
    public function getTableStructure(Request $request) {
        $table = $request->table;
        return json_encode(DB::select("describe $table"));
    }

    // createHyperTable will create a new HyperTable and map it to an existing table in your database
    // The requires parameters are the name of the new hypertable that you're creating and the name of the exisiting table of your database
    public function createHyperTable(Request $request){
        $table_name = $request->table_name;
        $hyper_table_name = $request->hyper_table_name;
        $hyper_table_description = $request->hyper_table_description;

        // check if the table is already mapped
        $get_table = HTCentralModel::select('id')->where('table_name', $table_name)->get();
        if (isset($get_table[0])) {
            $output = array('status' => 500, 'message' => 'table already mapped');
            return json_encode($output);
        } else {
            $rules = [
                'table_name' => 'required|string|min:1|max:255',
                'hyper_table_name' => 'required|string|min:1|max:255',
                'hyper_table_description' => 'string'
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                $output = array('status' => 500, 'message' => 'validation failure, please refer documentation');
                return json_encode($output);
            } else {
                $new_hyper_table = new HTCentralModel;
                $new_hyper_table->table_name = $table_name;
                $new_hyper_table->hyper_table_description = $hyper_table_description;
                $new_hyper_table->hyper_table_name = $hyper_table_name;

                $new_hyper_table->save();
                $output = array('status' => 200, 'insert_id' => $new_hyper_table->id);
                return json_encode($output);
            }
        }
    }

    // createHyperColumn will create a new HyperTable column on the hypertable table and map it to a column on the database
    public function createHyperColumn(Request $request) {
        $table_name = $request->table_name;
        $table_column_name = $request->table_column;
        $hyper_column_name = $request->hyper_column_name;
        $hyper_column_type = $request->hyper_column_type;
        $hyper_column_icon = $request->hyper_column_icon;

        $get_table = HTCentralModel::select('id')->where('table_name', $table_name)->get();

        if (!isset($get_table[0])) {
            $output = array('status' => 500, 'message' => 'table does not exsist, please create a new table or map an existing table, please refer documentaion');
            return json_encode($output);
        }
        $table_id = $get_table[0]->id;
        $get_hyper_column = HTColumnsModel::select('table_column_name')->where('table_id', $table_id)->get();

        if (!isset($get_hyper_column->table_column_name)) {
            $rules = [
                'table_name' => 'required|string|min:1|max:255',
                'table_column' => 'required|string|min:1|max:255',
                'hyper_column_name' => 'required|string|min:1|max:255',
                'hyper_column_type' => 'required|string|min:1|max:255',
                'hyper_column_icon' => 'string'
            ];

            $validator = Validator::make($request->all(),$rules);

            if ($validator->fails()) {
                $output = array('status' => 500, 'message' => 'input validation failed, please refer documentation');
                return json_encode($output);
            } else {
                $new_hyper_column = new HTColumnsModel;
                $new_hyper_column->table_id = $table_id;
                $new_hyper_column->hyper_column_name = $hyper_column_name;
                $new_hyper_column->hyper_column_type = $hyper_column_type;
                $new_hyper_column->hyper_column_icon = $hyper_column_icon;
                $new_hyper_column->table_column_name = $table_column_name;

                $new_hyper_column->save();
                $output = array('status' => 200, 'isert_id' => $new_hyper_column->id);
                return json_encode($output);
            }

        } else {
            $output = array('status' => 500, 'message' => 'column exsists');
            return json_encode($output);
        }
    }

    //getHyperTable this function will return the table structure of a requested HyperTable
    public function getHyperTable(Request $request) {
        $table_name = $request->table_name;

        $get_table = HTCentralModel::select('id')->where('table_name', $table_name)->get();
        if (!isset($get_table[0])) {
            $output = array('status' => 500, 'message' => 'table does not exist');
            return json_encode($output);
        } else {
            $table_id = $get_table[0]->id;
            $get_columns = HTColumnsModel::select('id', 'hyper_column_name', 'hyper_column_icon', 'hyper_column_type')->where('table_id', $table_id)->get();
            return json_encode($get_columns);
        }

    }

    // getTableData function will return data from the table, it will use paginate option in laravel db package and use page query string to paginate
    // https://laravel.com/docs/8.x/pagination#paginating-query-builder-results
    public function getTableData(Request $request) {
        $table_name = $request->table_name;
        $limit = $request->limit;
        return DB::table($table_name)->paginate($limit);
    }
}
