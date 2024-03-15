<?php
 
namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ScheduleController extends Controller
{
    public function fetchDataFromNTAApi()
    {
        // Make the API request
        $response = Http::withHeaders([
            'x-api-key' => 'f9b8882d41324f30b555458a442b882f',
        ])->get('https://api.nationaltransport.ie/gtfsr/v2/gtfsr?format=json');
 
        // Check if request was successful
        if ($response->successful()) {
            // Decode the JSON response
            $data = $response->json();
 
            // Pass the data to the view for display
            return view('schedule')->with('data', $data);
        } else {
            // Handle the case where the request was not successful
            $errorMessage = "An error occurred while fetching schedule data. Status Code: " . $response->status();
            return view('errors.Schedule_error')->with('errorMessage', $errorMessage);
        }
    }

    
}
