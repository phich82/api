<?php

namespace App\Services;

use App\MstVendorService;

class MstVendorServiceService
{
    private $mstVendorService;

    public function __construct(MstVendorService $mstVendorService)
    {
        $this->mstVendorService = $mstVendorService;
    }

    public function totalServices()
    {
        return $this->mstVendorService->all()->count();
    }
}
