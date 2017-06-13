require('./bootstrap');
require('./jquery/plugins/bootstrap-datepicker');

import dt from 'datatables.net-bs';
import { LeadProvider } from './providers/leadProvider';

$(document).ready(function() {

	$("#dt_ini").datepicker({
		format: 'dd/mm/yyyy',
		endDate: '0d',
		language: 'pt-BR'
	});

	$("#dt_fim").datepicker({
		format: 'dd/mm/yyyy',
		endDate: '0d',
		language: 'pt-BR'
	});

    var leadTable = $('#leadTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
				url: "/api/leads",
				data: function (d) {
					if ($.trim($("#name").val())) {
						d.name = $("#name").val();
					}
					if ($.trim($("#dt_ini").val())) {
						d.dt_ini = $("#dt_ini").val().split("/").reverse().join("-");
					}
					if ($.trim($("#dt_fim").val())) {
						d.dt_fim = $("#dt_fim").val().split("/").reverse().join("-");
					}
					if ($.trim($("#profile").val())) {
						d.profile = $("#profile").val();
					}
				},
			},
        "columns":[
			{data:'name',name:'name', orderable: false, searchable: false},
			{data:'email',name:'.email', orderable: false, searchable: false},
			{data:'phone',name:'phone', orderable: false, searchable: false},
			{data:'profile',name:'profile', orderable: false, searchable: false},
			{data:'created_at',name:'created_at', orderable: false, searchable: false},
			{data:'actions',name:'actions',orderable: false, searchable: false}
		],
    } );

    $('#clear').on('click', function(event) {
    	event.preventDefault();
    	$("#dt_ini").val("");
    	$("#dt_fim").val("");
    	$("#name").val("");
    	$("#profile").val("");
    	leadTable.draw();
    });

    $("#search").on('click', function(event) {
    	event.preventDefault();
    	leadTable.draw();
    });

    $("body").on('click','.deleteLead',function(event){
    	event.preventDefault();
    	var id = $(this).attr('data-id');
    	LeadProvider.delete(id).then((response) => {
    		leadTable.draw();
    	}).catch((error) => {
    		alert('Ocorreu um erro inesperado.');
    	});
    });


} );