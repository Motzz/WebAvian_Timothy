<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableD extends Model
{
    use HasFactory;
    protected $table = 'table_d';
    protected $primaryKey = 'nama_sales';
}
