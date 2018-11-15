let axios = require('axios');
let BASE_URL = '/manage/forecast';

module.exports = function (options , callback) {
	if (!options.appid) {
		throw new Error('open weather map requires a key');
	}

	let params = {
		//q: options.city,
		api_key: options.appid,
		//units: 'metric',

	};

	axios.get(BASE_URL, {params})
		.then(response=>{
			if (callback) {
				callback(response.data.items)
			}
		})
		.catch(error => console.error(error));
}