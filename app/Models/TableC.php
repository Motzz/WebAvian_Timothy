<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableC extends Model
{
    use HasFactory;
    protected $table = 'table_c';
    protected $primaryKey = 'kode_toko';
}
