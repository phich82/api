<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Services\FlightService;
use App\Http\Controllers\Controller;
use App\Services\FileService;
use App\Traits\ApiResponse;

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
        return response()->json($this->flightService->getFlights($request->input()));
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
        return response()->json($this->flightService->getFlights($params));
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
            return $this->responseError('Could not get the file or not found.', 404);
        }
        return $this->responseSuccess($contentLang);
    }
}
