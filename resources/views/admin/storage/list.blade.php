@extends('include.master')@section('title','Storage')

@section('content')
    <div class="row">
		<x-admin.form-header title="Storage" subtitle="Storage List"></x-admin.form-header>
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
                                                        <th style="text-align: center;">City</th>
                                                        <th style="text-align: center;">Storage no.</th>
                                                        <th style="text-align: center;">Area</th>
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
                                                                	<a href="{{ url('admin/storage-detail/'.$row->slug ) }}" title="View Storage Details">{{ $row->title }}
                                                                	</a>
                                                                </td>
                                                                <td>{{ $row->storage_type }}</td>
                                                                <td>{{ $row->category->name }}</td>
                                                                <td>{{ $row->city }}</td>
                                                                <td>{{ $row->storage_no }}</td>
                                                                <td>{{ $row->size }}  {{ $row->size_unit}}</td>

                                                                <td style="width: 80px;">
                                                                    @if($row->storage_status == 1)
                                                                        <div class="display-flex flex-column">
                                                                            <div class="display-flex justify-content-between pb-2"><span>Active</span></div>
                                                                        </div>
                                                                    @elseif($row->storage_status == 2)
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