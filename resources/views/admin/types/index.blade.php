@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="text-center pb-3">Projects</h1>
                    <a href="{{route('admin.projects.create')}}" class="text-decoration-none btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i>
                    </a>
                </div>
            </div>
            <div class="col-6 col-md-12">
                <table class="table table-striped mx-auto">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Tools</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($types as $type)
                            <tr>
                                <td class="fw-bold">{{$type->id}}</td>
                                <td class="text-capitalize fst-italic">{{$type->name}}</td>
                                <td class="d-flex align-items-center">  
                                    <a href="{{route('admin.types.edit', ['type' => $type->id])}}" class="btn btn-sm btn-warning mx-2">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <form action="" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger project-remove" data-proj="{{$type->name}}"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @include('admin.projects.partials.modal_del')
@endsection