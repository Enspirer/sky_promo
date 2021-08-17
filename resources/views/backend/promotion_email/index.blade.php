@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')

    <div class="row">
        <div class="col-md-6">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('admin.sky_promotion_email.send_email')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="text" class="form-control" name="email" required>

                            <label>Sender Name</label>
                            <input type="text" class="form-control" name="sender_name" required>

                            <label>Greetings</label>
                            <select class="form-control" name="sender_type">
                                <option value="Mr.">Mr</option>
                                <option value="Mrs.">Mrs</option>
                                <option value="Dear">Dear</option>
                                <option value="Ms.">Ms</option>
                                <option value="Vulnerable.">Vulnerable</option>
                            </select>

                            <label>Subject</label>
                            <input type="text" class="form-control" name="subject" required><br>
                            <button class="btn btn-primary" type="submit">Send Email</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>





@endsection
