<?php

namespace App\Http\Controllers\v1;

use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Services\FlightService;
use App\Services\MstVendorService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Services\MstVendorServiceService;
use App\MstVendor;

class FlightController extends Controller
{
    use ApiResponse;

    private $flightService;

    public function __construct(FlightService $flightService)
    {
        $this->flightService = $flightService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return $this->responseSuccess(
            $this->flightService->getFlights($request->input())
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $params = request()->input();
        $params['flight_number'] = $id;
        return $this->responseSuccess(
            $this->flightService->getFlights($params)
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getFileLang(FileService $fileService)
    {
        $contentLang = $fileService->getFileLang();
        if ($contentLang === null) {
            return $this->responseError(lang('file.not_found'), 404);
        }
        return $this->responseSuccess($contentLang);
    }

    public function getVendorServices()
    {
        dd(MstVendor::all()->country);
        $categories = DB::select(
            DB::raw('
                select distinct on(s.service_category_id, s.service_category_name_en)
                   s.service_category_id,
                   s.service_category_name_en,
                   s.service_category_name_jp,
                   (
                        select array_to_json(array_agg(row_to_json(service)))
                        from (
                            select service_id, service_name_en, service_name_jp, display_order from sys_service sub where sub.service_category_id = s.service_category_id order by sub.service_name_en
                        ) service
                    ) as services
                from sys_service s
                order by s.service_category_id
            ')
        );

        $out = [];
        $lang = request()->header('lang') ?? 'en';
        foreach ($categories as $category) {
            $out[] = [
                'category_id'   => $category->service_category_id,
                'category_name' => $category->{'service_category_name_'.$lang},
                'services'      => array_reduce(json_decode($category->services, true), function ($carry, $service) use ($lang) {
                    $carry[] = [
                        'service_id'   => $service['service_id'],
                        'service_name' => $service['service_name_'.$lang]
                    ];
                    return $carry;
                })
            ];
        }
        return $this->responseSuccess($out);
    }

    public function getVendorInfo(MstVendorService $mstVendorService, MstVendorServiceService $mstVendorServiceService)
    {
        return $this->responseSuccess([
            'total_vendors'  => $mstVendorService->totalVendors(),
            'total_services' => $mstVendorServiceService->totalServices()
        ]);
    }

    public function search()
    {
        //
    }
}
