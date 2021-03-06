@extends('layouts.app')

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('vendor/datatables-responsive/dataTables.responsive.css')}}" rel="stylesheet">
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

    @if (count($errors) > 0)
        <div class="alert alert-danger alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {!! implode('<br>', $errors->all()) !!}
        </div>
    @endif

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <a href="{{ url()->previous()}}" class="btn btn-primary">Back</a>
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <h2>Request</h2>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables2">
                        <thead>
                        <tr>
                            <th>
                                request
                            </th>
                            <th>
                                schedule
                            </th>
                            <th>
                                created_by
                            </th>
                            <th>
                                shipping fee
                            </th>
                            <th>
                                comment
                            </th>
                            {{--<th></th>--}}
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($requests as $dreq)
                            <tr>
                                <td>{{ $dreq->date }}</td>
                                <td>@if($dreq->getSchedule){{ $dreq->getSchedule->date}}@endif</td>
                                <td>@if($dreq->getCreated_by){{ $dreq->getCreated_by->name}}@endif</td>
                                <td>${{ $dreq->fee }}</td>
                                <td>{{ $dreq->comment }}</td>
                                {{--<td>--}}
                                    {{--@if($dreq->state<3)--}}
                                    {{--<a href="{{ url('appliance/delivery/request/'.$dreq->id.'/edit') }}" class="btn btn-success ">edit</a>--}}
                                    {{--@endif--}}
                                {{--</td>--}}
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <h2>History</h2>
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables">
                        <thead>
                        <tr>
                            <th>
                                carrier
                            </th>
                            <th>
                                created_by
                            </th>
                            <th>
                                created_at
                            </th>
                            <th>
                                packing slip
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($deliveries as $delivery)
                            <tr>
                                <td>{{ $delivery->carrier }}</td>
                                <td>@if($delivery->getCreated_by){{ $delivery->getCreated_by->name}}@endif</td>
                                <td>{{ $delivery->created_at }}</td>
                                <td><a href="{{ url('appliance/delivery/packing-slip/'.$delivery->id) }}" target="_blank" class="btn btn-primary ">view</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->

@endsection

@section('js')
    <!-- DataTables JavaScript -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{ asset('vendor/datatables-responsive/dataTables.responsive.js')}}"></script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                responsive: true,
//                order: [1, 'asc'],
                paging: false,
                searching: false
            });
            $('#dataTables2').DataTable({
                responsive: true,
//                order: [1, 'asc'],
                paging: false,
                searching: false
            });
        });
    </script>
@endsection