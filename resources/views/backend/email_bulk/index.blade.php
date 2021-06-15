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



    <!-- Modal -->
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
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select class="form-control" name="category">
                                <option value="School">School</option>
                                <option value="Companies">Companies</option>
                                <option value="Shops">Shops</option>
                                <option value="Local Business">Local Business</option>
                            </select>
                        </div>
                        <textarea class="form-control" name="description" rows="4"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Email</button>
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
                        
                        <!-- <form action="{{ url('import-excel') }}" method="POST" name="importform" enctype="multipart/form-data">
                @csrf
                <input type="file" name="import_file" class="form-control">
                <br>
                <button class="btn btn-success">Import File</button>
                <a class="btn btn-info ms-4" href="{{ url('export-excel') }}"> 
                 Export File</a>
            </form> -->

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>




    <script type="text/javascript">
        $(function () {

            var table = $('#villadatatable').DataTable({
                processing: false,
                ajax: "{{route('admin.emailbulk.GetDetableDetails')}}",
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'email', name: 'email'},
                    {data: 'created_at', name: 'created_at'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
    </script>



@endsection
