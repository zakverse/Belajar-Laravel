<?php

namespace App\Http\Controllers;
use App\Services\HelloService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelloController extends Controller
{
    private HelloService $HelloService;

    public function __construct(HelloService $HelloService)
    {
        $this->HelloService = $HelloService;
    }
    public function hello(Request $request, string $name): string
    {
        // $request->path();
        // $request->url();
        // $request->fullUrl();
     return $this->HelloService->hello($name);   
    }

    public function request(Request $request): string
    {
        $method = $request->method();
        $path = $request->path();
        $url = $request->url();
        $fullUrl = $request->fullUrl();
       $header = $request->header('Accept');

        return "Method: " . $method . ", Path: " . $path . ", URL: " . $url . ", Full URL: " . $fullUrl . ", Header: " . $header;
    }


}
