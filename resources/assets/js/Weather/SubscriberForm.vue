<template>
    <div class="col-sm-12">
              <form method="POST"  @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                
<div class="card">
<div class="card-header">
<strong>subscribers</strong>
<small>Form</small>
</div>
<div class="card-body">

<div class="row">
<div class="form-group col-sm-6">
<label for="fname">First Name</label>
<input class="form-control" id="fname" type="text" name="fname" v-model="form.fname" placeholder="Enter your First Name" >
<span class="invalid-feedback " role="alert" v-if="form.errors.has('fname')" v-text="form.errors.get('fname')"></span>
</div>
<div class="form-group col-sm-6">
<label for="lname">Last Name</label>
<input class="form-control" id="lname" name="lname" v-model="form.lname" type="text" placeholder="Enter your First Name">

<span class="invalid-feedback" role="alert"  v-text="form.errors.get('lname')"></span>
</div>
</div>
<div class="form-group">
<label for="email">E-mail</label>
<input class="form-control" id="email" name="email" v-model="form.email" type="email" placeholder="Enter your e-mail">
</div>
<div class="row">
<div class="form-group col-sm-6">
<!--
    <sui-dropdown
    :options="city"
    placeholder="State"
    search
    selection
    v-model="current"
  />   -->
  <label for="city">City</label>
  <select v-model="form.city" name="cities" class="form-control" search selection>
        <option value="">Select City</option>
        <option v-for="city in cities" :value="city.id">{{city.name}}</option>
    </select>

</div>


<div class="form-group col-sm-6">
<label for="phone">Phone Number</label>
<input class="form-control" id="phone" name="phone" v-model="form.phone" type="text" placeholder="Your Phone Number">
</div>
</div>

<div class="form-actions">
<button class="btn btn-info" >Create</button>
<button class="btn btn-secondary" type="button">Cancel</button>
</div>
</div>
</div>

</form>





</div>
</template>

<script>
import  city  from '../data/city.json'


class Errors { 
    /**
     * Create a new Errors instance.
     */
    constructor() {
        this.errors = {};
    }


    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }


    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }


    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }


    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors) {
        this.errors = errors;
    }


    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }
}


class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }


    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }

        return data;
    }


    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }


    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit('post', url);
    }


    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit('put', url);
    }


    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit('patch', url);
    }


    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit('delete', url);
    }


    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess(data) {
        alert(data.message); // temporary

        this.reset();
    }

 
    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
        this.errors.record(errors);
    }
}


    export default {

      data(){
        return {  
            cities: [],  
            // city: city,
            // current: {},
            form: new Form({
            fname: '',
            lname: '',
            email: '',
            city: '',
            phone: '',

            }),
         
        }
      },
        

        mounted() {
            console.log('Component mounted.');
            this.loadCities()
        },


        methods: {
        onSubmit() {

            this.form.submit('post', '/manage/subscriber')
                .then(response => alert('Wahoo!'));
          
        },
        loadCities(){
            let url = '/api/cities'
            this.dynamicDropdown(url, 'cities')
        },
        dynamicDropdown(url, data){
            axios.get(url)
                 .then(response=>this[data] = response.data)
                 .catch(error => console.log(error));
        }
      }
    } 

    
</script>
