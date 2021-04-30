@extends('admin.main')
@section('content')

<div class="container">
  @if(Session::has('message'))
  <div class="alert alert-success">{{Session::get('message')}}</div>
  @endif
  <div class="row">
    <div class="col-md-2">
    @include('admin.leftMenu')
    </div>
    <div class="col-md-10 mb-0 pb-0">
      <div class="container-fluid">
        <div class="row">

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300">
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300">
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300">
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Earnings (Monthly)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300">
                    </i>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

      <!-- <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">Image</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Satus</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>row 1 data 1</td>
                <td>row 1 data 2</td>
                <td>row 1 data 3</td>
                <td>row 1 data 4</td>
                <td>edit</td>
              </tr>
              <tr>
                <td>row 2 data 1</td>
                <td>row 2 data 2</td>
                <td>row 2 data 3</td>
                <td>row 2 data 4</td>
                <td>edit</td>
              </tr>
              <tr>
                <td>row 3 data 1</td>
                <td>row 3 data 2</td>
                <td>row 1 data 3</td>
                <td>row 1 data 4</td>
                <td>edit</td>
              </tr>
              <tr>
                <td>row 1 data 1</td>
                <td>row 1 data 2</td>
                <td>row 1 data 3</td>
                <td>row 1 data 4</td>
                <td>edit</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div> -->

    </div>

    <div class="col-md-2">
    </div>
    <div class="col-md-10">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-xl-8 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
              </div>
              <div class="card-body">
                <div class="chart-area">
                  <canvas id="myAreaChart"></canvas>
                </div>
                <hr>
                Styling for the area chart can be found in the <code>/js/demo/chart-area-demo.js</code> file.
              </div>
            </div>

            <!-- Bar Chart -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
              </div>
              <div class="card-body">
                <div class="chart-bar">
                  <canvas id="myBarChart"></canvas>
                </div>
                <hr>
                Styling for the bar chart can be found in the <code>/js/demo/chart-bar-demo.js</code> file.
              </div>
            </div>

          </div>

          <!-- Donut Chart -->
          <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <div class="chart-pie pt-4">
                  <canvas id="myPieChart"></canvas>
                </div>
                <hr>
                Styling for the donut chart can be found in the <code>/js/demo/chart-pie-demo.js</code> file.
              </div>
            </div>
          </div>


        </div>
      </div>
    </div>

  </div>


    

  
</div>
@endsection