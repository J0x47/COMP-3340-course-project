@extends('admin.main')

@section('include_header')
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
        <h1 class="h3 mb-2 text-gray-800">Applications</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table-bordered  compact table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Job ID</th>
                    <th>Job Title</th>
                    <th>Job Type</th>
                    <th>Category</th>
                    <th>Company</th>
                    <th>Location</th>
                    <th>Posted By</th>
                    <th>Due Date</th>
                    <th>Application ID</th>
                    <th>Applicant Name</th>
                    <th>Application Time</th>
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

@endsection
@section('content_resource')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.0.0/js/bootstrap-switch-button.min.js"></script>

<script type="text/javascript">
  // global variables needed for js files whose value may be passed via view (blade)
  var admin_application_index_url = "{{ route('admin.application.index') }}";

</script>
<!-- Page level custom scripts -->
<script src="{{asset('js/admin/application.js')}}" type="text/javascript"></script>
@endsection





