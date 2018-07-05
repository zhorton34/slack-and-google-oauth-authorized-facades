@extends('spark::layouts.app')


@section('content')


    @foreach($list as $id => $name)
        <div class="card">
            <div class="card-header">
                {{ $name }}
            </div>
            <div class="card-body">
                {{ $id }}
            </div>
        </div>
    @endforeach

@endsection
