@section('css')
    <style type="text/css">
        .card .card-content .modal .modal-body p {
            margin: 15px 0;
        }
    </style>
@stop
@extends('include.master')@section('title','Aminites')

@section('content')
    <div class="row">
        <x-admin.form-header title="Aminites" subtitle="Aminites List"></x-admin.form-header>
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
                                        <a href="{{ url('admin/aminites/add') }}" class="btn waves-effect waves-light invoice-export border-round right" title="Add New Aminites">Add New Aminites</a>
                                    </div>

                                    <h4 class="card-title">Aminites List ({{ $count }})</h4>

                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display" style="color:black;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Sr No.</th>
                                                        <th style="text-align: center;">Category</th>
                                                        <th style="text-align: center;">Name</th>
                                                        <th style="text-align: center;">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($aminites->count() > 0)
                                                    @php $i=0 @endphp
                                                        @foreach ($aminites as $row)
                                                            <tr>
                                                                <td style="text-align: center;">
                                                                {{ ++$i }}</td>
                                                                <td style="word-wrap: break-word;text-align: center;">{{ @$row->category->name }}</td>
                                                                <td style="word-wrap: break-word;text-align: center;">{{ $row->name }}</td>

                                                                <td style="width:250px;text-align: center;">

                                                                    <a href="{{ route('admin.updateaminites' ,['id'=> $row->id ])}}" title="Edit" class="btn-small btn-light-blue">Edit</a>

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
                                                                                    <p style="text-align: left;">
                                                                                    Are you sure want to delete?</p>
                                                                                </div>
                                                                                <div class="modal-footer">
                                                                                    <a class="waves-effect waves-light btn gradient-45deg-amber-amber box-shadow-none border-round mr-1 mb-1 close-btn" data-dismiss="modal">Close</a>

                                                                                    <a href="{{ route('admin.deleteaminites' ,['id'=>$row->id ])}}" class="waves-effect waves-light btn gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1">Yes, Delete</a>
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