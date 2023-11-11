<?php

namespace App\Http\Controllers;

use App\Http\Resources\ItemResource;
use App\Models\Item;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index() : JsonResponse
    {
        try {

            return response()->json([
                'ok' => true,
                'msg' => 'Items fetched successfully',
                'data' => ItemResource::collection(
                    Item::all()
                )
            ]);


        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return response()->json([
                'ok' => false,
                'msg' => 'An internal error occured. Please try again later',
            ]);
        }
    }



    public function store(Request $request): JsonResponse
    {
        $validator = Validator::make(
            $request->all(),
            [
                'description' => ['required', 'string', Rule::unique('items', 'item_description')],
                'unit_price' => ['required', 'numeric',],
                'total_quantity' => ['required', 'numeric'],
            ],
        );

        if ($validator->fails()) {
            return response()->json([
                'ok' => false,
                'msg' => 'Creating item failed',
                'error' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }


        try {

            Item::create(
                [
                    'item_description' => $request->description,
                    'unit_price' => $request->unit_price,
                    'total_quantity' => $request->total_quantity
                ]
            );

            return response()->json([
                'ok' => true,
                'msg' => 'New item created successfully'
            ]);
        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return response()->json([
                'ok' => false,
                'msg' => 'An internal error occured. Please try again later',
            ]);
        }
    }

    public function show($item_code) : JsonResponse {
        try {

            $item = Item::findOr($item_code, function () {
                
                return false;
            });

            if(!$item)
            {
                return response()->json([
                    'ok' => false,
                    'msg' => 'Item code is invalid'
                ]);
            }

            
            return response()->json([
                'ok' => true,
                'msg' => 'Item details fetched successfully',
                'data' => new ItemResource(
                      $item
                )
            ]);


        } catch (Exception $ex) {
            Log::error($ex->getMessage());

            return response()->json([
                'ok' => false,
                'msg' => 'An internal error occured. Please try again later',
            ]);
        }
    }
}
