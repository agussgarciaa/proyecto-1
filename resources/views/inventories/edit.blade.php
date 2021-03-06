@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Edit an Inventory') }}</div>

                <div class="card-body">
                    <form method="POST" action="/inventories/{{$inventory->id}}">
                        @method('PATCH')
                        @csrf 

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('Inventory Title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}" name="title"  value="{{$inventory->title}}" required autofocus>

                                @if ($errors->has('title'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="estado" class="col-md-4 col-form-label text-md-right">Status</label>
                            @if ($inventory->public_status==1)
                            <div class="col-md-6">
                                <input type="radio" name="public_status" value=1 checked> Public<br>
                                <input type="radio" name="public_status" value=0 > Private<br>
                            </div>
                            @else
                            <div class="col-md-6">
                                <input type="radio" name="public_status" value=1 > Public<br>
                                <input type="radio" name="public_status" value=0 checked> Private<br>
                            </div>
                            @endif
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Edit') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
