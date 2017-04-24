<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DKabKota extends Model
{
    protected $connection = 'mysql_daerah';
    protected $table = 'kabupaten';
    protected $primaryKey = 'id_kab';

    // relation to Provinsi
    public function provinsi()
    {
        return $this->belongsTo('App\DProvinsi', 'id_prov');
    }

    // relation to Umeta
    public function umeta()
    {
        return $this->belongsTo('App\Umeta', 'meta_value');
    }
}
