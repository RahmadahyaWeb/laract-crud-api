<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Logbook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LogbookController extends Controller
{
    public function index()
    {
        $logbooks = Logbook::all();
        if ($logbooks->count() > 0) {
            return response()->json([
                'status' => 200,
                'data' => $logbooks
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'NO RECORDS FOUND'
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $logbooks = Logbook::create($request->all());
            if ($logbooks) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Logbook Created Successfully!'
                ]);
            }
        }
    }

    public function show(Logbook $logbook)
    {
        if ($logbook) {
            return response()->json([
                'status' => 200,
                'data' => $logbook
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'NO RECORD FOUND'
            ], 404);
        }
    }

    public function edit(Logbook $logbook)
    {
        if ($logbook) {
            return response()->json([
                'status' => 200,
                'data' => $logbook
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'data' => 'NO RECORD FOUND'
            ], 404);
        }
    }

    public function update(Request $request, Logbook $logbook)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 422,
                'errors' => $validator->messages()
            ], 422);
        } else {
            $logbook = $logbook->update($request->all());
            if ($logbook) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Logbook Updated Successfully!'
                ]);
            }
        }
    }

    public function destroy(Logbook $logbook)
    {
        $logbook->delete();
        if ($logbook) {
            return response()->json([
                'status' => 200,
                'message' => 'Logbook Deleted Successfully!'
            ]);
        }
    }
}
