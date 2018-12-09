@if($errors->any())

    <div class="alert alert-danger">
        <h5 class="m-0">

        </h5>


    </div>

    @foreach($errors->first('failures') as $test)
        {{$test}}
    @endforeach

@endif
@if (Session::has('message'))
    <div class="alert alert-success">
        <h5 class="m-0">
            {{ Session::get('message') }}
        </h5>
    </div>

@endif


