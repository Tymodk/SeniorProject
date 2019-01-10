@extends('layouts.app')

@section('content')



    <div class="container-fluid justify-content-center text-center mt-5">
        <div class="row">
            <div class="col-md-4">
                <h2 class="text-center pt-3">Welkom {{Auth::user()->name}}!</h2>
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
    <div class="m-5">

            <a href="{!! route('user.list') !!}" class="btn btn-primary kdg mr-2">Mijn lessen</a>



    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Vandaag</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            @if(count($classesToday) > 0)
            <table class="table   text-center p-5">

                <thead style="background-color: black;color: white;">
                <tr>
                    <th scope="col">Status</th>
                    <th scope="col">Uur</th>
                    <th scope="col">Vak</th>
                    <th scope="col">Starten / bekijken</th>
                </tr>
                </thead>
                <tbody>
                <tr style="border: none">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

                    @foreach ($classesToday as $class)
                        <tr>
                            @if($class->active == 1)
                                <td><i class="fas fa-satellite-dish text-success"></i></td>
                            @else
                                <td class="text-left"><a href="{!! route('user.editClass',['id'=>$class->id]) !!}"
                                                         class="btn btn-warning">Wijzig <i class="far
                                            fa-edit"> </i></a></td>
                            @endif
                            <td>{{ date("H:i", strtotime($class->start_time)) }}
                                - {{ date("H:i", strtotime($class->end_time)) }}</td>
                            <td>{{ $class->course->name }}</td>
                            @if($class->active == 1)
                                <td>
                                    <a href="{!! route('user.overview') !!}" class="btn btn-success active btn-block ">Bekijk
                                    resultaten</a>

                                </td>
                            @else
                                <td>
                                    <form action="{!! route('user.start-course') !!}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{$class->id}}" name="classid">
                                        <button type="submit" class="btn btn-outline-success btn-block"> Les starten
                                        </button>
                                    </form>

                                </td>
                            @endif

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
        <h3 class=" m-5 "><strong>Komende dagen</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>
                @if(count($classesThisWeek) > 0)
                    @foreach ($classesThisWeek as $class)
                        <tr>
                            <td class="text-left"><a href="{!! route('user.editClass',['id'=>$class->id]) !!}"
                                                     class="btn btn-warning">Wijzig <i class="far
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
