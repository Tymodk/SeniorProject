@extends('layouts.app')

@section('content')


    <div class="container-fluid justify-content-center text-center mt-5">
        <div class="row">
            <div class="col-md-4">
        <h2 class="text-center pt-3">Welcome {{ $user->name }}!</h2>
            </div>
            <div class="col-md-4">
            <h2 class="text-center"> <p>{{ date("H:i") }}</p>  <p>{{ date("d/m/Y") }}</p> </h2>
            </div>
            <div class="col-md-4">
                <h2 class="pull-right  active">Volgende les start in {{ $interval->format("%d dagen, %h uur and %i minuten") }}.
                    <br><span><strong>{{ $firstClass->course->name }}</strong></span></h2>
            </div>
        </div>
    </div>

    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Vandaag</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                <?php foreach ($classesActive as $class): ?>
                  <tr>
                    <td><i class="fas fa-satellite-dish text-success"></i></td>
                    <td>{{ date("H:i", strtotime($class->start_time)) }} - {{ date("H:i", strtotime($class->end_time)) }}</td>
                    <td>{{ $class->course->name }}</td>
                    <td style="max-width: 15px"><a href="" class="btn btn-success active btn-block ">Bekijk
                            resultaten</a></td>
                  </tr>
                <?php endforeach; ?>

                <?php foreach ($classesToday as $class): ?>
                  <tr>
                      <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                      <td>{{ date("H:i", strtotime($class->start_time)) }} - {{ date("H:i", strtotime($class->end_time)) }}</td>
                      <td>{{ $class->course->name }}</td>
                      <td><a href="" class="btn btn-outline-success btn-block">Les starten</a></td>
                  </tr>
                <?php endforeach; ?>
                </tbody>
            </table>


        </div>

    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>This Week</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                  <?php foreach ($classesThisWeek as $class): ?>
                    <tr>
                        <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                        <td><?php setlocale(LC_ALL, 'nl_NL'); echo date("l", strtotime($class->start_time)) ?></td>
                        <td>{{ date("H:i", strtotime($class->start_time)) }} - {{ date("H:i", strtotime($class->end_time)) }}</td>
                        <td>{{ $class->course->name }}</td>
                    </tr>
                  <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
@endsection
