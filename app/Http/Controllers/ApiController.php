<?php

namespace App\Http\Controllers;
use Carbon\Carbon;

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;

class ApiController extends Controller
{


    public function senddata(Request $request)
    {
        $arrayOfNodeToExclude = array("NINZI-KINAMBA","NR1-A","NR19","NR1-B","NR1","NR1-A","NR1-B","NR1-C","NR19","NR1-C","ALPHA_PALACE-KABEZA-RUBIRIZI","BASE-RUKOMO","CC-KANOGO-AIRPORT","CC-KINAMBA","CC-MARIOT-METEO","LoraTest","KIGALI","SOPETRAD-KCC-PRINCEHOUSE","Office_testing","KINAMBA-UTEXIRWA-RDB","NR1");
        $arrayOfNodes = $request->input('data');
        $filteredNodes = [];
    
        foreach ($arrayOfNodes as $node) {
            if (!in_array($node['prjName'], $arrayOfNodeToExclude)) {
                $filteredNodes[] = $node;
            }
        }
        // Convert the filtered nodes to JSON
        $jsonData = json_encode($filteredNodes);
    
        // Write the JSON data to a file
        $filename = 'filtered_nodes.json';
        $filepath = storage_path('app/' . $filename);
        file_put_contents($filepath, $jsonData);
    
        // Return the filtered nodes as a JSON response with the file path
        $response = [
            'data' => $filteredNodes,
            'filepath' => $filepath
        ];
    
        return response()->json($response);
    }
    
    public function readJsonFile()
    {
        $filename = 'filtered_nodes.json';
        $filepath = '/var/www/html/4/laravel/storage/app/' . $filename;
    
        if (!file_exists($filepath)) {
            return response()->json(['error' => 'File not found']);
        }
    
        $jsonData = file_get_contents($filepath);
        $data = json_decode($jsonData, true);
    
        return $data;
    }
    
     

    
    public function detectTime()
    {
        $filteredNodes = $this->readJsonFile();

        $currentTime = Carbon::now()->timezone('GMT+2');
        $dayStartTime = Carbon::createFromTime(6, 0, 0, 'GMT+2');
        $dayEndTime = Carbon::createFromTime(17, 44, 0, 'GMT+2');
        $eveningStartTime = Carbon::createFromTime(17, 45, 0, 'GMT+2');
        $eveningEndTime = Carbon::createFromTime(23, 59, 59, 'GMT+2')->addSecond();
        $eveningEndTime2 = Carbon::createFromTime(0, 0, 0, 'GMT+2');
        $eveningEndTime3 = Carbon::createFromTime(5, 59, 0, 'GMT+2');
    
        if ($currentTime->between($dayStartTime, $dayEndTime)) {
            // Do something for daytime
            return 'day time';
        } elseif ($currentTime->between($eveningStartTime, $eveningEndTime) || $currentTime->between($eveningEndTime2, $eveningEndTime3)) {
            // Do something for evening time
            return 'evening time';
        }
    }
    public function lampsIndicator()
    {
        $currentTime = $this->detectTime();
        if ($currentTime === 'Daytime') {
            return 'ON';
        } else {
            return 'OFF';
        }
    }
    public function globalstatus()
    {
        $filteredNodes = $this->readJsonFile();
        $brightNodes = [];
    
        foreach ($filteredNodes as $node) {
            if (isset($node["bri"])) {
                if ($node["bri"] === 100) {
                    $brightNodes[] = $node;
                } elseif ($node["bri"] === 0) {
                    $offNodes[] = $node;
                }
            }
        }
    
        $response = [
            'bright_nodes_count' => count($brightNodes),
            'off_nodes_count' => isset($offNodes) ? count($offNodes) : 0
            // 'bright_nodes' => $brightNodes,
            // 'off_nodes' => isset($offNodes) ? $offNodes : [],
        ];
        return response()->json($response);
    }
    
    public function offline($filteredNodes)
    {
        // foreach($filteredNodes as $node)
        // {
        //     if ($node['online'] === 0)
        //     {
        //         $offlinelist [] = $node;
        //     }
        // }
        // return $offlinelist;
    }
    public function fuselink_driver($filteredNodes)
    {
        //return current time
    }
    public function sendnotifications($filteredNodes)
    {
        //return current time
    }



    public function receivedata()
    {
        $data = 6;
        return $data;
    }

    public function showdata(Request $request)
    {
        $data = $request->input('data');
        return $response;
    }
    
}
