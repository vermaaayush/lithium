<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Graph;
use Illuminate\Support\Facades\Storage;

class BotxController extends Controller
{
    public function generateBotData($a, $b, $c, $planId)
    {
        $baseValue = $a;
        $downLimit = $b;
        $upLimit = $c;
    
        $lastValue = $this->getLastCSVRowValue($planId, $baseValue);

        $newValue = $this->calculateNewValue($lastValue,$upLimit);
    
        $open = $newValue - 1;
        $high = $newValue + 2;
        $low =  $newValue - 2;
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
    
    private function getLastCSVRowValue($planId, $baseValue)
    {
        $rowCount = Graph::where('plan_id', $planId)->count();

        if ($rowCount > 400) {
            $rowsToDelete = $rowCount - 400; // Calculate the excess rows
            $query = Graph::where('plan_id', $planId)->orderBy('created_at')->limit($rowsToDelete);
            $deletedRows = $query->delete();
           
            dd($deletedRows); // Check the number of rows deleted
        }
               
                
                $latestRow = Graph::where('plan_id', $planId)->latest()->first();

                if ($latestRow) {
                    $points = $latestRow->points;
                    $pointsArray = explode(',', $points);
                    return $pointsArray[4];
                } else {
                    return   $baseValue;
                }

               
    
    }
    
    public function index()
{
    // Get all stocks
    $stocks = Stock::where('status', 1)->get();

    foreach ($stocks as $stock) {

        $planId = $stock->plan_id;
        $botData = $this->generateBotData($stock->base_value,$stock->down_limit,$stock->up_limit,$planId);
    
        $csvData = "{$botData['dateTime']},{$botData['open']},{$botData['high']},{$botData['low']},{$botData['close']}";
        $graph = new Graph();
        $graph->points = $csvData;
        $graph->plan_id = $planId;
        $graph->save();        
    }

    return response()->json(['message' => 'Data saved successfully'], 200);
}

    
}
