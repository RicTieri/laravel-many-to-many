@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
    <div class="container pt-5">
        <div class="row p-5">
            <div class="col-12 text-center pt-5">
                <h2>
                    Welcome to your Admin dashboard, {{ Auth::user()->name }}
                </h2>
            </div>
        </div>
    </div>
@endsection
