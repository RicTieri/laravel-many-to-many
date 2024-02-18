@extends('admin.projects.layouts.create-or-edit')

@section('page-title', 'Create new project')

@section('form-action')
    {{ route('admin.projects.store') }}
@endsection

@section('form-method')
    @method('POST')
@endsection
