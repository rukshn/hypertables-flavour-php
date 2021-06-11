<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HypertablecolumnsModel extends Model
{
    use HasFactory;
    protected $table = 'hypertablecentral';
    protected $primaryKey = 'id';
}
