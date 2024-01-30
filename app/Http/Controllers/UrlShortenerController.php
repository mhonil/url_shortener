<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use Exception;

class UrlShortenerController extends Controller
{
    // Store Url 

    public function store(Request $request){
        try{
            $longUrl = $request->get('url');
            $newGeneratedUrl = $request->get('shortlink');

            if ($longUrl != '' || $newGeneratedUrl != '') {
                $urlFound = Url::where('old_url', $longUrl)->get(['id', 'new_url'])->toArray();

                if (!empty($urlFound)) {
                    return $urlFound[0]['new_url'];
                }
                else{
                   $urlTable = new Url;
                   $urlTable->old_url = $longUrl;
                   $urlTable->new_url = $newGeneratedUrl;
                   $urlTable->user_ip = $_SERVER['REMOTE_ADDR'];

                   if ($urlTable->save()) {
                        return $urlTable->new_url;
                   }
                }
            }
        }
        catch(Exception $e){
            dd($e);
        }
    }
}
