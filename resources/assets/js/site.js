require('./bootstrap');
require('./jquery/plugins/mask');

import { LeadProvider } from './providers/leadProvider';

$(document).ready(function(){

	$("#phone").mask("(00)00000-0000");

	$('#submitForm').on('click', function (event) {
		event.preventDefault();
		AlertContainer.hide();
		var data = getData();
		LeadProvider.post(data).then((response) => {
			AlertContainer.show('success', response.data.msg, 5000);	
		}).catch((error) => {
			if (error.response.status == 400) {
				var objErrors = error.response.data;
				var errors = [];
				var keys = Object.keys(objErrors);
				for (var key of keys) {
					errors.push(objErrors[key][0]);
				}
				var textError = errors.join('<br />');
				AlertContainer.show('danger', textError);	
			} else {
				AlertContainer.show('danger', 'Ocorrou um erro inesperado ao processar o solicitação.');
			}
		});
	});

});

function getData() {
	var  data = {
		'name': $('#name').val(),
		'email': $('#email').val(),
		'phone': $('#phone').val(),
		'profile': $('#profile').val()
	};
	return data;
}

var AlertContainer = {
	selector: '.alert-container',
	show: function (alertClass, alertText, timeout) {
		var html = ("<div class='alert alert-"+alertClass+"'>"+alertText+"</div>");	
		$(this.selector).html(html);
		if (timeout) {
			console.log('set timeout', timeout);
			setTimeout(() => {
				this.hide();
			}, timeout);
		}
	},
	hide: function () {
		$(this.selector).html("");	
	}
}