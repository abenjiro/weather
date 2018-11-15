<template>
<div>
<div class="col-sm-12">
<div class="">
<div class="">

<div class="">
<form class="form-horizontal" action="" method="post">

<div class="form-group row">
<div class="col-md-12">
<div class="input-group">
<input class="form-control" id="searchCity" type="text" v-model="searchCity" name="searchCity" value="" placeholder="City">
<span class="input-group-append">
<button @click.prevent="searchMyCity()" class="btn btn-primary" type="submit">Submit</button>
</span>
</div>
</div>
</div>
</form>
</div>
</div>

</div>
</div>

		<div v-if="showcity==true">
            <div  class="row" style="margin-top: 40px;">
            <div class="col-lg-12">
            <div class="card">
            <div class="" style="text-align: center;"><h2>{{weathers.city.name}}</h2></div>
            <div class="">
             <table class="table table-striped table-responsive-sm table-responsive-lg table-responsive-md table-hover table-bordered table-outline mb-0 " style="text-align: center;">
             	
            
          
          	
          		
          
            <thead class="thead-light">
            	<tr>
            	<th>Date&Time</th>
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
              	
              	
            	<tr v-for="info in weathers.list">

                <td>{{info.dt_txt}}</td>
            	<td>{{info.weather[0].main}}</td>
                <td><img :src="'http://openweathermap.org/img/w/'+info.weather[0].icon+'.png'">{{info.weather[0].description}}</td>
                <td>{{info.main.temp}}&deg;C</td>
                <td>{{info.main.pressure}}hPa</td>
                <td>{{info.main.humidity}}%</td>
				<td>{{info.main.temp_min}}&deg;C</td>
				<td>{{info.main.temp_max}}&deg;C</td>
				<td>{{info.wind.speed}}m/s</td>
				<td>{{info.wind.deg}}&deg;</td>

                
            	</tr>
            	
           
             </table>
            
            </div>
        </div>
    </div>
</div>
</div>


</div>
</template>

<script>


export default {

        data(){
        	return {
        		searchCity:'',
        		showcity: false,
        		weathers:[]

        	}
        },

        mounted() {
            console.log('Component mounted.');
           
        },

        methods:{
        	searchMyCity(){
        		fetch('https://api.openweathermap.org/data/2.5/forecast?q='+this.searchCity+'&appid=758fd34bdea7255914d3cd6d216fe560&units=metric')
        			.then(res => res.json())
        			.then(res => {
        				this.weathers = res;
        				this.searchCity= '';
        				this.showcity = true;
        			})
        			.catch(err => {console.log(err);
        			});
        	}
        }

}
	
</script>
