@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/echarts@5/dist/echarts.min.js"></script>
                    <div class="row">
                        <div class="col-6">
                            <div class="card" style="padding: 10px;"><br><br>
                                <div id="containere" style="width: 550px; min-width: 100%; height:500px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Status</label>                                        
                                        
                                        @if($campaigns->status =='Complete') 
                                                <h4 style="color: #32CD32">Complete</h4>
                                            @elseif($campaigns->status =='Pending')        
                                                <h4 style="color: #0269A4">Pending</h4>
                                            @elseif($campaigns->status =='Processing')
                                                <div class="">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:100%">Processing..</div>    
                                                </div>
                                            @else
                                                <h4 style="color: #960018">Failed</h4>
                                        @endif                                                     
                                           
                                    </div><br>
                                    
                                    <div class="card">                                        
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-md-4" align="center">
                                                <label>Target Email Count</label><br>
                                                    <h4>{{ $statics->target_email_count }}</h4>                                                
                                                </div>
                                                <!-- <div style="border: 2px solid green; border-radius: 50%; height: 60%; position: absolute;"></div> -->
                                                <div class="col-md-4" align="center">
                                                <label>View Count</label><br>
                                                    <h4>{{ $statics->read_count }}</h4>                                                
                                                </div>
                                                <!-- <div style="border: 2px solid green; border-radius: 50%; height: 60%; position: absolute;"></div> -->
                                                <div class="col-md-4" align="center">
                                                <label>Click Count</label><br>
                                                    <h4>{{ $statics->click_count }}</h4>                                                
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div><br>
                                    <!-- <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Count</label>
                                                <input type="number" value="{{ $emailcount }}" class="form-control" readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Type</label>
                                                <input type="text" value="" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div> -->

                                    <div class="card">
                                        
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-md-4">
                                                <div class="" style="background-image: url('{{url('files/single_mail/',json_decode($campaigns->json_data)[0]->image)}}'); height: 100px; background-position: center; background-size: cover; width: auto;">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="container">
                                                <b>Advertisement Name:</b> {{ json_decode($campaigns->json_data)[0]->advertisement_name }}
                                                </div><br>
                                                <div class="container">
                                                <b>Description :</b> {{ json_decode($campaigns->json_data)[0]->description }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>                                        
                                    </div><br>
                                    <div class="card">
                                        
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-md-4">                                                
                                                <div class="" style="background-image: url('{{url('files/single_mail/',json_decode($campaigns->json_data)[1]->image)}}'); height: 100px; background-position: center; background-size: cover; width: auto;">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="container">
                                                <b>Advertisement Name:</b> {{ json_decode($campaigns->json_data)[1]->advertisement_name }}
                                                </div><br>
                                                <div class="container">
                                                <b>Description :</b> {{ json_decode($campaigns->json_data)[1]->description }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>                                        
                                    </div><br>
                                    <div class="card">
                                        
                                        <div class="card-body">
                                            <div class="row">
                                            <div class="col-md-4">                                                
                                                <div class="" style="background-image: url('{{url('files/single_mail/',json_decode($campaigns->json_data)[2]->image)}}'); height: 100px; background-position: center; background-size: cover; width: auto;">
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="container">
                                                <b>Advertisement Name:</b> {{ json_decode($campaigns->json_data)[2]->advertisement_name }}
                                                </div><br>
                                                <div class="container">
                                                <b>Description :</b> {{ json_decode($campaigns->json_data)[2]->description }}
                                                </div>
                                            </div>
                                            </div>
                                        </div>                                        
                                    </div>

                                    <!-- <div class="card">
                                        <div class="card-body">
                                            <label>Message</label>
                                            <div class="">

                                            </div>
                                        </div>
                                    </div> -->
                                    <!-- <br> -->
                                    <!-- <button type="submit" class="btn btn-primary">Start Campaign</button> -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var dom = document.getElementById("containere");
                        var myChart = echarts.init(dom);
                        var app = {};
                        var option;
                        option = {
                            title: {
                                text: 'Single Campaign Statics',
                                // subtext: 'Email Title',
                                left: 'center'
                            },
                            tooltip: {
                                trigger: 'item'
                            },
                            legend: {
                                orient: 'vertical',
                                left: 'left',
                            },
                            series: [
                                {
                                    name: 'Details',
                                    type: 'pie',
                                    radius: '50%',
                                    data: [
                                        {value: {{ $statics->read_count }}, name: 'View Count'},                                                                              
                                        {value: {{ $statics->click_count }}, name: 'Click Count'},
                                        {value: {{ $statics->is_failed }}, name: 'Failed Email'},
                                        {value: {{ $statics->target_email_count }}, name: 'Target Email Count'},
                                    ],
                                    emphasis: {
                                        itemStyle: {
                                            shadowBlur: 10,
                                            shadowOffsetX: 0,
                                            shadowColor: 'rgba(0, 0, 0, 0.5)'
                                        }
                                    }
                                }
                            ]
                        };
                        if (option && typeof option === 'object') {
                            myChart.setOption(option);
                        }
                    </script>

                </div>
            </div>
        </div>
    </div>
@endsection
