@extends('layouts.admin')

@section('title', 'Admin Dashboard')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12 mb-3">
                <h2>
                    {{ $project->title }}
                </h2>
                <p>
                    {{ $project->type->name }}
                </p>
            </div>
            <div class="col-12">

                <img src="{{ $project->project_image }}" alt="">

                <p class="pt-5">
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
                <a href="{{ route('admin.projects.edit', $project) }}" class="text-decoration-none">
                    <button class="btn btn-sm btn-success">
                        Edit
                    </button>
                </a>
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                    data-bs-target="#exampleModal-{{ $project->id }}">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal-{{ $project->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5 text-danger" id="exampleModalLabel">Deleting
                                    project...</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Do you really want to delete {{ $project->title }}?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                                <form class="d-inline-block" action="{{ route('admin.projects.destroy', $project) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">
                                        Delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                </p>
                </tr>
            </div>
        </div>
    </div>
@endsection
