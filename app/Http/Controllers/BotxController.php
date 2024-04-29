<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;

class BotxController extends Controller
{
    public function generateBotData($a,$b,$c)
    {
        $baseValue = $a; 
        $downLimit = $b;
        $upLimit = $c;
        $downInterval = [-0.5, -1, -0.7, -0.4, -2];
        $upInterval = [0.5, 1, 3, 3.5, 0.7, 0.4, 2, 7.5, 10.5,11.5, 12, 13, 14.5, 15, 16, 6, 11, 10.9];
    
        $totalMovements = 0;
    
        // Choose a random interval value from the respective arrays
        $randomDownInterval = $downInterval[array_rand($downInterval)];
        $randomUpInterval = $upInterval[array_rand($upInterval)];
    
        // Determine whether the movement will be upward or downward based on frequency
        $movement = 0;
        if ($totalMovements >= 20 || mt_rand(1, 100) <= 5) {
            $movement = $totalMovements < 20 ? $randomDownInterval * 10 : $randomUpInterval * 10;
            $totalMovements = 0; // Reset totalMovements counter
        } else {
            $frequency = mt_rand(1, 100) / 100;
            if ($frequency < 0.2) {
                $movement = $randomDownInterval;
            } else {
                $movement = $randomUpInterval;
            }
            $totalMovements++; // Increment totalMovements counter
        }
    
        // Adjust the open, high, low, and close values based on the selected movement
        $randomOpen = $baseValue + $movement;
        $randomHigh = $randomOpen + 2;
        $randomLow = $randomOpen - 2;
        $randomClose = $randomOpen + $movement;
    
        // Ensure the values respect the limits
        $randomOpen = max($downLimit, min($upLimit, $randomOpen));
        $randomHigh = max($downLimit, min($upLimit, $randomHigh));
        $randomLow = max($downLimit, min($upLimit, $randomLow));
        $randomClose = max($downLimit, min($upLimit, $randomClose));
    
        // Format the date and time as required
        $formattedDateTime = date('n/j/Y, h:i:s A'); // Change the format here
    
        return [
            'dateTime' => $formattedDateTime,
            'open' => number_format($randomOpen, 2),
            'high' => number_format($randomHigh, 2),
            'low' => number_format($randomLow, 2),
            'close' => number_format($randomClose, 2),
        ];
    }
    
    public function index()
{
    // Get all stocks
    $stocks = Stock::where('status', 1)->get();

    foreach ($stocks as $stock) {
        // Create CSV file for each stock if it doesn't exist
        $planId = $stock->plan_id;
        $fileName = "$planId.csv";
        $filePath = 'public/' . $fileName;
          
        // Generate bot data for this stock
        $botData = $this->generateBotData($stock->base_value,$stock->down_limit,$stock->up_limit);

        // Format the data as CSV
        $csvData = "{$botData['dateTime']},{$botData['open']},{$botData['high']},{$botData['low']},{$botData['close']}";

        // Check if the file already exists
        if (Storage::disk('public')->exists($fileName)) {
            // Append data to the existing CSV file with a newline character
            Storage::disk('public')->append($fileName, $csvData);
        } else {
            // Write data to a new CSV file without appending a newline character
            Storage::disk('public')->put($fileName, $csvData);
        }
    }

    return response()->json(['message' => 'Data saved successfully'], 200);
}

    
}
