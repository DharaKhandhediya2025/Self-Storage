@section('css')
    <style type="text/css">
        .card .card-content .modal .modal-body p {
            margin: 15px 0;
        }
    </style>
@stop
@extends('include.master')@section('title','Featured Plan')

@section('content')
    <div class="row">
        <x-admin.form-header title="Featured Plan" subtitle="Featured Plan List"></x-admin.form-header>
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

                                    <div class="col s12">
                                        <a href="{{ url('admin/add-featured-plan') }}" class="btn waves-effect waves-light invoice-export border-round right" title="Add New Featured Plan">Add New Featured Plan</a>
                                    </div>

                                    <h4 class="card-title">Featured Plan List ({{ $count }})</h4>

                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display" style="color:black;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Sr No.</th>
                                                        <th style="text-align: center;">Type</th>
                                                        <th style="text-align: center;">Price</th>
                                                        <th style="text-align: center;">Duration</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($featured_plans->count() > 0)
                                                    @php $i=0 @endphp
                                                        @foreach ($featured_plans as $row)
                                                            <tr>
                                                                <td style="width: 10px;text-align: center;">{{ ++$i }}</td>
                                                                <td style="text-align: center;">{{ $row->type }}</td>
                                                                <td style="text-align: center;">{{ $row->price }}</td>
                                                                <td style="text-align: center;">{{ $row->validity }} {{ $row->duration }}</td>
                                                                
                                                                <td style="width: 300px;text-align: center;">

                                                                    <a href="{{ route('admin.viewfeaturedplan' ,['id'=> $row->id ])}}" title="View" class="btn-small btn-light-green">View</a>

                                                                    <a href="{{ route('admin.updatefeaturedplan' ,['id'=> $row->id ])}}" title="Edit" class="btn-small btn-light-blue">Edit</a>

                                                                    <a data-toggle="modal" data-target="#deleteModal_{{ $row->id }}" title="Delete" class="btn-small btn-light-pink modal-trigger right">Delete</a>

                                                                    <div class="modal fade" id="deleteModal_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                                                                        <div class="modal-dialog" role="document">
                                                                            <div class="modal-content">
                                                                                <div class="modal-header">
                                                                                    <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation
                                                                                    </h5>
                                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                        <span aria-hidden="true close-btn">×</span>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="modal-body">
                                                                                    <p style="text-align:left;">Are you sure want to delete?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a class="waves-effect waves-light btn gradient-45deg-amber-amber box-shadow-none border-round mr-1 mb-1 close-btn" data-dismiss="modal">Close</a>

                                                                                    <a href="{{ route('admin.deletefeaturedplan' ,['id'=>$row->id ])}}" class="waves-effect waves-light btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Yes, Delete</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
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
@endsection

@section('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.modal');
            var instances = M.Modal.init(elems);
        });
    </script>
@stop