@extends('include.master')@section('title','Dashboard')

@section('content')
    <div class="row">
        <div class="col s12">
            <div class="container">
                <div class="section">
                    <div id="card-stats" class="pt-0">
                        <div class="row">
                            <div class="col s12 m12">
                                <h6><b>
                                    <div id="reportrange" style="cursor: pointer;margin-top: 15px;">
                                        <i class="material-icons">date_range</i>&nbsp;<span></span>
                                    </div>
                                </b></h6>
                                <input type="hidden" name="date_range" id="date_range">
                            </div>
                            <a href="#" onClick="getData('/admin/buyers')" title="Buyers">
                                <div class="col s12 m6 l6 xl3">
                                    <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                        <div class="padding-4">
                                            <div class="row">
                                                <div class="col s7 m7">
                                                    <i class="material-icons background-round mt-5">person</i><p>Buyers</p>
                                                </div>
                                                <div class="col s5 m5 right-align">
                                                    <h5 class="mb-0 white-text"><span id="buyers_count">{{ $buyers }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                            <a href="#" onClick="getData('/admin/sellers')" title="Sellers">
                                <div class="col s12 m6 l6 xl3">
                                    <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                                        <div class="padding-4">
                                            <div class="row">
                                                <div class="col s7 m7">
                                                    <i class="material-icons background-round mt-5">person</i><p>Sellers</p>
                                                </div>
                                                <div class="col s5 m5 right-align">
                                                    <h5 class="mb-0 white-text"><span id="sellers_count">{{ $sellers }}</span></h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div><div class="content-overlay"></div>
            </div>
        </div>
    </div>
@endsection