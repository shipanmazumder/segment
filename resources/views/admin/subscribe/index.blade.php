@extends('admin.layout.default')
@section('title_area')
    Subscribe
@endsection
@section('main_section')
    <div class="content">
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
        @endif
        <div class="container">
            <div class="row">
                <form action="{{route('subscribe.store')}}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="panel-group panel-group-joined" id="accordion-test">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                            Subscribe
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="first_name">First Name</label><small class="req">*</small>
                                                <input required   name="first_name" placeholder="First Name" type="text" class="form-control" id="first_name">
                                                @error('first_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="last_name">Last Name</label><small class="req">*</small>
                                                <input required   name="last_name" placeholder="Last Name" type="text" class="form-control" id="last_name">
                                                @error('last_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="email">Email</label><small class="req">*</small>
                                                <input required   name="email" placeholder="Email" type="email" class="form-control" id="email">
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="birthday">Birthday</label><small class="req">*</small>
                                                <input required   name="birthday" placeholder="Birthday" type="text" readonly class="form-control" id="birthday">
                                                @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group pull-left m-t-22">
                                                <input type="submit" class=" btn btn-primary pull-right" value="Save" name="submit" />
                                            </div>
                                        </div>
                                    </div> <!-- panel-body -->
                                </div>
                            </div> <!-- panel -->
                        </div>
                    </div> <!-- col -->
                </form>
            </div> <!-- End row -->
            <div class="row">
                <div class="panel panel-border panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                Subscribe View
                            </a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="segment_id">Segments</label><small class="req">*</small>
                                    <select name="segment_id" id="segment_id" class="form-control selectpicker">
                                        <option value="">--Select--</option>
                                        @if ($segments)
                                            @foreach ($segments as $key=>$value)
                                                <option value="{{$value->id}}">{{$value->name}}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL.</th>
                                            <th class="text-center">First Name</th>
                                            <th class="text-center">Last Name</th>
                                            <th class="text-center">Email</th>
                                            <th class="text-center">Birthday</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> <!-- panel -->
            </div> <!-- End row -->
        </div> <!-- container -->
    </div>
@endsection
@push('scripts')
<script src="{{asset('admin')}}/vendors/timepicker/bootstrap-datepicker.js"></script>
<script src="{{asset('admin')}}/vendors/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('admin')}}/vendors/datatables/dataTables.bootstrap.min.js"></script>
<script>
    $(document).ready(function() {
        var t;
        $("#segment_id").on("change",function(){
            $('#datatable').DataTable().clear().destroy();
            datatable();
            // $(this).submit();
        });
        jQuery('#birthday').datepicker({
            format: 'yyyy-mm-dd',
            todayBtn: true,
            todayHighlight: true,
            autoclose: true
        });

        datatable();
        function datatable() {
            var segment_id=$("#segment_id").val();
            t=$("#datatable").DataTable({
            lengthMenu: [ 10, 25, 50, 75, 100,500],
            responsive: true,
            autoWidth :false,
            processing:true,
            serverSide:true,
            ordering:false,
            ajax:{
                url:"{{url('subscribe/view?segment_id=')}}"+segment_id
            },
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { "data": "first_name" },
                    { "data": "last_name" },
                    { "data": "email" },
                    { "data": "birthday" }
            ]
            });
        }

    });
</script>
@endpush
