function confirmDelete(eventId) {
    Swal.fire({
        title: 'Are you sure?',
        text: 'You will not be able to recover this event!',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById('delete-event-' + eventId).submit();
        }
    });
}


$('.select2').select2({
    minimumResultsForSearch: Infinity
});


// Select2 by showing the search
$('.select2-show-search').select2({
    minimumResultsForSearch: ''
});

// Select2 with tagging support
$('.select2-tag').select2({
    tags: true,
    tokenSeparators: [',', ' ']
});

// Datepicker
$('.fc-datepicker').datepicker();

$('#datepickerNoOfMonths').datepicker({
    showOtherMonths: true,
    selectOtherMonths: true,
    numberOfMonths: 2
});


$(document).ready(function () {
    $("#humanfd-datepicker").datepicker();
});


$('#datatable1').DataTable({
    responsive: true,
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
    }
});

$('.dataTables_length select').select2({minimumResultsForSearch: Infinity});
