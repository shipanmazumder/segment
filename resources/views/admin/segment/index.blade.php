@extends('admin.layout.default')
@section('title_area')
    Segment
@endsection
@section('main_section')
    <div class="content">
        @if(Session::has('message'))
            <div class="alert alert-{{Session::get("class")}}">{{Session::get("message")}}</div>
        @endif
        <div class="container">
            <div class="row">
                <form action="{{route('segment.store')}}" method="POST">
                    @csrf
                    <div class="col-sm-12">
                        <div class="panel-group panel-group-joined" id="accordion-test">
                            <div class="panel panel-border panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordion-test" href="#collapseOne" class="collapsed">
                                            segment
                                        </a>
                                    </h3>
                                </div>
                                <div id="collapseOne" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="name">Segment</label><small class="req">*</small>
                                                <input required   name="name" placeholder="Segment Name" type="text" class="form-control" id="name">
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div id="and_part">
                                            <div class="and_append" id="1">
                                                <div class="col-sm-12">
                                                    <input type="hidden" name="group_set[]" required>
                                                    <fieldset>
                                                        <legend>Date Logic:</legend>
                                                        <div id="date_part" class="date_part">
                                                            <div class="date_append">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="field_name">Field Name</label><code>*</code>
                                                                        <select name="field_name_1[]" id="field_name" required class="form-control selectpicker">
                                                                            <option value="">--Select--</option>
                                                                            <option value="created_at">Created at</option>
                                                                            <option value="updated_at">Updated at</option>
                                                                            <option value="birthday">Birthday</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="logic_type">Logic Type</label><code>*</code>
                                                                        <select name="logic_type_1[]" id="logic_type" required class="form-control selectpicker logic_type">
                                                                            <option value="">--Select--</option>
                                                                            <option value="before">Before</option>
                                                                            <option value="on">On</option>
                                                                            <option value="after">After</option>
                                                                            <option value="on_or_before">On Or Before</option>
                                                                            <option value="on_or_after">On Or After</option>
                                                                            <option value="between">Between</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3 date_value_header" style="display: none">
                                                                    <div class="form-group">
                                                                        <label for="value">Value</label><code>*</code>
                                                                        <input type="text" name="value_2_1[]" class="form-control date_value_2" id="date_value_2" placeholder="Ex:2020-05-02"  autocomplete="off">
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label for="value">Value</label><code>*</code>
                                                                        <div class="input-group">
                                                                            <input type="text" name="value_1[]" required class="form-control date_value_1" id="date_value_1" placeholder="Ex:2020-05-02" required autocomplete="off">
                                                                            <div class="input-group-btn">
                                                                                <button class="btn btn-info date_add_button" id="date_add_button" type="button">
                                                                                    <i class="md md-add"></i> OR
                                                                                </button>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-sm-12">
                                                    <fieldset>
                                                        <legend>Text Logic:</legend>
                                                        <div id="text_part">
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="field_name">Field Name</label><code>*</code>
                                                                    <select name="field_name_1[]" id="field_name" required class="form-control selectpicker">
                                                                        <option value="">--Select--</option>
                                                                        <option value="first_name">First Name</option>
                                                                        <option value="last_name">Last Name</option>
                                                                        <option value="email">Email</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="logic_type">Logic Type</label><code>*</code>
                                                                    <select name="logic_type_1[]" id="logic_type" required class="form-control selectpicker">
                                                                        <option value="">--Select--</option>
                                                                        <option value="is">Is</option>
                                                                        <option value="is_not">Is Not</option>
                                                                        <option value="starts_with">Starts With</option>
                                                                        <option value="ends_with">End With</option>
                                                                        <option value="contains">Contains</option>
                                                                        <option value="doesnot_starts_with">Does Not Starts With</option>
                                                                        <option value="doesnot_end_with">Does Not Ends With</option>
                                                                        <option value="doesnot_contains">Does Not Contains</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <div class="form-group">
                                                                    <label for="value">Value</label><code>*</code>
                                                                    <div class="input-group">
                                                                        <input type="text" name="value_1[]" class="form-control text_value" id="text_value" placeholder="Your Value">
                                                                        <div class="input-group-btn">
                                                                            <button class="btn btn-info text_add_button" id="text_add_button" type="button">
                                                                                <i class="md md-add"></i> OR
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="and_button_group_1">
                                                        <button type="button" class=" btn btn-success pull-right and_add_button"  id="and_add_button"> <i class="md md-add"></i> AND</button>
                                                    </div>
                                                </div>
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
                                segment View
                            </a>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">SL.</th>
                                            <th class="text-center">Segment Name</th>
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
        datePicker();
        function datePicker(){
            jQuery('.date_value_1,.date_value_2').datepicker({
                format: 'yyyy-mm-dd',
                todayBtn: true,
                todayHighlight: true,
                autoclose: true
            });
        }

        datatable();
        function datatable() {
            $("#datatable").DataTable({
            lengthMenu: [ 10, 25, 50, 75, 100,500],
            responsive: true,
            autoWidth :false,
            processing:true,
            serverSide:true,
            ordering:false,
            ajax:{
                url:"{{route('segment.view')}}"
            },
            columns:[
                    { data: 'DT_RowIndex', name: 'DT_RowIndex' },
                    { "data": "name" },
            ]
            });
        }
        var date_part=$("#and_part").find(".date_part");
        $("#and_part").on("change",'#logic_type',function(){
            if($(this).val()=="between")
            {
                $(this).closest('.date_append').find(".date_value_header").show();
            }else{

                $(this).closest('.date_append').find(".date_value_header").hide();
            }
        });

    });
</script>
<script>
	$(document).ready(function() {
		var maxField = 5; //Input fields increment limitation
		var addButton = $('.and_append  .date_add_button'); //Add button selector
		var wrapper = $('.and_append  .date_part'); //Input field wrapper
        var x = 1; //Initial field counter is 1

		//Once add button is clicked
		$("#and_part").on("click",'.date_add_button',function() {
			if (x < maxField) {
                x++;
                var id = $(this).closest(".and_append").attr("id");
                var row= dateAppendRow(id);
                $(this).closest('.and_append').find("#date_part").append(row);
                $(".selectpicker").selectpicker('render').selectpicker('refresh');
                 $(".date_value_1,.date_value_2").datepicker("refresh");
			}

		});

		//Once remove button is clicked
		$("#and_part").on('click', '.date_remove_button', function(e) {
            e.preventDefault();

			$(this).closest('.date_append').remove(); //Remove field html
            $(".selectpicker").selectpicker('render').selectpicker('refresh');
            $(".date_value_1,.date_value_2").datepicker("refresh");
			x--; //Decrement field counter
        });

        function dateAppendRow(x){
            var row = "";
                row+='<div class="col-sm-12">'
                row += '<div class="date_append">';
                    row += '<div class="col-sm-3">';
                        row += '<div class="form-group">';
                            row += '<label for="field_name">Field Name</label><code>*</code>';
                            row += '<select name="field_name_'+x+'[]" id="field_name" required class="form-control selectpicker">';
                                row += '<option value="">--Select--</option>';
                                row += '<option value="created_at">Created at</option>';
                                row += '<option value="updated_at">Updated at</option>';
                                row += '<option value="birthday">Birthday</option>';
                            row += '</select>';
                        row += '</div>';
                    row += '</div>';
                    row += '<div class="col-sm-3">';
                        row += '<div class="form-group">';
                            row += '<label for="logic_type">Logic Type</label><code>*</code>';
                            row += '<select name="logic_type_'+x+'[]" id="logic_type" required class="form-control selectpicker logic_type">';
                                row += '<option value="">--Select--</option>';
                                row += '<option value="before">Before</option>';
                                row += '<option value="on">On</option>';
                                row += '<option value="after">After</option>';
                                row += '<option value="on_or_before">On Or Before</option>';
                                row += '<option value="on_or_after">On Or After</option>';
                                row += '<option value="between">Between</option>';
                            row += '</select>';
                        row += '</div>';
                    row += '</div>';
                    row += '<div class="col-sm-3 date_value_header" style="display:none">';
                        row += '<div class="form-group">';
                            row += '<label for="value">Value</label><code>*</code>';
                            row += '<input type="text" name="value_2_'+x+'[]" class="form-control date_value_2" id="date_value_2" placeholder="Ex:2020-05-02"  autocomplete="off">';
                        row += '</div>';
                    row += '</div>';
                    row += '<div class="col-sm-3">';
                        row += '<div class="form-group">';
                            row += '<label for="value">Value</label><code>*</code>';
                            row += '<div class="input-group">';
                                row += '<input type="text" name="value_'+x+'[]" class="form-control date_value_1" id="date_value_1" placeholder="Ex:2020-05-02" required autocomplete="off">';
                                row += '<div class="input-group-btn">';
                                    row += '<button class="btn btn-danger date_remove_button" id="date_remove_button"  type="button">';
                                        row += '<i class="fa fa-minus"></i>';
                                    row += '</button>';
                                row += '</div>';
                            row += '</div>';
                        row += '</div>';
                row += '</div>';
                row += '</div>';
                row += '</div>';
            return row;
        }
	});
</script>
<script>
	$(document).ready(function() {
		var maxField = 5; //Input fields increment limitation
        var x = 1; //Initial field counter is 1

		//Once add button is clicked
		$("#and_part").on("click",'.text_add_button',function() {
			if (x < maxField) {
                x++;
                var id = $(this).closest(".and_append").attr("id");
                var row=textRowAppend(id);
                $(this).closest('.and_append').find("#text_part").append(row);
			    $(".selectpicker").selectpicker('render').selectpicker('refresh');
			}
		});

		//Once remove button is clicked
		$("#and_part").on('click', '.text_remove_button', function(e) {
            e.preventDefault();
			$(this).closest('.text_append').remove(); //Remove field html
			$(".selectpicker").selectpicker('render').selectpicker('refresh');
			x--; //Decrement field counter
        });
        function textRowAppend(x){
            var row = "";
                row += '<div class="text_append">';
                    row += '<div class="col-sm-4">';
                        row += '<div class="form-group">';
                            row += '<label for="field_name">Field Name</label><code>*</code>';
                            row += '<select name="field_name_'+x+'[]" id="field_name" required class="form-control selectpicker">';
                                row += '<option value="">--Select--</option>';
                                row += '<option value="first_name">First Name</option>';
                                row += '<option value="last_name">Last Name</option>';
                                row += '<option value="email">Email</option>';
                            row += '</select>';
                        row += '</div>';
                    row += '</div>';
                    row += '<div class="col-sm-4">';
                        row += '<div class="form-group">';
                            row += '<label for="logic_type">Logic Type</label><code>*</code>';
                            row += '<select name="logic_type_'+x+'[]" id="logic_type" required class="form-control selectpicker">';
                                row += '<option value="">--Select--</option>';
                                row += '<option value="is">Is</option>';
                                row += '<option value="is_not">Is Not</option>';
                                row += '<option value="starts_with">Starts With</option>';
                                row += '<option value="ends_with">End With</option>';
                                row += '<option value="contains">Contains</option>';
                                row += '<option value="doesnot_starts_with">Does Not Starts With</option>';
                                row += '<option value="doesnot_end_with">Does Not Ends With</option>';
                                row += '<option value="doesnot_contains">Does Not Contains</option>';
                            row += '</select>';
                        row += '</div>';
                    row += '</div>';
                    row += '<div class="col-sm-4">';
                        row += '<div class="form-group">';
                            row += '<label for="value">Value</label><code>*</code>';
                            row += '<div class="input-group">';
                                row += '<input type="text" name="value_'+x+'[]" class="form-control text_value" id="text_value" placeholder="Your Value">';
                                row += '<div class="input-group-btn">';
                                    row += '<button class="btn btn-danger text_remove_button" id="text_remove_button"  type="button">';
                                        row += '<i class="fa fa-minus"></i>';
                                    row += '</button>';
                                row += '</div>';
                            row += '</div>';
                        row += '</div>';
                row += '</div>';
                row += '</div>';
                return row;
        }
	});
</script>
<script>
	$(document).ready(function() {
		var maxField = 5; //Input fields increment limitation
		var addButton = $('.and_add_button'); //Add button selector
		var wrapper = $('#and_part'); //Input field wrapper
        var x = 1; //Initial field counter is 1

		//Once add button is clicked
		$("#and_part").on("click",'.and_add_button',function() {
			if (x < maxField) {
                $(".and_button_group_"+x).hide();
                x++;
                andRowAppend(x);
			    $(".selectpicker").selectpicker('render').selectpicker('refresh');
                $(".date_value_1,.date_value_2").datepicker("refresh");
            }

		});

		//Once remove button is clicked
		$(wrapper).on('click', '.and_remove_button', function(e) {
            e.preventDefault();
            $(".date_value_1,.date_value_2").datepicker("refresh");
			$(this).closest('.and_append').remove(); //Remove field html
			$(".selectpicker").selectpicker('render').selectpicker('refresh');
            x--; //Decrement field counter
            $(".and_button_group_"+x).show();
        });

        function andRowAppend(x){
            var row = "";
                row += '<div class="and_append" id="'+x+'">';
                    row += '<div class="col-sm-12">';
                        row += '<input type="hidden" name="group_set[]" required>';
                        row += '<fieldset>';
                            row += '<legend>Date Logic:</legend>';
                            row += '<div id="date_part" class="date_part">';
                                row += '<div class="date_append">';
                                    row += '<div class="col-sm-3">';
                                        row += '<div class="form-group">';
                                            row += '<label for="field_name">Field Name</label><code>*</code>';
                                            row += '<select name="field_name_'+x+'[]" id="field_name" required class="form-control selectpicker">';
                                                row += '<option value="">--Select--</option>';
                                                row += '<option value="created_at">Created at</option>';
                                                row += '<option value="updated_at">Updated at</option>';
                                                row += '<option value="birthday">Birthday</option>';
                                            row += '</select>';
                                        row += '</div>';
                                    row += '</div>';
                                    row += '<div class="col-sm-3">';
                                        row += '<div class="form-group">';
                                            row += '<label for="logic_type">Logic Type</label><code>*</code>';
                                            row += '<select name="logic_type_'+x+'[]" id="logic_type" required class="form-control selectpicker logic_type">';
                                                row += '<option value="">--Select--</option>';
                                                row += '<option value="before">Before</option>';
                                                row += '<option value="on">On</option>';
                                                row += '<option value="after">After</option>';
                                                row += '<option value="on_or_before">On Or Before</option>';
                                                row += '<option value="on_or_after">On Or After</option>';
                                                row += '<option value="between">Between</option>';
                                            row += '</select>';
                                        row += '</div>';
                                    row += '</div>';
                                    row += '<div class="col-sm-3 date_value_header" style="display: none">';
                                        row += '<div class="form-group">';
                                            row += '<label for="value">Value</label><code>*</code>';
                                            row += '<input type="text" name="value_2_'+x+'[]" class="form-control date_value_2" id="date_value_2" placeholder="Ex:2020-05-02"  autocomplete="off">';
                                        row += '</div>';
                                    row += '</div>';
                                    row += '<div class="col-sm-3">';
                                        row += '<div class="form-group">';
                                            row += '<label for="value">Value</label><code>*</code>';
                                            row += '<div class="input-group">';
                                                row += '<input type="text" name="value_'+x+'[]" required class="form-control date_value_1" id="date_value_1" placeholder="Ex:2020-05-02" required autocomplete="off">';
                                                row += '<div class="input-group-btn">';
                                                    row += '<button class="btn btn-info date_add_button" id="date_add_button" type="button">';
                                                        row += '<i class="md md-add"></i> OR';
                                                    row += '</button>';
                                                row += '</div>';
                                            row += '</div>';
                                        row += '</div>';
                                    row += '</div>';
                                row += '</div>';
                            row += '</div>';
                    row += ' </fieldset>';
                row += ' </div>';
                    row += '<div class="col-sm-12">';
                        row += '<fieldset>';
                            row += '<legend>Text Logic:</legend>';
                            row += '<div id="text_part">';
                                row += '<div class="col-sm-4">';
                                    row += '<div class="form-group">';
                                        row += '<label for="field_name">Field Name</label><code>*</code>';
                                        row += '<select name="field_name_'+x+'[]" id="field_name" required class="form-control selectpicker">';
                                            row += '<option value="">--Select--</option>';
                                            row += '<option value="first_name">First Name</option>';
                                            row += '<option value="last_name">Last Name</option>';
                                            row += '<option value="email">Email</option>';
                                        row += '</select>';
                                    row += '</div>';
                                row += '</div>';
                                row += '<div class="col-sm-4">';
                                    row += '<div class="form-group">';
                                        row += '<label for="logic_type">Logic Type</label><code>*</code>';
                                        row += '<select name="logic_type_'+x+'[]" id="logic_type" required class="form-control selectpicker">';
                                            row += '<option value="">--Select--</option>';
                                            row += '<option value="is">Is</option>';
                                            row += '<option value="is_not">Is Not</option>';
                                            row += '<option value="starts_with">Starts With</option>';
                                            row += '<option value="ends_with">End With</option>';
                                            row += '<option value="contains">Contains</option>';
                                            row += '<option value="doesnot_starts_with">Does Not Starts With</option>';
                                            row += '<option value="doesnot_end_with">Does Not Ends With</option>';
                                            row += '<option value="doesnot_contains">Does Not Contains</option>';
                                        row += '</select>';
                                    row += '</div>';
                                row += '</div>';
                                row += '<div class="col-sm-4">';
                                    row += '<div class="form-group">';
                                        row += '<label for="value">Value</label><code>*</code>';
                                        row += '<div class="input-group">';
                                            row += '<input type="text" name="value_'+x+'[]" class="form-control text_value" id="text_value" placeholder="Your Value">';
                                            row += '<div class="input-group-btn">';
                                                row += '<button class="btn btn-info text_add_button" id="text_add_button" type="button">';
                                                    row += '<i class="md md-add"></i> OR';
                                            row += ' </button>';
                                            row += '</div>';
                                        row += '</div>';
                                    row += '</div>';
                                row += '</div>';
                            row += '</div>';
                        row += '</fieldset>';
                    row += '</div>';
                    row += '<div class="col-md-12">';
                        row += '<div class="and_button_group_'+x+'">';
                        row += '<button type="button" class=" btn btn-success pull-right and_add_button" style="margin-left:5px"  id="and_add_button"> <i class="md md-add"></i> AND</button>';
                        row += '<button type="button" class=" btn btn-danger pull-right and_remove_button"  id="and_remove_button"> <i class="fa fa-minus"></i></button>';
                        row += '</div>';
                    row += '</div>';
                row += '</div>';

                $(wrapper).append(row);
        }
	});
</script>

@endpush
