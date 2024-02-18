@extends('layouts.admin')

@section('head-title')
    @yield('page-title')
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-7">
                @include('partials.errors')

                <form action="@yield('form-action')" method="POST">
                    @csrf
                    @yield('form-method')

                    <div class="mb-3 input-group">
                        <label for="title" class="input-group-text">project title:</label>
                        <input class="form-control" type="text" name="title" id="title"
                            value="{{ old('title', $project->title) }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="author" class="input-group-text">Author:</label>
                        <input class="form-control" type="text" name="author" id="author"
                            value="{{ old('author', $project->author) }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="date" class="input-group-text">Date:</label>
                        <input class="form-control" type="date" name="date" id="date"
                            value="{{ old('date', $project->date) }}">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="project_image" class="input-group-text">project image url:</label>
                        <input class="form-control" type="text" name="project_image" id="project_image"
                            value="{{ old('project_image', $project->project_image) }}">
                    </div>
                    <div class="mb-3 input-group">
                        <img src="" alt="Image preview" class="d-none img-fluid" id="image-preview">
                    </div>

                    <div class="mb-3 input-group">
                        <label for="content" class="input-group-text">project content:</label>
                        <textarea class="form-control" name="content" id="content" cols="30" rows="10">{{ old('content', $project->content) }}</textarea>
                    </div>
                    <div class="mb-3 input-group">
                        <button type="submit" class="btn btn-xl btn-primary">
                            @yield('page-title')
                        </button>
                        <button type="reset" class="btn btn-xl btn-warning">
                            Reset all fields
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('project_image').addEventListener('change', function(event) {
            const imageElement = document.getElementById('image-preview');
            imageElement.setAttribute('src', this.value);
            imageElement.classList.remove('d-none');
        });
    </script>
@endsection
