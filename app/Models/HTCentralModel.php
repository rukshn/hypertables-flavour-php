<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTCentralModel extends Model
{
    use HasFactory;
    protected $table = 'ht_central';
    protected $primaryKey = 'id';
}
