@extends('admin.main')

@section('include_header')
<!-- Custom styles for this page -->

<link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
@endsection


@section('content')
<!-- Page Wrapper -->
<div id="wrapper">
  @include('admin.sidebar')

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">
      @include('admin.topbar')

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Job Seekers</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-1">
            <a class="btn btn-success float-right" href="javascript:void(0)" id="createNewUser"> Create New Recruiter</a>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table-bordered  compact" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
        <div class="copyright text-center my-auto">
          <span>Copyright &copy; Job Bank 2019 | theme based on <a href="https://startbootstrap.com/themes/sb-admin-2/" target="_blank">SB Admin 2</a></span>
        </div>
      </div>
    </footer>
    <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
  <i class="fas fa-angle-up"></i>
</a>


<div class="modal fade" id="ajaxAddModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxAddModelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="ajaxAddUserForm" name="ajaxAddUserForm" class="form-horizontal">
                   <input type="hidden" name="user_type" id="add_user_type" value="2">

                    <div class="form-group">
                        <label for="fname" class="col-sm-4 control-label">First Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="add_fname" name="fname" placeholder="Enter First Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="col-sm-4 control-label">Last Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="add_lname" name="lname" placeholder="Enter Last Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group" id="email_form_group">
                        <label for="email" class="col-sm-4 control-label">Email</label>
                        <div class="col-sm-12">
                            <input type="email" class="form-control" id="add_email" name="email" placeholder="Enter Email" value="" maxlength="50" required="">
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="addUserBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="ajaxEditModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ajaxEditModelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="ajaxEditUserForm" name="ajaxEditUserForm" class="form-horizontal">
                   <input type="hidden" name="user_id" id="edit_user_id">
                   <input type="hidden" name="user_type" id="edit_user_type" value="2">

                    <div class="form-group">
                        <label for="fname" class="col-sm-4 control-label">First Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edit_fname" name="fname" placeholder="Enter First Name" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="lname" class="col-sm-4 control-label">Last Name</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="edit_lname" name="lname" placeholder="Enter Last Name" value="" maxlength="50" required="">
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save changes
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script src="{{asset('res/sbadmin2')}}/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Custom scripts for all pages-->
<script src="{{asset('res/sbadmin2')}}/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<!-- <script src="{{asset('res/sbadmin2')}}/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('res/sbadmin2')}}/vendor/datatables/dataTables.bootstrap4.min.js"></script> -->

<!-- Page level custom scripts -->
<script type="text/javascript">
  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    
    var table = $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.ajaxRecruiter.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'full_name', name: 'full_name'},
            {data: 'email', name: 'email'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });


    $('#createNewUser').click(function () {
        $('#addUserBtn').val("create-user");
        $('#add_user_id').val('');
        $('#ajaxAddUserForm').trigger("reset");
        $('#ajaxAddModelHeading').html("Create New User <small class=\"text-warning\">assigning a recruiter to a company is not implmented yet!</small>");
        $('#ajaxAddModel').modal('show');
    });


    $('body').on('click', '.editUser', function () {
          var url = $(this).data('url');
          var user_id = $(this).data('id');
          $.get(url, function (data) {
            $('#ajaxEditModelHeading').html("Edit User");
            $('#saveBtn').val("edit-user");
            $('#ajaxEditModel').modal('show');
            $('#edit_user_id').val(data.id);
            $('#edit_fname').val(data.fname);
            $('#edit_lname').val(data.lname);
            $('#saveBtn').attr('data-id', user_id);
            $('#edit_user_id').val(user_id);
          });
    });


    $('#addUserBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#ajaxAddUserForm').serialize(),
          url: "{{ route('admin.ajaxRecruiter.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#ajaxAddUserForm').trigger("reset");
              $('#ajaxAddModel').modal('hide');
              table.draw();
          },
          error: function (data) {
              console.log('Error:', data);
              $('#addUserBtn').html('Save Changes');
          }
        });
    });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Sending..');
    
        $.ajax({
          data: $('#ajaxEditUserForm').serialize(),
          url: "{{ route('admin.ajaxRecruiter.update') }}",
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

    $('body').on('click', '.deleteUser', function () {
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
     
     
  });
</script>

@endsection