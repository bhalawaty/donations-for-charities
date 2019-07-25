@extends('admin.layouts.app')

@section('title')

@endsection

@section('content')

    <section class="content-header">

        <section class="content-header">
            <h1>
                Data Tables
                <small>advanced tables</small>
            </h1>
            <ol class="breadcrumb">
                <li class="active">All Cases</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Hover Data Table</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>

                                <tr>
                                    <th>id</th>
                                    <th>descriptions</th>
                                    <th>amount</th>
                                    <th>Current amount</th>

                                </tr>
                                </thead>
                                <tbody>

                                {{--                                @foreach($cases as $case)--}}
                                {{--                                    <tr>--}}
                                {{--                                        <td>{{$case->id}}</td>--}}
                                {{--                                        <td>{{$case->description}}</td>--}}
                                {{--                                        <td>{{$case->amount}}</td>--}}
                                {{--                                        <td>{{$case->current_amount}}</td>--}}

                                {{--                                    </tr>--}}
                                {{--                                @endforeach--}}


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>descriptions</th>
                                    <th>amount</th>
                                    <th>Current amount</th>


                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->


                    <!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>

    </section>


@endsection

@section('footer')

    {!! Html::script('admins/bower_components/datatables.net/js/jquery.dataTables.min.js') !!}

    {!! Html::script('admins/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}

    <!-- page script -->
    <script>
        $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        })
    </script>
@endsection
