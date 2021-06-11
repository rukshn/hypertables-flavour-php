<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HypertablesCentralModel extends Model
{
    use HasFactory;
    protected $table = 'hypertablescentral';
    protected $primaryKey = 'id';
}
