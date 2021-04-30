  $(function () {
   
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
  
    // // Toggle the side navigation
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
        ajax: admin_ajaxJob_index_url,

        "createdRow": function ( row, data, index ) {
          $(row).addClass('small');
        },
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'job_title', name: 'job_title'},
            {data: 'location', name: 'location'},
            {data: 'posted_by_name', name: 'posted_by_name'},
            {data: 'created_at', name: 'created_at'},
            {data: 'due_date', name: 'due_date'},
            {data: 'status', name: 'status'},
            {data: 'job_status', name: 'job_status', orderable: false, searchable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    table.column(6).visible(false);

    // datatables event
    table.on( 'draw', function () {
        // console.log( 'Redraw occurred at: '+new Date().getTime() );
        // $('[data-toggle="switch"]').bootstrapSwitch();

    });

    // table.on( 'xhr', function ( e, settings, json ) {
    //     console.log( 'Ajax event occurred at: '+new Date().getTime() + ', Returned data: ', json );
    // } );


    $('#createNewJob').click(function () {
        $('#addJobBtn').val("create-job");
        // $('#add_user_id').val('');
        $('#ajaxAddJobForm').trigger("reset");
        $('#ajaxAddModelHeading').html("Create New Job");
        $('#ajaxAddModel').modal('show');
    });


    $('body').on('click', '.editJob', function () {
          var url = $(this).data('url');
          var job_id = $(this).data('id');
          $.get(url, function (data) {
            $('#ajaxEditModelHeading').html("Edit Job");
            $('#saveBtn').val("edit-job");
            $('#ajaxEditModel').modal('show');
            $('#edit_job_title').val(data.job_title);
            $('#edit_job_desc').val(data.description);
            $('#edit_job_type').val(data.type);
            $('#edit_category_id option[value='+ data.category_id+']').attr("selected", "selected");
            $('#edit_gender option[value='+ data.gender+']').attr("selected", "selected");
            $('#edit_salary option[value='+ data.salary+']').attr("selected", "selected");
            $('#edit_vacancy').val(data.vacancy);
            $('#edit_experience').val(data.experience);
            $('#datepicker2').val(data.due_date);
            $('#edit_job_id').val(job_id);
            // $('#saveBtn').attr('data-id', job_id);
          });
    });


    $( ".changeState" ).change(function() {
      alert( "Handler for .change() called." );
    });


    $('#addJobBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#ajaxAddJobForm').serialize(),
          url: admin_ajaxJob_addNewJob_url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#ajaxAddJobForm').trigger("reset");
              $('#ajaxAddModel').modal('hide');
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#addJobBtn').html('Save Changes');
          }
        });
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
        var url = admin_ajaxJob_updateJob_url;

        $.ajax({
          data: $('#ajaxEditForm').serialize(),
          url: url,
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#ajaxEditUserForm').trigger("reset");
              $('#ajaxEditModel').modal('hide');
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
          }
        });
    });

    $('body').on('click', '.deleteJob', function () {
            var user_id = $(this).data("id");
            var url = $(this).data("url");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: url,
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });


    $('body').on('click', '.toggle-state', function () {
      if($(this).prop('checked')) {
        $(this).data('v',"1");
        // console.log("status has been changed to 1");
      }else{
        $(this).data('v',"0");
        // console.log("status has been changed to 0");
      }
      // update status value to the database once checkbox is clicked
      var url = $(this).data("url");
      var job_status = $(this).data('v');
      $.post(url,
        {
          status: job_status,
        },
        function(data, status){
          // console.log("Data: " + data + "\nStatus: " + status);
      }).done(function() {
        // console.log( "ajax post success" );
      }).fail(function(xhr, status, error) {
        console.log(xhr.responseText);
      });
      
    });

   

  });


// $( document ).ready(function() {
//     console.log( "ready!" );
//     $('[data-toggle="switch"]').bootstrapSwitch();
// });

// $(document).ajaxStop(function () {
//       // 0 === $.active
//       // $('[data-toggle="switch"]').bootstrapSwitch();
      
//       // document.getElementById('chkToggle2').switchButton();

//       $.each($('[data-toggle="switchbutton"]'), function (index,value) {
//         if($(this).attr('data-v') == 0) {
//           value.switchButton('off')
//         } else {
//           value.switchButton('on')
//         }
//       });
//   });


// toggle switch
$(function(){

  // triggering toggle switch if needed (initially, all checkboxes are checked.
  // once data request finishes, all checkboxes's checked property will be set false if their status's value are zero, which is
  // obtained from ajax response.
  $(document).ajaxStop(function () {
    $.each($('.toggle-state'), function(index, value){
      if($(this).data('v')==0){
        $(this).prop('checked', false);
      }
    });

  });

  

  

});