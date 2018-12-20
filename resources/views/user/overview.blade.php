@extends('layouts.app')

@section('content')

    <div class="container">


        <h3>Present</h3>


    </div>
<presence classid="{{json_encode($class->id)}}"  ></presence>

    <!-- :classid={{json_encode($class)}} -->
@endsection
