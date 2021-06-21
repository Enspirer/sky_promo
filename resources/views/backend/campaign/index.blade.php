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


    <!-- Modal delete email-->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="ModalDeleteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h3 class="modal-title" id="ModalDeleteLabel">Delete</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this Campaign?</h5>
                        </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-danger" name="ok_button" id="ok_button">Delete</button>
                       
                    </div>
                </form>

            </div>
        </div>
    </div>




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

            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

            $('#ok_button').click(function(){
                $.ajax({
                url:"campaign/delete/"+user_id,
                beforeSend:function(){
                    // $('#ok_button').text('Deleting...');
                },
                success:function(data)
                {
                    setTimeout(function(){
                    $('#confirmModal').modal('hide');
                    $('#villadatatable').DataTable().ajax.reload();
                    // alert('Email Deleted');
                    });
                }
                })
            });
    
        });

        

        
    </script>



@endsection
