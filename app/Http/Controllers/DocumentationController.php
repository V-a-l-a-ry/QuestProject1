<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;

class DocumentationController extends Controller
{
    public function index($version = '1.0')
    {
        //$path = resource_path("docs/{$version}/index.html");

       // if (!File::exists($path)) {
          //  abort(404);
      //  }

          return view('docs', ['version' => $version]);
    }
}
