<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Illuminate\Database\Eloquent\Model;
use App\Redirect;
use Config;



class RedirectController extends Controller
{
    public function addurl(Request $request, Validator $validator)
    {

        $validator = Validator::make($request->all(), [
            'url' => 'required|url',
        ]);

        if ($validator->fails()) {
            return redirect('/')->withErrors($validator)->withInput();
        }

        $newurl = Redirect::firstOrCreate(['url' => $request->input('url'), 'id_string' => str_random(6)]);

        $host = Config::get('app.url');

        return redirect('/')->with(['redirecturl' => $host."/".$newurl->id_string]);

    }

    public function redirecturl($id)
    {

        $host = Config::get('app.url');

        $url = Redirect::where('id_string', '=', $id)->get()->first();

        if($url) {
            return redirect($url->url);
        } else {
            return redirect('/')->withErrors(["Url ".$host."/".$id." not found!"]);
        }

    }
}
