<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hypertables extends Model
{
    //The HyperTable model, this is required to work with the mandetory Hypertables table created on your database
    //This table will keep everything in sync between your Hypertable UI and the Hpyertable backend
    //You can easily incoporate HyperTable PHP with your existing Larvel project by copying Hypertables model and Hypertable controller to your project directories
    //See the GitHub repo for more information https://github.com/rukshn/hypertables
    use HasFactory;
    protected $table = 'hypertables';
    protected $primaryKey = 'id';
}
