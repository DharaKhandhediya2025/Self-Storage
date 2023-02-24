@extends('include.master')@section('title','Storage')

@section('content')
    <div class="row">
		<div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}');">
		    <!-- Search for small screen-->
		    <div class="container">
		        <div class="row">
		            <div class="col s12 m6 l6">
		                <h5 class="breadcrumbs-title mt-0 mb-0"><span>Storage</span></h5>
		            </div>
		            <div class="col s12 m6 l6 right-align-md">
		                <ol class="breadcrumbs mb-0">
		                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
		                    </a></li>
		                    <li class="breadcrumb-item active">Storage List</li>
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

		                            <h4 class="card-title">Storage List ({{ $count }})</h4>

		                            <div class="row">
		                                <div class="col s12">
		                                    <table id="page-length-option" class="display" style="color:black;">
		                                        <thead>
		                                        	<tr>
		                                        		<th style="text-align: center;">Sr No.</th>
                                                        <th style="text-align: center;">Title</th>
                                                        <th style="text-align: center;">Storage Type</th>
                                                        <th style="text-align: center;">Category</th>
                                                        <th style="text-align: center;">Subcategory</th>
                                                        <th style="text-align: center;">Status</th>
		                                        	</tr>
		                                        </thead>
		                                        <tbody>
		                                        	@if($storages->count() > 0)
									                @php $i=0 @endphp
									                    @foreach ($storages as $row)
									                        <tr>
									                            <td style="width: 10px;text-align: center;">{{ ++$i }}</td>
                                                                <td style="word-wrap: break-word;">
                                                                	<a href="{{ url('admin/storage-detail/'.$row->id) }}" title="View Storage Details">{{ $row->title }}</a>
                                                                </td>
                                                                <td>{{ $row->storage_type }}</td>
                                                                <td>{{ $row->category->name }}</td>
                                                                <td>{{ $row->sub_category->name }}</td>

                                                                <td style="width: 80px;">
                                                                    @if($row->show_hide_post == 1)
                                                                        <div class="display-flex flex-column">
                                                                            <div class="display-flex justify-content-between pb-2"><span>Active</span></div>
                                                                        </div>
                                                                    @elseif($row->show_hide_post == 2)
                                                                        <div class="display-flex flex-column">
                                                                            <div class="display-flex justify-content-between pb-2"><span>Sold</span></div>
                                                                        </div>
                                                                    @else
                                                                        <div class="display-flex flex-column">
                                                                            <div class="display-flex justify-content-between pb-2"><span>Inactive</span></div>
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