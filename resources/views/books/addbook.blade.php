@extends('layout.books')

@section('main')

<div class="col-sm-4 mt-5 pt-5 mx-auto">
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('storage') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($message = Session::get('success'))
                            <div class="alert alert-success alert block">
                                <strong>{{ $message }}</strong>
                            </div>
                    @endif
                    <h1 class="h4 text-center">Add Book</h1>
                <div class="mt-3">
                    <input type="text" class="form-control" id="title" name="title" placeholder="Book Title" value="{{ old('title') }}" required autofocus/>
                    @if($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="text" class="form-control" id="author" name="author" placeholder="Author" value="{{ old('author') }}" required />
                    @if($errors->has('author'))
                            <span class="text-danger">{{ $errors->first('author') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="text" class="form-control" id="yearbook" name="yearbook" placeholder="Year" value="{{ old('yearbook') }}" required/>
                    @if($errors->has('yearbook'))
                            <span class="text-danger">{{ $errors->first('yearbook') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary px-4 mt-2 mb-3 fw-bold form-control" style="background-color: #3f301d;">Add Book</button>
                </div>
                </form>
            </div>
    </div>
</div>

@endsection