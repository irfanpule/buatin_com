<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DProvinsi extends Model
{
    protected $connection = 'mysql_daerah';
    protected $table = 'provinsi';
    protected $primaryKey = 'id_prov';


}
