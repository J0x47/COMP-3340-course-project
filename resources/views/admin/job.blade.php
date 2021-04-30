@extends('admin.main')

@section('include_header')
<link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap-switch-button@1.0.0/css/bootstrap-switch-button.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://blackrockdigital.github.io/startbootstrap-sb-admin-2/vendor/datatables/dataTables.bootstrap4.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
<link rel="stylesheet" href="{{asset('css/admin/toggle-switch.css')}}" />
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
        <h1 class="h3 mb-2 text-gray-800">Jobs</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
          <div class="card-header py-1">
            <a class="btn btn-success float-right" href="javascript:void(0)" id="createNewJob"> Create New Job</a>
          </div>
          <div class="card-body">

            <div class="table-responsive">
              <table class="table-bordered  compact table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Job Title</th>
                    <th>Location</th>
                    <th>Posted By</th>
                    <th>Created At</th>
                    <th>Due Date</th>
                    <th>Status</th>
                    <th>Job Status</th>
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
                <form id="ajaxAddJobForm" name="ajaxAddJobForm" class="form-horizontal">
                   <div class="form-group">
                       <label for="job_title" class="col-sm-4 control-label">Job Title:</label>
                       <div class="col-sm-12">
                        <input type="text" name="job_title" class="form-control"  value="{{ old('job_title') }}" required>
                        <input type="hidden" name="user_id" id="add_user_id" value="{{Auth::user()->id}}">

                      </div>
                   </div>
                   
                   <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description:</label>
                    <div class="col-sm-12">
                      <textarea rows="10" name="description" id="summernote" class="form-control" required>{{ old('description') }}</textarea>
                    </div>
                   </div>

                   <div class="form-group">
                      <label for="category" class="col-sm-4 control-label">Category:</label>
                      <div class="col-sm-12">
                        <select name="category_id" class="form-control" required>
                        @foreach(App\Category::all() as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                        </select>
                      </div>
                   </div>
                   
                   <div class="form-group">
                    <label for="vacancy" class="col-sm-4 control-label">No of vacancy:</label>
                    <div class="col-sm-12">
                      <input type="text" name="vacancy" class="form-control"  value="{{ old('vacancy') }}">
                    </div>
                   </div>

                    <div class="form-group">
                      <label for="experience" class="col-sm-4 control-label">Year of experience:</label>
                      <div class="col-sm-12">
                        <input type="text" name="experience" class="form-control"  value="{{ old('experience') }}" required>
                      </div>
                   </div>

                    <div class="form-group">
                      <label for="gender" class="col-sm-4 control-label">Gender:</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="gender">
                          <option value="any" selected="selected">Any</option>
                          <option value="male">male</option>
                          <option value="female">female</option>
                        </select>
                      </div>
                    </div>

                      <div class="form-group">
                       <label for="salary" class="col-sm-4 control-label">Salary/year:</label>
                       <div class="col-sm-12">
                         <select class="form-control" name="salary">
                             <option value="negotiable">Negotiable</option>
                             <option value="2000-5000">2000-5000</option>
                             <option value="50000-10000">5000-10000</option>
                             <option value="10000-20000">10000-20000</option>
                             <option value="30000-500000">50000-500000</option>
                             <option value="500000-600000">500000-600000</option>
                             <option value="600000 plus">600000 plus</option>
                         </select>
                      </div>
                   </div>
                   

                   <div class="form-group">
                    <label for="job_type" class="col-sm-4 control-label">Job Type:</label>
                    <div class="col-sm-12">
                      <select class="form-control " name="job_type">
                        <option value="1" selected="selected">fulltime</option>
                        <option value="2">parttime</option>
                        <option value="3">contract</option>
                        <option value="4">intership</option>
                        <option value="5">temporary</option>
                      </select>
                    </div>
                   </div>

                   <div class="form-group">
                    <label for="status" class="col-sm-4 control-label">Status:</label>
                    <div class="col-sm-12">
                      <select class="form-control" name="status">
                        <option value="1" selected="selected">open</option>
                        <option value="0">inactive</option>
                      </select>
                    </div>
                   </div>
                   
                   <div class="form-group">
                    <label for="due_date" class="col-sm-4 control-label">Due date:</label>
                    <div class="col-sm-12">
                      <input id="datepicker"  name="due_date" class="form-control">
                    </div>
                   </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="addJobBtn" value="create">Save changes
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
                <form id="ajaxEditForm" name="ajaxEditForm" class="form-horizontal">
                   <input type="hidden" name="id" id="edit_job_id">

                   <div class="form-group">
                       <label for="job_title" class="col-sm-4 control-label">Job Title:</label>
                       <div class="col-sm-12">
                        <input type="text" name="job_title" id="edit_job_title" class="form-control"  required>
                      </div>
                   </div>
                   
                   <div class="form-group">
                    <label for="description" class="col-sm-4 control-label">Description:</label>
                    <div class="col-sm-12">
                      <textarea rows="10" name="description" id="edit_job_desc" class="form-control" required></textarea>
                    </div>
                   </div>

                   <div class="form-group">
                      <label for="category" class="col-sm-4 control-label">Category:</label>
                      <div class="col-sm-12">
                        <select name="category_id" id="edit_category_id" class="form-control" required>
                          <option value="1">Technology</option>
                          <option value="2">Engineering</option>
                          <option value="3">Government</option>
                          <option value="4">Medical</option>
                          <option value="5">Construction</option>
                          <option value="6">Software</option>
                        </select>
                      </div>
                   </div>
                   
                   <div class="form-group">
                    <label for="vacancy" class="col-sm-4 control-label">vacancy:</label>
                    <div class="col-sm-12">
                      <input type="text" name="vacancy" class="form-control"  id="edit_vacancy">
                    </div>
                   </div>

                    <div class="form-group">
                      <label for="experience" class="col-sm-4 control-label">Year of experience:</label>
                      <div class="col-sm-12">
                        <input type="text" name="experience" class="form-control"  id="edit_experience" required>
                      </div>
                   </div>

                    <div class="form-group">
                      <label for="gender" class="col-sm-4 control-label">Gender:</label>
                      <div class="col-sm-12">
                        <select class="form-control" name="gender" id="edit_gender">
                          <option value="any">Any</option>
                          <option value="male">male</option>
                          <option value="female">female</option>
                        </select>
                      </div>
                    </div>

                      <div class="form-group">
                       <label for="salary" class="col-sm-4 control-label">Salary/year:</label>
                       <div class="col-sm-12">
                         <select class="form-control" name="salary" id="edit_salary">
                             <option value="negotiable">Negotiable</option>
                             <option value="2000-5000">2000-5000</option>
                             <option value="50000-10000">5000-10000</option>
                             <option value="10000-20000">10000-20000</option>
                             <option value="30000-500000">50000-500000</option>
                             <option value="500000-600000">500000-600000</option>
                             <option value="600000 plus">600000 plus</option>
                         </select>
                      </div>
                   </div>
                   

                   <div class="form-group">
                    <label for="job_type" class="col-sm-4 control-label">Job Type:</label>
                    <div class="col-sm-12">
                      <select class="form-control " name="job_type" id="edit_job_type">
                        <option value="1" selected="selected">fulltime</option>
                        <option value="2">parttime</option>
                        <option value="3">contract</option>
                        <option value="4">intership</option>
                        <option value="5">temporary</option>
                      </select>
                    </div>
                   </div>

                   
                   <div class="form-group">
                    <label for="due_date" class="col-sm-4 control-label">Due date:</label>
                    <div class="col-sm-12">
                      <input id="datepicker2"  name="due_date" class="form-control">
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
  var admin_ajaxJob_index_url = "{{ route('admin.ajaxJob.index') }}";
  var admin_ajaxJob_addNewJob_url = "{{ route('admin.ajaxJob.store') }}";
  var admin_ajaxJob_updateJob_url = "{{ route('admin.ajaxJob.update') }}";


</script>
<!-- Page level custom scripts -->
<script src="{{asset('js/admin/ajaxJob.js')}}" type="text/javascript"></script>
@endsection





