<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Currency;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;



class currencyController extends Controller
{
    public function createCurrency(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'currency_symbol' => 'required',
            'exchange_rate' => 'required',
            'currency_code' => 'required',
            'base' => 'required',
        ]);


        if ($validator->fails()) {
            Log::warning('Failed validation in createCurrency', ['errors' => $validator->errors()]);
            return response()->json($validator->errors()->toJson(), 400);
        }

        Log::info('Last validation. Trying to create the currency...', ['data' => $request->only(['currency_symbol', 'exchange_rate', 'currency_code', 'base'])]);

        $currency = Currency::create([
            'currency_symbol' => $request->get('currency_symbol'),
            'exchange_rate' => $request->get('exchange_rate'),
            'currency_code' => $request->get('currency_code'),
            'base' => $request->get('base'),
        ]);

        if (!$currency) {
            Log::error('Failed to create currency', ['data' => $request->only(['currency_symbol', 'exchange_rate', 'currency_code', 'base'])]);
            return response()->json(['message' => 'Failed to create currency'], 500);
        }

        Log::info('Currency created successfully', ['data' => $currency]);

        return response()->json(
            [
                'message' => 'Currency created successfully',
                'data' => $currency
            ],
            201
        );
    }
}
