@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif                
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">What would you like to know?</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form class="form-horizontal" action="{{ route('questions.store') }}" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="lg-col-2 col">
                                    <div class="form-group">
                                        <label for="title">question title</label>
                                        <input type="text" class="form-control" name="title" id="title">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">question description</label>
                                        <input type="text" class="form-control" name="description" id="description">
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" class="submit form-control btn-success" name="submit" id="submit">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
