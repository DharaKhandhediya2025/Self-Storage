@section('css')
    <style type="text/css">
        .card .card-content .modal .modal-body p {
            margin: 15px 0;
        }
    </style>
@stop
@extends('include.master')@section('title','Banners')

@section('content')
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>Banners</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">Banner List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div class="row">
                        <div class="col s12 m12 l12">

                            <div id="html-view-validations">
                                @if(session('message'))
                                    <div class="card-alert card green">
                                        <div class="card-content white-text">
                                            <p>{{ session('message') }}</p>
                                        </div>
                                    </div>
                                @endif
                                @if(session('fail'))
                                    <div class="card-alert card red">
                                        <div class="card-content white-text">
                                            <p>{{ session('fail') }}</p>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="col s12"><br/>
                                <a href="{{ url('admin/add-banners') }}" class="btn waves-effect waves-light invoice-export border-round right" title="Add New Banner">Add New Banner</a>
                            </div>
                            <h5>Banner List ({{ $count }})</h5>
                        </div>
                    </div>
                </div>
            </div><div class="content-overlay"></div>
        </div>

        @php $i=0 @endphp
        @foreach ($banners as $row)
            <div class="col s12 m6 l4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img src="{{ asset('storage/app/public/'.$row->image) }}" alt="No Image Available" style="height:150px;width:350px;">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4">

                            <a href="{{ route('admin.updatebanners' ,['id'=> $row->id ])}}" title="Edit" class="btn-small btn-light-blue">Edit</a>

                            <a data-toggle="modal" data-target="#deleteModal_{{ $row->id }}" title="Delete" class="btn-small btn-light-pink modal-trigger right">Delete</a>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="deleteModal_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true close-btn">×</span>
                            </button>
                        </div>
                        <div class="modal-body"><p>Are you sure want to delete?</p></div>
                        <div class="modal-footer">

                            <a class="waves-effect waves-light btn gradient-45deg-amber-amber box-shadow-none border-round mr-1 mb-1 close-btn" data-dismiss="modal">Close</a>

                            <a href="{{ route('admin.deletebanners' ,['id'=> $row->id ])}}" class="waves-effect waves-light btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Yes, Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
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