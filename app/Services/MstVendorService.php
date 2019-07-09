<?php

namespace App\Services;

use App\MstVendor;

class MstVendorService
{
    private $mstVendor;

    public function __construct(MstVendor $mstVendor)
    {
        $this->mstVendor = $mstVendor;
    }

    public function search($params = [])
    {
        $countries = is_array($params['country']) ? $params['country'] ? explode(',', $params['country']);
        $services  = is_array($params['service']) ? $params['service'] ? explode(',', $params['service']);
        $locale = 'en';
        $colVendorName = 'vendor_name_'.$locale;
        $keys = [];
        $this->mstVendor->newQuery()
                ->with($keys)
                ->join('mst_vendor_service','mst_vendor_service.vendor_id', '=', 'mst_vendor.vendor_id')
                ->join('sys_service', 'mst_vendor_service.service_category_id', '=', 'sys_service.service_category_id')
                ->when($services, function ($query, $services) {
                    return $query->whereIn('sys_service.service_id', $services);
                })
                ->when($countries, function ($query, $countries) {
                    return $query->whereIn('country_id', $countries);
                })
                ->where($colVendorName, 'like', "%{$params['name']}%")
                ->get();
    }
}
