<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DKabKota extends Model
{
    protected $connection = 'mysql_daerah';
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kab';
}
