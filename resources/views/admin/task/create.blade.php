@extends('layouts.main')
@section('container')
<div class="container">
        <form action="{{ route('task.store') }}" class="row g-3 p-5 shadow m-3" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="text-center">Form</div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="mb-3">
                    <label for="title" class="form-label">title</label>
                    <input type="text" class="form-control" name="title" id="title" aria-describedby="helpId"
                        placeholder="" required />
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name="description" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Sumbit</button>
            </div>
        </form>
    </div>

    @endsection