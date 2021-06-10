<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Hypertables extends Controller
{
    // This is the HyperTables controller, which will handle all the requests and return outputs
    // for the HyperTables UI
    // You can easily incoporate HyperTables by including the Hypertables controller and Hypertable model to your existing Larvel project
    // See the GitHub for more information - https://github.com/rukshn/hypertables

    // getTables function will return data of exsisting tables in your Database
    // You can use this data to select the tables that will be used for your hypertable frontend to perform CURD actions
    public function getTables() {

    }
}
