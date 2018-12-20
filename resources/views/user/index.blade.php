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
                    <h2 class="pull-right  active">Volgende les start in {{$next->diffTime()}} min.
                        <br><span><strong>{{($next->course->name)}}</strong></span></h2>
                @else
                    <h2 class="pull-right  active">Geen les meer vandaag
                    </h2>
                @endif
            </div>
        </div>
    </div>
    <div class="container">
    <a href="#" class="badge badge-secondary p-2"><strong >Mijn lessen</strong></a>
    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Vandaag</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>


                @if(count($today)>0)
                    @foreach($today as $class)
                        <tr>

                            @if($class->active)
                                <td><i class="fas fa-satellite-dish" style="color: green;"></i></td>
                            @else
                                <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>

                            @endif


                            <td>
                                {{$class->time()}}
                            </td>

                            <td>{{$class->course->name}}</td>
                            <td>A102 - IWT/PB-MT 3 WP a</td>
                            @if($class->active)
                                <td style="max-width: 15px">
                                    <a href="{!! route('user.overview') !!}" class="btn btn-success active btn-block ">Bekijk
                                        resultaten</a>
                                </td>

                            @else
                                <td><a href="" class="btn btn-outline-success btn-block">Les starten</a></td>
                            @endif
                        </tr>
                    @endforeach
                @endif

                </tbody>
            </table>


        </div>

    </div>
    <div class="mt-5 mb-5">
        <h3 class=" m-5 "><strong>Morgen</strong></h3>
        <div class="container-fluid m-0 pl-5 pr-5">
            <!-- start agenda -->
            <table class="table   text-center p-5">
                <thead></thead>
                <tbody>

                <tr>
                    <td><i class="fas fa-satellite-dish" style="color: lightgray;"></i></td>
                    <td>
                        9u-10u
                    </td>

                    <td>Senior Project</td>
                    <td>A102 - IWT/PB-MT 3 WP a</td>
                    <td><a href="" class="btn btn-outline-light btn-block">Les starten</a></td>
                </tr>
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



