@extends('layouts.app')


@section('content')

    <div>
    <h1 class="text-center p-5">Oops, deze pagina werd niet gevonden!</h1>

       <h3 class="text-center "> <a href="{!! route('home') !!}" class="text-center text-dark btn btn-primary kdg">Keer hier terug</a></h3>
    </div>
    <h2>{{ $exception->getMessage() }}</h2>

@endsection
