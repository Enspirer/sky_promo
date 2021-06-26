@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <div class="row">
        <div class="col">

            <div class="card">
                <div class="card-header">
                    <strong>Email Bulk&nbsp;</strong>

                    <div class="btn btn-primary pull-right" data-toggle="modal" data-target="#exampleModal">Add Email</div>

                    <div class="btn btn-warning pull-right" data-toggle="modal" data-target="#Modalimport">Import File</div>
        
                     <a class="btn btn-success ms-4" href="{{ url('export-excel') }}"> 
                 Export File</a>

                </div><!--card-header-->

                <div class="card-body">
                    <table class="table table-striped table-bordered" id="villadatatable" style="width:100%">
                        <thead>
                            <tr>
                                <th scope="col">#ID</th>
                                <th scope="col">Email</th>
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



    <!-- Modal insert -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
         
                <form action="{{route('admin.emailbulk.add_email')}}" method="post">

                
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email"  required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" >
                                <option value="School">School</option>
                                <option value="Companies">Companies</option>
                                <option value="Shops">Shops</option>
                                <option value="Local Business">Local Business</option>
                            </select>
                        </div>
                        <label>Description</label>
                        <textarea class="form-control" name="description"  rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" value="Add Email">
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
                <form action="{{route('admin.emailbulk.update_email')}}" method="post">

                   
                    {{csrf_field()}}
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Email</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category" id="category">
                                <option value="School">School</option>
                                <option value="Companies">Companies</option>
                                <option value="Shops">Shops</option>
                                <option value="Local Business">Local Business</option>
                            </select>
                        </div>
                        <label>Description</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <!-- <input type="hidden" name="action" id="action" value="Add" /> -->
                        <input type="hidden" name="hidden_id" id="hidden_id" />
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <input type="submit" class="btn btn-primary" name="action_button" id="action_button" value="Submit">
                    </div>
                </form>

            </div>
        </div>
    </div>


     <!-- Modal Import-->
     <div class="modal fade" id="Modalimport" tabindex="-1" role="dialog" aria-labelledby="ModalimportlLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="{{ url('import-excel') }}" method="post" name="importform" enctype="multipart/form-data">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
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
                        <h3 class="modal-title" id="ModalDeleteLabel">Confirmation</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <h5>Are you sure you want to remove this email?</h5>
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
                processing: true,
                ajax: "{{route('admin.emailbulk.GetDetableDetails')}}",
                serverSide: true,
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });


            // $('#create_record').click(function(){
            // $('.modal-title').text('Add Email');
            // $('#action_button').val('Add');
            // $('#action').val('Add');
            // $('#form_result').html('');

            // $('#exampleModal').modal('show');
            // });


            $(document).on('click', '.edit', function(){

            var id = $(this).attr('id');
            $('#form_result').html('');
            $.ajax({
            url :"edit/"+id,
            
            dataType:"json",
            success:function(data)
            {
                $('#email').val(data.result.email);
                $('#category').val(data.result.category);
                $('#description').val(data.result.description);
                $('#hidden_id').val(id);
                // $('.modal-title').text('Edit Record');
                // $('#action_button').val('Edit');
                // $('#action').val('Edit');
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
            url:"delete/"+user_id,
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
