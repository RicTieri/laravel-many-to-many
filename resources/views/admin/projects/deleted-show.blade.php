@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>
                    {{ $project->title }} -- <em> (deleted) </em>
                </h2>
            </div>
            <div class="col-12">
                <h2 scope="row">
                    {{ $project->id }}
                </h2>

                <img src="{{ $project->project_image }}" alt="">

                <p>
                    {{ $project->author }}
                </p>
                <p>
                    {{ $project->date }}
                </p>
                <div class="p-5">
                    <p>
                        <em>
                            {{ $project->content }}
                        </em>
                    </p>
                </div>
                </p>
                </tr>
            </div>
        </div>
    </div>
@endsection
