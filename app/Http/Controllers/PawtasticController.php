<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Ignite\Support\Facades\Form;

class PawtasticController extends Controller
{
    public function welcome()
    {
        return view('pawtastic')->with([
            'home' => Form::load('pages', 'home'),
            'services' => Service::where('active', '1')->orderBy('description', 'ASC')->get(),
        ]);

    }
}
