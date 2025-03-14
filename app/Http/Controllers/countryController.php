<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class countryController extends Controller
{
    public function createCountry(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'country_code' => 'required',
            'currency_id' => 'required',
        ]);

        if ($validator->fails()) {
            Log::warning('Failed validation in createCountry', ['errors' => $validator->errors()]);
            return response()->json($validator->errors()->toJson(), 400);
        }

        Log::info('Last validation. Trying to create the country...', ['data' => $request->only(['name', 'country_code', 'currency_id'])]);

        $country = Country::create([
            'name' => $request->get('name'),
            'country_code' => $request->get('country_code'),
            'currency_id' => $request->get('currency_id'),
        ]);

        if (!$country) {
            Log::error('Failed to create country', ['data' => $request->only(['name', 'country_code', 'currency_id'])]);
            return response()->json(['message' => 'Failed to create country'], 500);
        }

        Log::info('Country created successfully', ['data' => $country]);

        return response()->json(
            [
                'message' => 'Country created successfully',
                'data' => $country
            ], 201);
    }




    public function getAllCountries()
    {
        $countries = Country::all();
        return response()->json($countries, 200);
    }
}
