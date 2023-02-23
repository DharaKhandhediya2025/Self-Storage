@section('css')
    <style type="text/css">
        .card .card-content .modal .modal-body p {
            margin: 15px 0;
        }
    </style>
@stop
@extends('include.master')@section('title','FAQ List')

@section('content')
    <div class="row">
        <div id="breadcrumbs-wrapper" data-image="{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}" class="breadcrumbs-bg-image" style="background-image: url('{{ asset('public/app-assets/images/gallery/breadcrumb-bg.jpg') }}')">
            <!-- Search for small screen-->
            <div class="container">
                <div class="row">
                    <div class="col s12 m6 l6">
                        <h5 class="breadcrumbs-title mt-0 mb-0"><span>FAQ List</span></h5>
                    </div>
                    <div class="col s12 m6 l6 right-align-md">
                        <ol class="breadcrumbs mb-0">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard')}}">Dashboard
                            </a></li>
                            <li class="breadcrumb-item active">FAQ List</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <x-admin.tableview dataArr="{{ $faq }}" title="FAQ" count="{{ $count }}">
            @slot('ColField')
                <th style="text-align: center;">Sr No.</th>
                <th style="text-align: center;">Question</th>
                <th style="text-align: center;">Action</th>
            @endslot
            @slot('dataField')
                @if($faq->count() > 0)
                @php $i=0 @endphp
                    @foreach ($faq as $row)
                        <tr>
                            <td style="text-align: center;">{{ ++$i }}</td>
                            <td style="word-wrap: break-word;">{{ $row->question }}</td>

                            <td>

                                <a href="{{ route('admin.viewfaq' ,['id'=>$row->id ])}}" title="View" class=""><i class="material-icons">remove_red_eye</i></a>

								<a href="{{ route('admin.updatefaq' ,['id'=>$row->id ])}}" title="Edit" class=""><i class="material-icons">edit</i></a>

                                <a data-toggle="modal" data-target="#exampleModal_{{ $row->id }}" title="Delete" class="" style="cursor:pointer;"><i class="material-icons">delete</i>
                                </a>

                                <div class="modal fade" id="exampleModal_{{ $row->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								    <div class="modal-dialog" role="document">
								        <div class="modal-content">
								            <div class="modal-header">
								                <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
								                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
								                    <span aria-hidden="true close-btn">×</span>
								                </button>
								            </div>
								            <div class="modal-body"><p>Are you sure want to delete?</p></div>
								            <div class="modal-footer">
								                <a class="waves-effect waves-light btn gradient-45deg-amber-amber box-shadow-none border-round mr-1 mb-1 close-btn" data-dismiss="modal">Close</a>

								                <a href="{{ route('admin.deletefaq' ,['id'=>$row->id ])}}" class="aves-effect waves-light btn gradient-45deg-light-blue-cyan box-shadow-none border-round mr-1 mb-1">Yes, Delete</a>
								            </div>
								        </div>
								    </div>
								</div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            @endslot
        </x-admin.tableview>
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