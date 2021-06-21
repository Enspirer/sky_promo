@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Queue Process&nbsp;</strong>

                    <!-- <div class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add Email</div> -->

                    

                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">queue</th>
                                <th scope="col">payload</th>                                
                                <th scope="col">Attempts</th>
                                <th scope="col">Reserved At</th>
                                <th scope="col">Available At</th>
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
                ajax: "{{route('admin.queue.GetTableDetails')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'queue', name: 'queue'},
                    {data: 'payload', name: 'payload'},
                    {data: 'attempts', name: 'attempts'},
                    {data: 'reserved_at', name: 'reserved_at'},
                    {data: 'available_at', name: 'available_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });

        });
    </script>



@endsection
