<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Makanan extends Model
{
    protected $table = 'table_makanan';
    protected $dates = ['tgl_kadaluarsa'];
}
