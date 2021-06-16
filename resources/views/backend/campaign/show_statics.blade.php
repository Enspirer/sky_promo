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
                                <div id="containere" style="width: 600px; min-width: 100%; height:500px;"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Status</label>
                                        <input type="text" value="" class="form-control" readonly>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Count</label>
                                                <input type="number" value="0" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email Type</label>
                                                <input type="text" value="" class="form-control" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-header">
                                            Email Details
                                        </div>
                                        <div class="card-body">
                                            <div class="">
                                                <div style="background-image: url('');height: 270px;background-repeat: no-repeat;background-size: cover;"></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <label>Message</label>
                                            <div class="">

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Start Campaign</button>
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
                                text: 'Campaign Statics',
                                subtext: 'Email Title',
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
                                        {value: 1048, name: 'Send Failed'},
                                        {value: 735, name: 'Sent Email'},
                                        {value: 580, name: 'Read Count'},
                                        {value: 484, name: 'Link Count'},
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
