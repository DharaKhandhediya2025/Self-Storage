@extends('include.master')@section('title','Featured Plan')

@section('css')
    <style>
        .error{
            color:#f56954 !important;
            border-color:#f56954 !important;
        }

        .functionality_table thead {
            background: #2e3e4e;
            color: #fff;
        }

        .functionality_table thead th {
            padding: 8px;
            font-weight: 500;
            text-align: left;
        }

        .delete_row_btn {
            background: #dc3545;
            padding: 0 10px;
        }

        .delete_row_btn:hover {
            background: #dc3545;
        }

        .functionality_table .table_first_th {
            padding-right: 80px !important;
            text-align: center;
        }

        .functionality_table tbody tr {
            border: none;
        }

        .functionality_table tbody td {
            border: 4px solid #fff;
            background-color: #f9f9f9;
            padding: 8px;
            color: #6b6f82;
            text-align: left;
        }

        .add_row_btn {
            width: 100px;
            font-size: 13px;
            padding: 0;
            background-color: #0288d1 !important;
            font-weight: 500;
            margin-left: 15px;
        }

        .add_row_btn:hover {
            background-color: #0288d1 !important;
        }

        .add_row_btn i {
            font-size: 13px;
            padding-right: 5px;
        }

        @media(max-width:992px) {
            .functionality_table .table_first_th {
                padding-left: 10px !important;
            }

            .functionality_table thead th {
                text-align: left;
                height: 59px;
                line-height: 40px;
            }

            .functionality_table tbody td {
                text-align: left;
                height: 60px;
                line-height: 30px;
            }
            .description_span{
                display: block;
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <x-admin.form-header title="Featured Plan" subtitle="Featured Plan"></x-admin.form-header>
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s12">
                            <div id="validations" class="card card-tabs">
                                <div class="card-content">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col s12 m6 l10">
                                                @if(isset($featured_plans->id) && $featured_plans->id > 0)
                                                    <h4 class="card-title">Edit Featured Plan</h4>
                                                @else
                                                    <h4 class="card-title">Add Featured Plan</h4>
                                                @endif
                                            </div>
                                            <div class="col s12 m6 l2"></div>
                                        </div>  
                                    </div>
                                    <form class="formValidate0" id="plan_form" enctype="multipart/form-data" action="{{ route('admin.savefeaturedplan') }}" method="POST">@csrf

                                        <div class="row">
                                            <input type="hidden" name="id" value="{{ $featured_plans->id }}">
                                            <div class="input-field col s6">
                                                <strong>Plan Type :</strong>
                                                <select id="type" name="type" class="browser-default" tabindex="1">
                                                    <option value="">Select Plan Type</option>
                                                    @foreach ($plan_type as $key => $value)
                                                        @if($key == $featured_plans->type)
                                                            <option value="{{ $key }}" selected>
                                                            {{ $value }}</option>
                                                        @else
                                                            <option value="{{ $key }}">{{ $value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('type')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="input-field col s6">
                                                <strong>Price :</strong>
                                                <input type="text" name="price" id="price" class="form-control" value="{{ $featured_plans->price }}" placeholder="Price" tabindex="2" />
                                                @error('price')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="input-field col s6">
                                                <strong>Validity :</strong>
                                                <input type="text" name="validity" id="validity" class="form-control" value="{{ $featured_plans->validity }}" maxlength="3" placeholder="Validity" tabindex="3" />
                                                @error('validity')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="input-field col s6">
                                                <strong>Duration :</strong>
                                                <select id="duration" name="duration" class="browser-default" tabindex="4">
                                                    <option value="">Select</option>
                                                    @foreach ($duration_list as $key => $value)
                                                        @if($value == $featured_plans->duration)
                                                            <option value="{{ $value }}" selected>
                                                            {{ $value }}</option>
                                                        @else
                                                            <option value="{{ $value }}">{{ $value }}
                                                            </option>
                                                        @endif
                                                    @endforeach
                                                </select>
                                                @error('duration')
                                                    <span class="invalid-feedback" role='alert' style="color: red;"><strong>{{$message}}</strong></span>
                                                @enderror
                                            </div>

                                            <div class="input-field col s12">
                                                @if(isset($featured_plans->plan_functionality) && sizeof($featured_plans->plan_functionality) > 0)
                                                    <input type="hidden" id="row_cnt" name="row_cnt" value="1">
                                                    <table class="responsive-table functionality_table" id="featured_plans_table">
                                                        <thead>
                                                            <tr>
                                                                <th width="100px"></th>
                                                                <th class="table_first_th">Functionality</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $i = 0; ?>
                                                            @foreach($featured_plans->plan_functionality as $$key => $value)
                                                                <tr class="row_{{ $i }}">
                                                                    @if($i == 0)
                                                                        <td></td>
                                                                    @else
                                                                        <td>
                                                                            <a class="btn delete_row_btn remove-tr"><i class="material-icons">delete_forever</i></a>
                                                                        </td>
                                                                    @endif
                                                                    <td>
                                                                        <input type="text" name="functionality[]" id="functionality_{{ $i }}" placeholder="Functionality" class="form-control" value="{{ $value->functionality }}">
                                                                    </td>
                                                                </tr>
                                                                <?php $i++; ?>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                @else

                                                    <input type="hidden" id="row_cnt" name="row_cnt" value="1">
                                                    <table class="responsive-table functionality_table" id="featured_plans_table">
                                                        <thead>
                                                            <tr>
                                                                <th width="100px"></th>
                                                                <th class="table_first_th">Functionality</th>
                                                            </tr>
                                                        </thead>

                                                        <tbody>    
                                                            <tr class="row_0">
                                                                <td></td>
                                                                <td>
                                                                    <input type="text" name="functionality[]" id="functionality_0" placeholder="Functionality" class="form-control" tabindex="5">
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                @endif
                                            </div>

                                            <a class="mb-6 btn waves-effect waves-light gradient-45deg-green-teal add_row_btn" onclick="AddRow();"><i class="fa fa-plus pr-1"></i>Add Row</a>

                							<div class="input-field col s12">
                								<a href="{{ url('admin/featured-plan') }}" class="btn waves-effect waves-light left">Cancel</a>

	                							@if(isset($featured_plans->id) && $featured_plans->id != '')
	                								<button class="btn waves-effect waves-light right submit" type="submit" name="action">Update</button>
	                							@else
		                							<button class="btn waves-effect waves-light right submit" type="submit" name="action">Submit
		                							<i class="material-icons right">send</i></button>
		                						@endif
	                						</div>
	                					</div>
                					</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@stop

@section('js')
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
	<script type="text/javascript">

        jQuery(document).ready(function() {

            $("#plan_form").validate({
                rules: {
                    "type": {
                        required: true
                    },
                    "price": {
                        required: true
                    },
                    "validity": {
                        required: true
                    },
                    "duration": {
                        required: true
                    },
                },
                messages: {
                    "type": {
                        required: "Please Select Plan Type."
                    },
                    "price": {
                        required: "Price is Required."
                    },
                    "validity": {
                        required: "Validity is Required."
                    },
                    "duration": {
                        required: "Duration is Required."
                    },
                }
            });
        });

        $('#price').keypress(function (e) {

            var length = jQuery(this).val().length;

            if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            else if((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        $('#validity').keypress(function (e) {

            var length = jQuery(this).val().length;

            if(e.which != 8 && e.which != 0 && e.which != 16 && e.which != 43 && (e.which < 48 || e.which > 57)) {
                return false;
            }
            else if((length == 0) && (e.which == 48)) {
                return false;
            }
        });

        function AddRow() {

            var row_cnt = $("#row_cnt").val();

            var table = document.getElementById("featured_plans_table");
            var row = table.insertRow(-1);
            row.className = 'row_'+row_cnt+'';

            var cell1 = row.insertCell(0);
            cell1.innerHTML = '<td><a class="btn delete_row_btn remove-tr"><i class="material-icons">delete_forever</i></a></td>';

            var cell2 = row.insertCell(1);
            cell2.innerHTML = '<td><input type="text" name="functionality[]" placeholder="Functionality" id="functionality_'+row_cnt+'" class="form-control"></td>';
        
            var row_cnt_new = parseInt(row_cnt)+1;
            $("#row_cnt").val(row_cnt_new);
        }

        $(document).on('click', '.remove-tr', function(){  
            $(this).parents('tr').remove();
        });
    </script>
@stop