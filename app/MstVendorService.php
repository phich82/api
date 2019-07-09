<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MstVendorService extends Model
{
    public $table = 'mst_vendor_service';
    public $primaryKey = ['vendor_id', 'service_category_id', 'service_seq'];
}
