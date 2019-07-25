@extends('admin.layouts.app')

@section('title')

@endsection

@section('header')

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
                        <button type="submit" class="btn btn-primary"><a style="color: white"
                                                                         href="{{route('admin.charity.dashboard')}}">add
                                new case</a></button>

                        <!-- /.box-header -->
                        <div class="box-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>

                                <tr>
                                    <th>id</th>
                                    <th>descriptions</th>
                                    <th>amount</th>
                                    <th>Current amount</th>
                                    <th>delete</th>
                                    <th>update</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cases as $case)
                                    <tr>
                                        <td>{{$case->id}}</td>
                                        <td>{{$case->description}}</td>
                                        <td>{{$case->amount}}</td>
                                        <td>{{$case->current_amount}}</td>
                                        <th>
                                            <form id="form" method="POST"
                                                  action="{{route('deleteCase.charity',$case->id)}}">
                                                @csrf
                                                <button type="submit" name="archive" class="btn btn-danger"
                                                        onclick="archiveFunction()">Delete
                                                </button>
                                            </form>
                                        </th>
                                        <th>
                                            <button type="submit" class="btn btn-primary"><a style="color: white"
                                                                                             href="{{route('updateCaseView.charity',$case->id)}}">edit</a>
                                            </button>
                                        </th>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>id</th>
                                    <th>descriptions</th>
                                    <th>amount</th>
                                    <th>Current amount</th>
                                    <th>delete</th>
                                    <th>update</th>

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
