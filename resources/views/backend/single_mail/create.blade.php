@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Campaign Name</label>
                            <input type="text" class="form-control" name="campaign_name" value="" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Add Email</label>
                            <!-- <input type="text" class="form-control" name="email" value="" required> -->

                            <div class="table-responsive">                                
                                <table class="table table-bordered table-striped" id="user_table">
                                    
                                    <tbody>
                                    </tbody>
                                       
                                </table>                                
                            </div>

                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create Mail Campaign</button><br>
            </div><br>
            
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: dashed;border-width: 1px;padding: 10px;">
                            <div class="form-group">
                                <label>Adaverise Image (300p * 400px) </label>
                                <input type="file" class="form-control-file" name="email_image1">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name1">
                                    @foreach($companies as $com)
                                        <option value=" {{$com->id}} "> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name:</label>
                                <input type="text" class="form-control" name="advertiment_name1" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link1" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: dashed;border-width: 1px;padding: 10px;">
                            <div class="form-group">
                                <label>Adaverise Image (300p * 400px) </label>
                                <input type="file" class="form-control-file" name="email_image2">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name2">
                                    @foreach($companies as $com)
                                        <option value=" {{$com->id}} "> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name:</label>
                                <input type="text" class="form-control" name="advertiment_name2" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link2" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: dashed;border-width: 1px;padding: 10px;">
                            <div class="form-group">
                                <label>Adaverise Image (300p * 400px) </label>
                                <input type="file" class="form-control-file" name="email_image3">
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name3">
                                    @foreach($companies as $com)
                                        <option value=" {{$com->id}} "> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name:</label>
                                <input type="text" class="form-control" name="advertiment_name3" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link3" required>
                            </div>
                        </div>
                    </div>

                </div>

            </div><br>

        </div>

    </form>



<script>
$(document).ready(function(){

    var count = 1;

    dynamic_field(count);

    function dynamic_field(number)
    {
    html = '<tr>';
            html += '<td width="90%"><input type="email" name="email[]" class="form-control" /></td>';
        
            if(number > 1)
            {
                html += '<td><button type="button" name="remove" id="" class="btn btn-danger remove">-</button></td></tr>';
                $('tbody').append(html);
            }
            else
            {   
                html += '<td><button type="button" name="add" id="add" class="btn btn-success">+</button></td></tr>';
                $('tbody').html(html);
            }
    }

    $(document).on('click', '#add', function(){
    count++;
    dynamic_field(count);
    });

    $(document).on('click', '.remove', function(){
    count--;
    $(this).closest("tr").remove();
    });


});
</script>


<br><br>
@endsection
