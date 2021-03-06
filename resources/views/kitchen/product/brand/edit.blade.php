@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit</div>
                    <div class="panel-body">

                        @if (count($errors) > 0)
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                {!! implode('<br>', $errors->all()) !!}
                            </div>
                        @endif
                        <div class="container-fluid">
                            {!! Form::model($brand, ['method' => 'PATCH','route' => ['brand.update', $brand->id]]) !!}
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <strong>Name:</strong>
                                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control', 'required' => 'required')) !!}
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <a href="{{ url()->previous()}}" class="btn btn-lg btn-danger">Go back</a>
                                    {{Form::submit('Submit', ['class' => 'btn btn-lg btn-primary pull-right'])}}
                                    {{--<button type="submit" class="btn btn-primary">Submit</button>--}}
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection