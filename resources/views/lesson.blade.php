@extends('layouts.app')

@section('content')


    <div class="container-fluid justify-content-center text-center mt-5 border-bottom border-dark">
      <div class="row vertical-align-text">
        <div class="col-md-4">
          <h2 class="text-center pt-3">Senior Project</h2>
        </div>
        <div class="col-md-2">
          <h4 class="pt-3">A102</h4>
        </div>
        <div class="col-md-2">
          <h4 class="pt-3">9u - 10u30</h4>
        </div>
        <div class="col-md-3">
          <h4 class="pt-3">IWT/PB-MT 3 WP a</h4>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="container-fluid row mt-2 border-bottom border-dark pb-3">
        <div class="container-fluid">
    		<!-- Leerkracht -->
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
              <div class="circle-big rounded-circle border">
              </div>
            </div>
            <div class="col-md-3">
              <h3>Sam Serrien</h3>
            </div>
            <div class="col-md-5">
            </div>
            <button type="button" onclick="window.location='{{ url('/lesson') }}'" class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Start Lesson</h5>
            </button>
          </div>
      	</div>
      </div>
      <div class="container-fluid row mt-2 border-bottom border-dark pb-3">
        <div class="container-fluid">
          <p class="float-md-left"><strong>Present</strong></p>
          <input class="float-md-right" type="text" name="search-present" placeholder="Search...">
        </div>
        <div class="container-fluid">
    		<!-- start agenda -->
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
              <div class="circle-small rounded-circle border">
              </div>
            </div>
            <div class="col-md-4">
              <h3>Arthur Van Passel</h3>
            </div>
            <div class="col-md-2">
              <h5>9:02</h5>
            </div>
            <div class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Undo</h5>
            </div>
          </div>
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
              <div class="circle-small rounded-circle border">
              </div>
            </div>
            <div class="col-md-4">
              <h3>Arthur Van Passel</h3>
            </div>
            <div class="col-md-2">
              <h5>9:02</h5>
            </div>
            <div class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Undo</h5>
            </div>
          </div>
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
              <div class="plus">
              </div>
            </div>
            <div class="col-md-4">
              <input type="text" name="add-present" size="40" placeholder="Insert name or student-id...">
            </div>
            <div class="col-md-2 p-1 border text-center ">
              <h5 class="m-0">Add Student</h5>
            </div>
          </div>
      	</div>
      </div>
      <div class="container-fluid row mt-2 border-bottom border-dark pb-3">
        <div class="container-fluid">
          <p class="float-md-left"><strong>Absent</strong></p>
          <input class="float-md-right" type="text" name="search-present" placeholder="Search...">
        </div>
        <div class="container-fluid">
    		<!-- start agenda -->
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
              <div class="circle-small rounded-circle border">
              </div>
            </div>
            <div class="col-md-4">
              <h3>Arthur Van Passel</h3>
            </div>
            <div class="col-md-2">
              <h5>9:02</h5>
            </div>
            <div class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Undo</h5>
            </div>
          </div>
          <div class="row mt-2 vertical-align-text">
            <div class="col-md-1">
            </div>
            <div class="col-md-1">
              <div class="circle-small rounded-circle border">
              </div>
            </div>
            <div class="col-md-4">
              <h3>Arthur Van Passel</h3>
            </div>
            <div class="col-md-2">
              <h5>9:02</h5>
            </div>
            <div class="col-md-2 p-1 border mb-2 text-center ">
              <h5 class="m-0">Undo</h5>
            </div>
          </div>
      	</div>
      </div>
    </div>
    @endsection
