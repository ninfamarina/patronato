const Utils = (function(){

	const createAlert = function(type, msg) {
		return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
			 ${msg}
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			    <span aria-hidden="true">&times;</span>
			  </button>
			</div>`;
	}

	const getAlert = function(type) {
		return function(msg) {
			let alertable = document.querySelector('.alertable');
			if(alertable) 
				alertable.insertAdjacentHTML("afterbegin", createAlert(type, msg));
		}
	}	

	const clearAlerts = function () {
		const alerts = document.querySelectorAll('.alert');
		for(let i = 0; i < alerts.length; i++) {
			alerts[i].parentNode.removeChild(alerts[i]);
		}
	}

	const setQueryParams = function(params) {
		if(params.size == 0)
			return '';
		let queryParams = "?";
		for(const p of params.keys()) {
			 queryParams += `${p}=${params.get(p)}&`;
		}
		return queryParams.slice(0, -1);
	}

	return {
		getAlert,
		clearAlerts,
		setQueryParams
	}
})()

const warningAlert = Utils.getAlert('warning');
const clearAlerts = Utils.clearAlerts
const setQueryParams = Utils.setQueryParams

