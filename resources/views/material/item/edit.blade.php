@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edit</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-body">

                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>编辑失败</strong> 输入不符合要求<br><br>
                            {!! implode('<br>', $errors->all()) !!}
                        </div>
                    @endif

                        {!! Form::model($item, ['url' => 'material/item/reselect/'.$item->id,'method'=>'POST']) !!}
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Model:</strong>
                                    {!! Form::text('model', null, array('class' => 'form-control', 'required' => 'required')) !!}
                                </div>
                            </div>

                            {!! Form::hidden('supplier_id', $item->supplier_id) !!}
                            {!! Form::hidden('type_id', $item->type_id) !!}

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Material Type:</strong>
                                    <br/>
                                    @foreach($types as $id => $name)
                                        <label>{{ Form::checkbox('types[]', $id, in_array($id, $checks) ? true : false, array('class' => 'checkbox-inline')) }}
                                            {{ $name }}
                                        </label>
                                        &nbsp;
                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <a href="{{ url()->previous()}}" class="btn btn-danger">Cancel</a>
                                {{Form::submit('Submit', ['class' => 'btn btn-success pull-right'])}}
                            </div>
                        </div>
                        {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@endsection