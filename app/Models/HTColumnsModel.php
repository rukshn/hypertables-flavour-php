<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HTColumnsModel extends Model
{
    use HasFactory;
    protected $table = 'ht_columns';
    protected $primaryKey = 'id';
}
