<?php

namespace App\Services;

use App\Flight;

class FlightService
{
    protected $includesSupported = [ //key: relation of models, value: queryParams
        'arrivalAirport'   => 'arrival',
        'departureAirport' => 'departure'
    ];

    protected $clauseParams = [
        'status', 'flight_number'
    ];

    public function getFlights($params = [])
    {
        if (empty($params)) {
            return $this->filter(Flight::all());
        }
        $keysRelation = $this->getRelationKeys($params);
        $whereClauses = $this->getWhereClause($params);
        return $this->filter(
            Flight::with($keysRelation)->where($whereClauses)->get(),
            $keysRelation
        );
    }

    public function getFlight($flight_number)
    {
        return $this->filter(Flight::where('flight_number', $flight_number)->get());
    }

    protected function filter($flights, $keys = [])
    {
        $data = [];
        foreach ($flights as $flight) {
            $entry = [
                'flight_number' => $flight->flight_number,
                'status' => $flight->status,
                'url' => route('flights.show', ['id' => $flight->flight_number])
            ];
            if (in_array('arrivalAirport', $keys)) {
                $entry['arrival'] = [
                    'datetime' => $flight->arrival_datetime,
                    'itata_code' => $flight->arrivalAirport->iata_code,
                    'city' => $flight->arrivalAirport->city,
                    'state' => $flight->arrivalAirport->state
                ];
            }
            if (in_array('departureAirport', $keys)) {
                $entry['departure'] = [
                    'datetime' => $flight->departure_datetime,
                    'itata_code' => $flight->departureAirport->iata_code,
                    'city' => $flight->departureAirport->city,
                    'state' => $flight->departureAirport->state
                ];
            }
            $data[] = $entry;
        }
        return $data;
    }

    protected function getRelationKeys($params = [])
    {
        $keysRelation = [];
        if (isset($params['include'])) {
            $includesParams = explode(',', $params['include']);
            $includes = array_intersect($this->includesSupported, $includesParams);
            $keysRelation = array_keys($includes);
        }
        return $keysRelation;
    }

    protected function getWhereClause($params = [])
    {
        $clause = [];

        foreach ($this->clauseParams as $key) {
            if (in_array($key, array_keys($params))) {
                $clause[$key] = $params[$key];
            }
        }
        return $clause;
    }
}
