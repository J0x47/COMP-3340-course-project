  $(function () {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    // Toggle the side navigation
    // res/sbadmin2/js/sb-admin-2.js
    $("body").toggleClass("sidebar-toggled");
    $(".sidebar").toggleClass("toggled");
    if ($(".sidebar").hasClass("toggled")) {
      $('.sidebar .collapse').collapse('hide');
    };

    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: admin_application_index_url,

        "createdRow": function ( row, data, index ) {
          $(row).addClass('small');
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'job_id', name: 'job_id'},
            {data: 'job_title', name: 'job_title'},
            {data: 'job_type', name: 'job_type'},
            {data: 'category', name: 'category'},
            {data: 'company', name: 'company'},
            {data: 'location', name: 'location'},
            {data: 'posted_by', name: 'posted_by'},
            {data: 'due_date', name: 'due_date'},
            {data: 'application_id', name: 'application_id'},
            {data: 'application_name', name: 'application_name'},
            {data: 'application_time', name: 'application_time'},
        ]
    });

    table.column(6).visible(false);

  });
