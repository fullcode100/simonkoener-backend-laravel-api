<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Http\Controllers\Controller as Controller;

class NewsController extends Controller
{
    public function index()
    {
        $url = 'https://newsapi.org/v2/top-headlines?sources=bbc-news&apiKey=92b20f051922401495b91e004d3f0683';
        $client = new Client();
        $response = $client->get($url);
        $body = $response->getBody();
        $res = json_decode($body);
        return response()->json($res);
    }
}
