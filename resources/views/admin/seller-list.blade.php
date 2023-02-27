@extends('include.master')@section('title','Sellers')

@section('content')
    <div class="row">
		<div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}');">
		    <!-- Search for small screen-->
		    <div class="container">
		        <div class="row">
		            <div class="col s12 m6 l6">
		                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Sellers</span></h5>
		            </div>
		            <div class="col s12 m6 l6 right-align-md">
		                <ol class="breadcrumbs mb-0">
		                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
		                    </a></li>
		                    <li class="breadcrumb-item active">Seller List</li>
		                </ol>
		            </div>
		        </div>
		    </div>
		</div>
		<div class="col s12">
		    <div class="container">
		        <div class="section section-data-tables">
		            <div class="row">
		                <div class="col s12 m12 l12">
		                    <div id="button-trigger" class="card card card-default scrollspy">
		                        <div class="card-content">

		                            <div id="html-view-validations">
		                                @if(session('message'))
		                                    <div class="card-alert card green">
		                                        <div class="card-content white-text">
		                                            <p>{{session('message')}}</p>
		                                        </div>
		                                    </div>
		                                @endif
		                                @if(session('fail'))
		                                    <div class="card-alert card red">
		                                        <div class="card-content white-text">
		                                            <p>{{session('fail')}}</p>
		                                        </div>
		                                    </div>
		                                @endif
		                            </div>

		                            <h4 class="card-title">Seller List ({{ $count }})</h4>

		                            <div class="row">
		                                <div class="col s12">
		                                    <table id="page-length-option" class="display" style="color:black;">
		                                        <thead>
		                                        	<tr>
		                                        		<th style="text-align: center;">Sr No.</th>
										                <th style="text-align: center;">Name</th>
										                <th style="text-align: center;">Email</th>
										                <th style="text-align: center;">Phone</th>
										                <th style="text-align: center;">Profile Image
										                </th>
										                <th style="text-align: center;">Status</th>
		                                        	</tr>
		                                        </thead>
		                                        <tbody>
		                                        	@if($sellers->count() > 0)
									                @php $i=0 @endphp
									                    @foreach ($sellers as $row)
									                        <tr>
									                            <td style="width: 10px;text-align: center;">{{ ++$i }}</td>
									                            <td>{{ $row->name }}</td>
									                            <td>{{ $row->email }}</td>
									                            <td>{{ $row->country_code }} {{ $row->phone }}</td>

									                            @if($row->profile_image != '')
									                                <td>
									                                    <img src="{{ asset('storage/app/public/'.$row->profile_image) }}" alt="No Image Available" title="View Profile Image" style="height:80px;width:80px;border-radius: 50%;cursor: pointer;">
									                                </td>
									                            @else
									                                <td></td>
									                            @endif

									                            <td style="width: 80px;">
									                                @if($row->active_block_status == 1)
									                                    <div class="display-flex flex-column">
									                                        <div class="display-flex justify-content-between pb-2">
									                                            <span>Active</span>
									                                            <div class="switch">
									                                                <label>
									                                                	<input type="checkbox" checked>
									                                                    <span class="lever" onclick="updateSellerStatus('{{ $row->id }}');" title="Change Status">
									                                                    </span>
									                                                </label>
									                                            </div>
									                                        </div>
									                                    </div>
									                                @else
									                                    <div class="display-flex flex-column">
									                                        <div class="display-flex justify-content-between pb-2">
									                                            <span>Block</span>
									                                            <div class="switch">
									                                                <label>
									                                                <input type="checkbox">
										                                                <span class="lever" onclick="updateSellerStatus('{{ $row->id }}');" title="Change Status">
										                                                </span>
									                                                </label>
									                                            </div>
									                                        </div>
									                                    </div>
									                                @endif
									                            </td>
									                        </tr>
									                    @endforeach
									                @endif
		                                        </tbody>
		                                    </table>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div><div class="content-overlay"></div>
		</div>
    </div>
@stop

@section('js')
	<script type="text/javascript">

		function updateSellerStatus(seller_id) {

			var app_url = "{!! env('APP_URL'); !!}";
            var token = $('input[name="csrf_token"]').val();

			$.ajax({

                type : 'GET',
                url : app_url+'/admin/update/sellerstatus',
                data : {'seller_id' : seller_id, '_token':token},
                dataType : 'json',
                success: function(response) {
                    alert(response.message);
                }
            });
		}
	</script>
@stop