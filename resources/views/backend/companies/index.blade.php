@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Companies&nbsp;</strong>

                    <div class="btn btn-primary pull-right ml-3" data-toggle="modal" data-target="#exampleModal">Add New</div>

                    <div class="btn btn-dark pull-right ml-3" data-toggle="modal" data-target="#Modalimport">Import File</div>
        
                     <a class="btn btn-warning ms-4 ml-3" href="{{ url('export-company') }}">Export File</a>

                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">User ID</th>
                                <th scope="col">Company Name</th>
                                <th scope="col">Company Description</th>
                                <th scope="col">Created At</th>
                                <th scope="col">Updated At</th>
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



    <!-- Modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
         
                <form action="{{route('admin.companies.add_company')}}" method="post">

                
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add New</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="name"  required>
                        </div>
                        
                        <label>Company Description</label>
                        <textarea class="form-control" name="description"  rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" value="Add New">
                    </div>
                </form>

            </div>
        </div>
    </div>


    <!-- Modal edit -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <span id="form_result"></span>
                <form action="{{route('admin.companies.update_company')}}" method="post">

                   
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Company Name</label>
                            <input type="text" class="form-control" name="name" id="name"  required>
                        </div>
                        
                        <label>Company Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="hidden" name="action" id="action" value="Add" /> -->
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-success" name="action_button" id="action_button" value="Update">
                    </div>
                </form>

            </div>
        </div>
    </div>


     <!-- Modal Import-->
     <div class="modal fade" id="Modalimport" tabindex="-1" role="dialog" aria-labelledby="ModalimportlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('import-company') }}" method="post" name="importform" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="ModalimportlLabel">Import File</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>CSV/Excel</label>
                            <input type="file" class="form-control" name="import_file" required>
                        </div>                      
                      
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>


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
                            <h5>Are you sure you want to remove this Company?</h5>
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
                ajax: "{{route('admin.companies.GetTableDetails')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'user_id', name: 'user id'},
                    {data: 'company_name', name: 'name'},
                    {data: 'company_description', name: 'description'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'created_at', name: 'updated_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            $(document).on('click', '.edit', function(){

                var user_id;

                var user_id = $(this).attr('id');
                $('#form_result').html('');
                $.ajax({
                url :"companies/edit/"+user_id,
                
                dataType:"json",
                success:function(data)
                {
                    $('#name').val(data.result.company_name);
                    $('#description').val(data.result.company_description);
                    $('#hidden_id').val(user_id);
                    $('#editModal').modal('show');
                }
                })
            });    

            var user_id;

            $(document).on('click', '.delete', function(){
            user_id = $(this).attr('id');
            $('#confirmModal').modal('show');
            });

                $('#ok_button').click(function(){
                $.ajax({
                url:"companies/delete/"+user_id,
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
