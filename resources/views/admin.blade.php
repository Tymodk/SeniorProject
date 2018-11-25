@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5 mb-5 text-dark">ADMIN PANEL</h1>
	<h2>Crud links</h2>
    <a class="btn btn-outline-primary" href="/admin/teachers">
        Teachers <span class="badge badge-light">{{ $info[0] }}</span>
    </a>
    <a class="btn btn-outline-primary" href="/admin/students">
        students <span class="badge badge-light">{{ $info[1] }}</span>
    </a>
    <a class="btn btn-outline-primary" href="/admin/courses">
        courses <span class="badge badge-light">{{ $info[2] }}</span>
    </a>
</div>
@endsection
