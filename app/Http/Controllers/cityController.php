<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class cityController extends Controller
{
    public function createCity(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_id' => 'required',
            'airport_code' => 'required',
        ]);

        if ($validator->fails()) {
            Log::warning('Failed validation in createCity', ['errors' => $validator->errors()]);
            return response()->json($validator->errors()->toJson(), 400);
        }

        Log::info('Last validation. Trying to create the city...', ['data' => $request->only(['name', 'country_id'])]);

        $city = City::create([
            'name' => $request->get('name'),
            'country_id' => $request->get('country_id'),
            'airport_code' => $request->get('airport_code'),
        ]);

        if (!$city) {
            Log::error('Failed to create city', ['data' => $request->only(['name', 'country_id'])]);
            return response()->json(['message' => 'Failed to create city'], 500);
        }

        Log::info('City created successfully', ['data' => $city]);

        return response()->json(
            [
                'message' => 'City created successfully',
                'data' => $city
            ],
            201
        );


    }


    public function getAllCities()
    {
        $cities = City::all();
        return response()->json($cities, 200);
    }


    public function getCityById($id)
    {
        $city = City::find($id);
        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }
        return response()->json($city, 200);
    }

    public function getCitiesByCountry($country_id)
    {
        $cities = City::where('country_id', $country_id)->get();
        return response()->json($cities, 200);
    }
}
