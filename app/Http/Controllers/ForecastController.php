<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends ClientController
{
	public function search(Request $request)
	{
		$searchCity = $request->get('q');
		return view('manage.forecast');
	}

     public function forecast()
    {
    	

        $weather = $this->forecastWeather();

        //dd($weather);

        return view('manage.forecast', compact('weather'));
    }
}
