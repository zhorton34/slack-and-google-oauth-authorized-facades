@extends('spark::layouts.app')


@section('content')

    <home :user="user" inline-template>
        <div class="card">
            <div class="card-header">
            </div>

            <div class="card-body">
                <button class='btn btn-primary' @click="get">Get Spread Sheets</button>
            </div>
        </div>
    </home>

@endsection
