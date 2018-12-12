@extends('layouts.app')

@section('content')


    <div class="container-fluid justify-content-center text-center mt-5" style="border-bottom: 1px solid black">
        <div class="row">
            <div class="col-md-4">
        <h2 class="text-center pt-3">Welcome Sam!</h2>
            </div>
            <div class="col-md-4">
            <h2 class="text-center"> <p>14:22 </p>  <p>17/12/2018</p> </h2>
            </div>
            <div class="col-md-4">
            <h2 class="pull-right p-4" style="border: 1px solid black">No scannner detected</h2>
            </div>
            </div>
    </div>
        <div class="container-fluid">
          <div class="container row mt-2">
            <p><strong>Today</strong></p>
            <div class="container">
        		<!-- start agenda -->
          		<div >
                <div class="row">
                  <div class="col-md-2">
                    9u - 10u
                  </div>
                  <div class="col-md-3">
                    Senior Project
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-2">
                    9u - 10u
                  </div>
                  <div class="col-md-3">
                    Senior Project
                  </div>
                </div>
        	</div>


        </div>
    @endsection
