@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>Email Campaign&nbsp;</strong>
                    <a href="{{route('admin.campaign.create')}}" class="btn btn-primary pull-right">Create Campaign</a>
                </div>

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Campaign Name</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Option</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->




    <script type="text/javascript">
        $(function () {
            var table = $('#villadatatable').DataTable({
                processing: false,
                ajax: "{{route('admin.campaign.getdetails')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'campaign_name', name: 'campaign_name'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>



@endsection
