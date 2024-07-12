// Data table initialization
$(document).ready(function() {
    var objectsTable = $('#objectsTable').DataTable({
        "paging": false,
        "info": false,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
        "initComplete": function(settings, json) {
			new $.fn.dataTable.FixedHeader(this.api());
		}
    });

    var townDetailsTable = $('#townDetailsTable').DataTable({
        "paging": false,
        "info": false,
        "ordering": true,
        "searching": true,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
        "initComplete": function(settings, json) {
			new $.fn.dataTable.FixedHeader(this.api());
		}
    });
});
