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

        $searchKey = isset($query['searchKey']) ? "q=" . $query['searchKey'] . "&" : "q= &";
        $page = isset($query['page']) ? "page=" . $query['page'] . "&" : "";
        $pageSize = isset($query['pageSize']) ? "pageSize=" . $query['pageSize'] . "&" : "";
        $domains = isset($query['domains']) ? "domains=" . $query['domains'] . "&" : "";
        $from = isset($query['from']) ? "from=" . $query['from'] . "&" : "";
        $to = isset($query['to']) ? "to=" . $query['to'] . "&" : "";

        $url = 'https://newsapi.org/v2/everything?' .
            $searchKey . $page . $pageSize . $domains . $from . $to .
            'apiKey=92b20f051922401495b91e004d3f0683';

        $client = new Client();
        $response = $client->get($url);
        $body = $response->getBody();
        $data = json_decode($body);
        return response()->json($data);
    }
}
