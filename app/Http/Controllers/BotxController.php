<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use Illuminate\Support\Facades\Storage;

class BotxController extends Controller
{
    public function generateBotData($a, $b, $c, $planId)
    {
        $baseValue = $a;
        $downLimit = $b;
        $upLimit = $c;
    
        $lastValue = $this->getLastCSVRowValue($planId, $baseValue);
    
        // return  $lastValue;
        $newValue = $this->calculateNewValue($lastValue,$upLimit);
    
        $open = $this->calculateOpen($newValue);
        $high = $this->calculateHigh($newValue);
        $low = $this->calculateLow($newValue);
        $close = $newValue;
    
        $formattedDateTime = date('n/j/Y, h:i:s A');
    
        return [
            'dateTime' => $formattedDateTime,
            'open' => number_format($open, 2),
            'high' => number_format($high, 2),
            'low' => number_format($low, 2),
            'close' => number_format($close, 2),
        ];
    }
    
    private function calculateNewValue( $lastValue, $upLimit)
    {
        
        $randomIncrement = mt_rand(1, 5);
        $newValue = $lastValue + $randomIncrement;
    
        if ($newValue > $upLimit) {
            $randomDown = mt_rand(8, 20);
            $newValue -= $randomDown;
        }
    
        return $newValue;
    }
    
    private function calculateOpen(float $newValue)
    {
        return $newValue - 1;
    }
    
    private function calculateHigh(float $newValue)
    {
        return $newValue + 2;
    }
    
    private function calculateLow(float $newValue)
    {
        return $newValue - 2;
    }

    private function getLastCSVRowValue($planId, $baseValue)
    {
        // Get the path to your CSV file
        $fileName = "$planId.csv";
        $filePath = asset('storage/' . $planId.'.csv');
        
                if (Storage::disk('public')->exists($fileName)) {
                    
                    $lines = Storage::disk('public')->get($fileName);
                    $rows = array_filter(array_map('trim', explode("\n", $lines)));
                     
                    if (count($rows) > 500) {
                        // Remove the oldest rows (100 rows)
                        $rows = array_slice($rows, -500);
                        // Join the remaining rows back into a string
                        $updatedContent = implode("\n", $rows);
                        // Overwrite the file with the updated content
                        Storage::disk('public')->put($fileName, $updatedContent);
                    }


                    $lastLine = end($rows);
                    $lastRow = str_getcsv($lastLine);

                    if (!empty($lastLine)) {
                        return $lastRow[4];
                    } else {
                        return   $baseValue;
                    }
                } else {
                    return   $baseValue;
                }
    
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
        $botData = $this->generateBotData($stock->base_value,$stock->down_limit,$stock->up_limit,$planId);
        
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
