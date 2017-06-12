require('./bootstrap');

import dt from 'datatables.net';

$(document).ready(function() {
    $('#leadTable').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": "/api/leads",
        "columns":[
			{data:'name',name:'name'},
			{data:'email',name:'.email'},
			{data:'phone',name:'phone'},
			{data:'profile',name:'profile'},
			{data:'created_at',name:'created_at'}
		],
    } );
} );