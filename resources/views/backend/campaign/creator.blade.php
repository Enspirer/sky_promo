@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
    <form action="{{route('admin.campaign.store')}}" method="post" enctype="multipart/form-data">
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
                    </div>
                </div>
                <button type="submit" class="btn btn-primary pull-right">Create Campaign</button><br>
            </div>
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
                                <input type="text" class="form-control" name="company_name1" required>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name1" required>
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
                                <input type="text" class="form-control" name="company_name2" required>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name2" required>
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
                                <input type="text" class="form-control" name="company_name3" required>
                            </div>
                            <div class="form-group">
                                <label>Advertisement Name</label>
                                <input type="text" class="form-control" name="advertiment_name3" required>
                            </div>
                        </div>
                    </div>

                </div>

            </div><br>

        </div>

    </form>


@endsection
