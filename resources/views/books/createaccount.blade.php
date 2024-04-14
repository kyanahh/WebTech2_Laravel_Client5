@extends('layout.app')

@section('main')

<div class="col-sm-4 mt-5 pt-5 mx-auto">
    <div class="card shadow">
        <div class="card-body">
            <form action="{{ route('user') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if($errors->has('email') || $errors->has('password'))
                            <div class="alert alert-danger alert-block">
                                <strong>Invalid credentials</strong>
                            </div>
                    @endif
                    <h1 class="h4 text-center">Sign up</h1>
                <div class="mt-3">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus/>
                    @if($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required/>
                    @if($errors->has('email'))
                            <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    @if($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-primary px-4 mt-2 mb-3 fw-bold form-control" style="background-color: #3f301d;">Sign up</button>
                </div>
                <div class=" text-center">
                    <a class="text-decoration-none" href="{{ route('log') }}" style="color: #3f301d;">Already a member in Books? Login here.</a>
                </div>
                </form>
            </div>
    </div>
</div>

@endsection