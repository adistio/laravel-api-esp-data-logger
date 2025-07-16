<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TempHumidity;

class TempHumidityController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'temperature' => 'required|numeric',
            'humidity'    => 'required|numeric',
        ]);

        // Simpan ke database
        $data = TempHumidity::create([
            'temperature' => $validated['temperature'],
            'humidity'    => $validated['humidity'],
        ]);

        // Response JSON
        return response()->json([
            'message' => 'Data saved successfully',
            'data' => $data
        ], 201);
    }
}
