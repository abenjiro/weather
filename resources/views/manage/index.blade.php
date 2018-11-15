@extends('layouts.manage')

@section('DynamicJs')

@endsection 

@section('content')
<div class="container-fluid" >
          <div class="animated fadeIn">
            <div class="row"></div>

             <div class="row">
            <div class="col-lg-12">
            <div class="card">
            <div class="card-header" style="text-align: center;"><h2>Capital Cities In Ghana &amp; Weather Details for Today</h2></div>
            <div class="card-body">
             <table class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md table-hover table-bordered table-outline mb-0 " style="text-align: center;">
             	
            
          {{-- {{dd($weather)}} --}}
            <thead class="thead-light">
            	<tr>
            		<th>Capital Cities</th>
                <th>Weather</th>
            		<th>Description</th>
                <th>Temperature</th>
                <th>Pressure</th>
                <th>Humidity</th>
                <th>Min. Temperature</th>
                <th>Max. Temperature</th>
                <th>Wind Speed</th>
                <th>Wind Direction</th>
            	</tr>
            </thead>
              @foreach($weather['list'] as $info)
            	<tr>
                <td>{{$info['name']}}</td>
                <td>{{$info['weather'][0]['main']}}</td>
                <td><img src="http://openweathermap.org/img/w/{{$info['weather'][0]['icon']}}.png"> {{$info['weather'][0]['description']}}</td>
            		<td>{{$info['main']['temp']}}&deg;C</td>
                <td>{{$info['main']['pressure']}}hPa</td>
                <td>{{$info['main']['humidity']}}%</td>
                <td>{{$info['main']['temp_min']}}&deg;C</td>
                <td>{{$info['main']['temp_max']}}&deg;C</td>
                <td>{{$info['wind']['speed']}}m/s</td>
                <td>{{$info['wind']['deg']}}&deg;</td>
            	</tr>
            	
            @endforeach
             </table>
            
            </div>
        </div>
    </div>
</div>
            
            


  </div>
  
</div>

@endsection