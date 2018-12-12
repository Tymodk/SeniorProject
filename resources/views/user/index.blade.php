@extends('layouts.app')

@section('content')

<h1>Komende lessen</h1>



    @foreach($classes as $class)
    <p>{{$class->start_time}}</p>
    @endforeach

    <div class="container" v-for="course in courses">
        <p>test</p>
        <p>@{{ course.start_time }}</p>
    </div>


<test-component>

</test-component>
@endsection

@push('scripts')
        <script>

            const app = new Vue({
                el:'#app',
                data: {
                    courses:{},
                    item:'nothing',

                },
                mounted(){
                        this.getClasses();
                },
                methods:
                    {
                        getClasses(){
                            axios.get('/api/my-classes')
                                .then(response => {
                                    this.courses = response.data;
                                    console.log(response.data);
                                })
                                .catch(function (error) {

                                });
                        }
                    }
            })
        </script>
    @endpush
