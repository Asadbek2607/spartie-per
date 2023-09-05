@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h2 class="text-center">Log In</h2>
            <form method="POST" action="/login">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="form-group mt-3">
                    <button style="cursor:pointer" type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                @include('partials.formerrors')
            </form>
        </div>
    </div>
</div>
@endsection
