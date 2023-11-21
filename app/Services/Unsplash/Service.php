<?php 

namespace App\Services\Unsplash;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;

class Service {

    public function data() {
        $img = Http::get(env('UNSPLASH_URL'), [
            'client_id' => env('UNSPLASH_ACCESS_KEY'),
        ]);

        $photos = $img->json(); 
        $number = rand(1,9);
        
        return $photos[$number]['urls']['regular'];
    }
}