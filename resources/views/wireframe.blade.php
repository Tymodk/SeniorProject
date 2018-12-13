@extends('layouts.app')

@section('content')


    <div class="container-fluid justify-content-center text-center mt-5 border-bottom border-dark">
        <div class="row">
            <div class="col-md-4">
        <h2 class="text-center pt-3">Welcome Sam!</h2>
            </div>
            <div class="col-md-4">
            <h2 class="text-center"> <p>14:22 </p>  <p>17/12/2018</p> </h2>
            </div>
            <div class="col-md-4">
            <h2 class="pull-right p-4 border border-dark">No scannner detected</h2>
            </div>
            </div>
    </div>
    <div class="container-fluid">
      <div class="container-fluid row mt-2 border-bottom border-dark pb-3">
        <p><strong>Today</strong></p>
        <div class="container-fluid">
    		<!-- start agenda -->
          <div class="row mt-2 vertical-align-text border-bottom border-dark">
            <div class="col-md-2">
              <h5>9u - 10u</h5>
            </div>
            <div class="col-md-3">
              <h3>Senior Project</h3>
            </div>
            <div class="col-md-2">
              <h5>A102</h5>
            </div>
            <div class="col-md-3">
              <h5>IWT/PB-MT 3 WP a</h5>
            </div>
            <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Start Lesson</h5>
            </button>
          </div>
            <div class="row mt-2 vertical-align-text border-bottom border-dark">
              <div class="col-md-2">
                <h5>9u - 10u</h5>
              </div>
              <div class="col-md-3">
                <h3>Senior Project</h3>
              </div>
              <div class="col-md-2">
                <h5>A102</h5>
              </div>
              <div class="col-md-3">
                <h5>IWT/PB-MT 3 WP a</h5>
              </div>
              <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
                <h5 class="m-0">Start Lesson</h5>
              </button>
            </div>
            <div class="row mt-2 vertical-align-text border-bottom border-dark">
              <div class="col-md-2">
                <h5>9u - 10u</h5>
              </div>
              <div class="col-md-3">
                <h3>Senior Project</h3>
              </div>
              <div class="col-md-2">
                <h5>A102</h5>
              </div>
              <div class="col-md-3">
                <h5>IWT/PB-MT 3 WP a</h5>
              </div>
              <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
                <h5 class="m-0">Start Lesson</h5>
              </button>
            </div>
      	</div>
      </div>
      <div class="container-fluid row mt-2 border-bottom border-dark pb-3">
        <p><strong>Today</strong></p>
        <div class="container-fluid">
    		<!-- start agenda -->
          <div class="row mt-2 vertical-align-text border-bottom border-dark">
            <div class="col-md-2">
              <h5>9u - 10u</h5>
            </div>
            <div class="col-md-3">
              <h3>Senior Project</h3>
            </div>
            <div class="col-md-2">
              <h5>A102</h5>
            </div>
            <div class="col-md-3">
              <h5>IWT/PB-MT 3 WP a</h5>
            </div>
            <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Start Lesson</h5>
            </button>
          </div>
          <div class="row mt-2 vertical-align-text border-bottom border-dark">
            <div class="col-md-2">
              <h5>9u - 10u</h5>
            </div>
            <div class="col-md-3">
              <h3>Senior Project</h3>
            </div>
            <div class="col-md-2">
              <h5>A102</h5>
            </div>
            <div class="col-md-3">
              <h5>IWT/PB-MT 3 WP a</h5>
            </div>
            <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Start Lesson</h5>
            </button>
          </div>
      	</div>
      </div>
    </div>
    @endsection
