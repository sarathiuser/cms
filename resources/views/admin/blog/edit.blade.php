@extends('layouts.app')
@section('content')
    <div class="container">
        <h1>Edit Page</h1>
        <form action="{{ route('blog.update', ['blog' => $model->id]) }}" method="post">
            {{ method_field('PUT') }}
            @include('admin.blog.partials.fields')
        </form>
    </div>
@endsection
@section('scripts')
@include('admin.blog.partials.scripts')
@endsection
