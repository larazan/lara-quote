<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\Snappy\Facades\SnappyImage;

class TestController extends Controller
{
    //
    public function index()
    {
        $img = SnappyImage::loadView('test', [
            'text' => 'Hello World',
        ]);

        $img->setOption('format', 'jpeg');
        $img->setOption('width', 400);
        $img->setOption('height', 400);

        return response($img->output(), 200, [
            'Content-Type' => 'image/jpeg',
        ]);

        // This is the response if you want populate an <img> tag
        // return response('data:image/jpeg;charset=utf-8;base64,' . base64_encode($img->output()), 200, [
        //     'Content-Type' => 'image/jpeg',
        // ]);
    }
}
