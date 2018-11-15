@extends('layouts.manage')

@section('DynamicCss')
    <link href="{{asset('css/semantic.min.css')}}" rel="stylesheet">
@endsection
@section('DynamicJs')
    <script src="{{asset('js/semantic.min.js')}}"></script>
    
@endsection 

@section('content')
<div class="container-fluid" >
          <div class="animated fadeIn">
            <div class="row"></div>

            <subscribers-form> </subscribers-form>

            <div class="row">
            <div class="col-lg-12">
            <div class="card">
            
            <div class="card-body">
            <table class="table table-striped table-hover table-responsive-lg">
            	<tr>
            		<th>First Name</th>
            		<th>Last Name</th>
            		<th>Email</th>
            		<th>City</th>
            	</tr>
            	
            		@foreach($subscribers as $subscriber)
            		<tr>
            		<td>{{$subscriber->firstname}}</td>
            		<td>{{$subscriber->lastname}}</td>
            		<td>{{$subscriber->email}}</td>
            		<td>{{$subscriber->city->name}}</td>
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