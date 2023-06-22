<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller as Controller;

class NewsController extends Controller
{
    public function index(Request $req)
    {
        $query = $req->query();
        $url = 'https://newsapi.org/v2/everything?q=' . $query['searchKey'] . '&from=2023-06-21&' .
            'to=2023-06-21&sortBy=popularity&apiKey=92b20f051922401495b91e004d3f0683';
        $client = new Client();
        $response = $client->get($url);
        $body = $response->getBody();
        $data = json_decode($body);
        return response()->json($data);
    }
}
