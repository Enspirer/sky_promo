@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<span id="form_result"></span>
    <form action="{{route('admin.campaign.update')}}" method="post" enctype="multipart/form-data" id="editModal">
        {{csrf_field()}}
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Campaign Name</label>
                            <input type="text" class="form-control" name="campaign_name" value="{{ $campaigns->campaign_name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea type="text" class="form-control" name="description" rows="10" >{{ $campaigns->description }}</textarea>
                        </div>
                    </div>
                </div>
                <input type="text" name="hidden_id" id="hidden_id" value="{{ $campaigns->id }}" hidden />

                <button type="submit" class="btn btn-primary pull-right">Update Campaign</button><br>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="" style="border-style: dashed;border-width: 1px;padding: 10px;">
                            <div class="form-group">
                                <label>Adaverise Image (300p * 400px) </label>
                                <input type="file" class="form-control-file" name="email_image1">
                                <br>
                                <img src="{{url('files/email_promo/',json_decode($campaigns->json_data)[0]->image)}}" style="width: 30%;" alt="" >
                            </div>
                           
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name1">
        
                                    @foreach($companies as $com)
                                        <option value="{{$com->id}}" {{ json_decode($campaigns->json_data)[0]->company_id == $com->id ? "selected" : "" }}> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name1" value="{{ json_decode($campaigns->json_data)[0]->advertisement_name  }}" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link1" value="{{ json_decode($campaigns->json_data)[0]->link  }}" required>
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
                                <br>
                                <img src="{{url('files/email_promo/',json_decode($campaigns->json_data)[1]->image)}}" style="width: 30%;" alt="" >
                                
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name2">
                                    @foreach($companies as $com)
                                        <option value="{{$com->id}}" {{ json_decode($campaigns->json_data)[1]->company_id == $com->id ? "selected" : "" }}> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name2" value="{{ json_decode($campaigns->json_data)[1]->advertisement_name  }}" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link2" value="{{ json_decode($campaigns->json_data)[1]->link  }}" required>
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
                                <br>
                                <img src="{{url('files/email_promo/',json_decode($campaigns->json_data)[2]->image)}}" style="width: 30%;" alt="" >
                            </div>
                            <div class="form-group">
                                <label>Company Name</label>
                                <select class="form-control" name="company_name3">
                                @foreach($companies as $com)
                                        <option value="{{$com->id}}" {{ json_decode($campaigns->json_data)[2]->company_id == $com->id ? "selected" : "" }}> {{$com->company_name}} </option>
                                    @endforeach
                                    
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name3" value="{{ json_decode($campaigns->json_data)[2]->advertisement_name  }}" required>
                            </div>
                            <div class="form-group">
                                <label>Link:</label>
                                <input type="text" class="form-control" name="link3" value="{{ json_decode($campaigns->json_data)[2]->link  }}" required>
                            </div>
                        </div>
                    </div>

                </div>

            </div><br>

        </div>

    </form>




@endsection
