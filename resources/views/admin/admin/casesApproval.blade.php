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
                            <h3></h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover" style="text-align: center">
                                <thead>

                                <tr>
                                    <th>id</th>
                                    <th>amount</th>
                                    <th>user name</th>
                                    <th>state name</th>
                                    <th colspan="2">approval</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($donates as $donate)
                                    <tr>
                                        <td>{{$donate->id}}</td>
                                        <td>{{$donate->amount}}</td>
                                        <td>{{$donate->user->name}}</td>
                                        <td>{{$donate->state->charity->name}}</td>

                                        <td>
                                            <form id="form" method="POST"
                                                  action="{{route('approve.donate',$donate->id)}}">
                                                @csrf
                                                <button type="submit" name="archive" class="btn btn-success"
                                                    {{$donate->approval == 1? 'disabled':''}} >approve
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form id="form" method="POST"
                                                  action="{{route('reject.donate',$donate->id)}}">
                                                @csrf
                                                <button type="submit" name="archive" class="btn btn-danger"
                                                >reject
                                                </button>
                                            </form>
                                        </td>

                                @endforeach


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>amount</th>
                                    <th>user name</th>
                                    <th>state name</th>
                                    <th>approval</th>


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
    <script>
        function archiveFunction() {
            event.preventDefault(); // prevent form submit
            var form = event.target.form; // storing the form
            swal({
                title: "Are you sure?",
                text: "Are you sure to delete this case u will not be able to retrieve it.",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((isConfirm) => {
                if (isConfirm) {
                    form.submit();          // submitting the form when user press yes
                } else {
                    swal("Cancelled", "Your case is safe :)", "error");
                }
            });
        }
    </script>
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
