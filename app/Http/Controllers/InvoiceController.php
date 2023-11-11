<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function index(): JsonResponse
    {

        return response()->json([
            'ok',
            'msg',
        ]);
    }


    public function store(Request $request)
    {


        if (request()->header('Content-Type') !== 'application/json') {

            return response()->json([
                'ok' => false,
                'msg'=> "Json request is expected. Header's content-type is application/json",

            ], Response::HTTP_BAD_REQUEST);
        }

        $validator  =  Validator::make(
            $request->all(),
            [
                'items' => ['array', 'required'],
                
            ],

        );

        if ($validator->fails()) {
            return $validator->errors();
        }

        
    }
}
