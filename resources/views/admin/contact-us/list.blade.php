@extends('include.master')@section('title','Contact Us')

@section('content')
    <div class="row">
        <x-admin.form-header title="Contact Us" subtitle="Contact Us List"></x-admin.form-header>
        <div class="col s12">
            <div class="container">
                <div class="section section-data-tables">
                    <div class="row">
                        <div class="col s12 m12 l12">
                            <div id="button-trigger" class="card card-default scrollspy">
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

                                    <h4 class="card-title">Contact Us List ({{ $count }})</h4>

                                    <div class="row">
                                        <div class="col s12">
                                            <table id="page-length-option" class="display" style="color:black;">
                                                <thead>
                                                    <tr>
                                                        <th style="text-align: center;">Sr No.</th>
                                                        <th style="text-align: center;">Name</th>
                                                        <th style="text-align: center;">Email</th>
                                                        <th style="text-align: center;">Subject</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($contact_us->count() > 0)
                                                    @php $i=0 @endphp
                                                        @foreach ($contact_us as $row)
                                                            <tr>
                                                                <td style="width: 10px;text-align: center;">{{ ++$i }}</td>
                                                                <td style="text-align: center;"><a href="{{ url('admin/contact-us')}}/{{$row->id}}">{{ $row->name }}</a></td>
                                                                <td style="text-align: center;">{{ $row->email }}</td>
                                                                <td style="text-align: center;">{{ $row->subject }}</td>
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