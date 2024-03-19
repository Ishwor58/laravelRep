@extends('layouts.main')
@section('container')
    @if (Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container p-5">

        <div class="text-end"><a href="{{ route('task.create') }}" class="btn btn-primary mb-2">Create</a></div>
        <div class="table-responsive">
            <table class="table table-primary">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                   
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-md btn-primary">Edit</a>
                                <a href="{{ route('task.show', $task->id) }}" class="btn btn-md btn-warning">Show</a>
                                <a href="" class="btn btn-md btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $task->id }}">Delete</a>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog        ">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Are you Sure ??
                                            </div>
                                            <div class="modal-footer">
                                                <div class="modal-footer">
                                                    <form action="{{ route('task.destroy', $task->id) }}" method="POST"
                                                        enctype="multipart/form-data">
                                                        @method('delete')
                                                        @csrf
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" name="submit"
                                                            class="btn btn-danger">Delete</i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>    
                    @endforeach
                </tbody>
           
            </table>
            {{$tasks -> links()}}
        </div>
    </div>

    
@endsection

