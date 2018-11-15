<template>
	<div class="Forecast-view">
		Hello
	</div>
</template>

<script>
 import Search from './Search';


 	export default{
 		created(){
 			Search({
 				appid: 'd872c3adf1f4a0389b3e09641',
 				//city: 'Accra'
 			}, response => this.weather = response);
 		},

 		data(){
 			return{
 				weather:null
 			}
 		},

 	
 	}

</script>