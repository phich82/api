<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstVendor extends Model
{
    public $table = 'mst_vendor';
    public $primaryKey = 'vendor_id';
    public $timestamps = false;

    public function country()
    {
        return $this->hasOne('App\MstVendorService');
    }
    public function servies()
    {
        return $this->hasMany('App\MstVendorService', 'vendor_id');
    }
}
