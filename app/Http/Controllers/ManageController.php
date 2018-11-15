<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Subscriber;
use Auth;


class ManageController extends ClientController
{
    

    public function index()
    {
        $weather = $this->currentGroupWeather();

        //dd($weather);

        return view('manage.index', compact('weather'));
    }










    public function create()
    {
        $subscribers = Subscriber::orderBy('id', 'desc')
                    ->where('user_id', auth()->id())
                    ->paginate(15); 

       
         foreach ($subscribers as $subscriber) {
            $string=$subscriber->city->code;
            $array = explode(',', $string);
            
            //$querysting= http_build_query($subs_locs);
            //dump($array);
        }
 
        $appid = '758fd34bdea7255914d3cd6d216fe560';
        $locOne = '2298890,2306104,2295021,2302357,2299522,2294877,2302821,2295458';
        $q = 'Accra';
        $client = new \GuzzleHttp\Client();
        
        $weather = $client->get('api.openweathermap.org/data/2.5/forecast?q='.$q.'&appid='.$appid.'&units=metric', [
            'headers' => [
            'Authorization' => $appid,
            ],
        
        ]);
                $weather = json_decode($weather->getBody(), true);
                //$weather=array_column($weather,'cnt');
                //$VALUE=implode(',',$weather);

               // dd($weather);
        return view('manage.subscriber', compact('subscribers','array'));
    }


    public function store(Request $request)
    {
        $this->validate(request(), [
            'fname'=> 'required',
            'lname' => 'required',
            'email' => 'required',
            'city' => 'required',
            'phone' => 'required',
            
        ]);

        Subscriber::forceCreate([
            'user_id' => Auth::user()->id,
            'firstname' => request('fname'),
            'lastname' => request('lname'),
            'email' => request('email'),
            'city_id' => request('city'),
            'phone' => request('phone'),
            
        ]);



        return response()->json(['message'=>'Subscriber Created!']);
    }





}
