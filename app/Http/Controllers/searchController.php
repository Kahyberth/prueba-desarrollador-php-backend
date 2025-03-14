<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Search;
use Illuminate\Support\Facades\Validator;


class searchController extends Controller
{


    public function createSearch(Request $request) {


        $validator = Validator::make($request->all(), [
            'budget' => 'required',
            'city' => 'required',
            'currency' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $search = new Search();
        $search->budget = $request->budget;
        $search->city = $request->city;
        $search->currency = $request->currency;
        $search->city_id = $request->city_id;
        $search->save();

        return response()->json(['success' => 'Search created successfully'], 200);

    }


}
