@extends('layouts.app')

@section('content')



    <div class="container-fluid justify-content-center text-center mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center pt-3">Welkom Sam!</h2>
            </div>
            <div class="col-md-4">
                <h2 id="time"></h2>
                <h2 id="date"></h2>
            </div>
            <div class="col-md-4">
                @if(isset($next))
                    <h2 class="pull-right  active">Volgende les start
                        in {{$next->diffTime()}} minuten.
                        <br><span><strong>{{ $next->course->name }}</strong></span></h2>
                @else
                    <h2 class="pull-right  active">Geen les meer vandaag
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <a href="{!! route('user.list') !!}" class="btn btn-primary kdg mr-2">Mijn lessen</a>
            <a href="{!! route('user.archive') !!}" class="btn btn-primary kdg">Mijn archief</a>

        </div>
    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Vandaag</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">

                <thead></thead>
                <tbody>
                @if(!empty($classesActive))
                    @foreach ($classesActive as $class)
                        <tr>
                            @if($class->active == 1)
                                <td class="text-left" style="width: 10%"><i
                                        class="fas fa-satellite-dish text-success"></i></td>
                            @else
                                <td><a href="" class="btn btn-warning">Wijzig deze les</a></td>
                            @endif
                            <td>{{ date("H:i", strtotime($class->start_time)) }}
                                - {{ date("H:i", strtotime($class->end_time)) }}</td>
                            <td>{{ $class->course->name }}</td>
                            <td style="max-width: 15px">
                                <a href="{!! route('user.overview') !!}" class="btn btn-success active btn-block ">Bekijk
                                    resultaten</a>
                            </td>
                        </tr>
                    @endforeach
                @endif
                @if(count($classesToday) > 0)
                    @foreach ($classesToday as $class)
                        <tr>
                            @if($class->active == 1)
                                <td><i class="fas fa-satellite-dish text-success"></i></td>
                            @else
                                <td class="text-left"><a href="" class="btn btn-warning">Wijzig <i class="far
                                            fa-edit"> </i></a></td>
                            @endif
                            <td>{{ date("H:i", strtotime($class->start_time)) }}
                                - {{ date("H:i", strtotime($class->end_time)) }}</td>
                            <td>{{ $class->course->name }}</td>
                            <td><a href="" class="btn btn-outline-success btn-block">Les starten</a></td>
                        </tr>
                    @endforeach
                @else
                    <p>Geen lessen vandaag</p>
                @endif

                </tbody>
            </table>

        </div>
    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Deze week</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                @if(count($classesThisWeek) > 0)
                    @foreach ($classesThisWeek as $class)
                        <tr>
                            <td class="text-left"><a href="" class="btn btn-warning">Wijzig <i class="far
                                            fa-edit"> </i></a></td>
                            <td><?php setlocale(LC_ALL, 'nld_nld'); echo strftime('%A', strtotime($class->start_time));   ?></td>
                            <td>{{ date("H:i", strtotime($class->start_time)) }}
                                - {{ date("H:i", strtotime($class->end_time)) }}</td>
                            <td>{{ $class->course->name }}</td>
                        </tr>
                    @endforeach
                @else
                    <p>Geen lessen deze week</p>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript">
        $(document).ready()
        var time = new Date().toLocaleTimeString();
        var date = new Date().toLocaleDateString();
        var timer = setInterval(timer, 1000);


        function timer() {
            $('#time').html(time);
            $('#date').html(date);

        }
    </script>
@endpush
