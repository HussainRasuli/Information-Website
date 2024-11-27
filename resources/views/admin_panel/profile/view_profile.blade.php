@extends('admin_panel.layout.master_page')
@section('content')
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/vendors/css/extensions/toastr.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin_panel/app-assets/css/plugins/extensions/toastr.css')}}">

@if(Session::has('update_profile'))
<div id="toast-container" class="toast-container toast-bottom-right toast_message">
    <div class="toast toast-success" aria-live="polite" style="display:block;">
        <div class="toast-title">Your Account</div>
        <div class="toast-message">{{Session::get('update_profile')}}</div>
    </div>
</div>
@endif


<div class="col-12">
    <div class="card">
        <div class="card-header">
            <div class="card-title">Profile</div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="users-view-image">
                    @if(Auth::user()->image == 'male_user.jpg' || Auth::user()->image == '')
                        <img class="round" src="{{asset('public/admin_panel/app-assets/images/logo/male_user.jpg')}}" class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" alt="avatar">
                    @else
                        <img src="{{ url('/storage/app/users/'.$data->image) }}" class="users-avatar-shadow w-50 rounded mb-2 pr-2 ml-1" alt="avatar">
                    @endif
                </div>
                <div class="col-12 col-sm-9 col-md-6 col-lg-5 mb-2">
                    <table style="line-height: 2rem;">
                        <tbody><tr>
                            <td class="font-weight-bold">Name: &nbsp;&nbsp;&nbsp;</td>
                            <td>{{$data->name}}</td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold">Email: &nbsp;&nbsp;&nbsp;</td>
                            <td>{{$data->email}}</td>
                        </tr>
                    </tbody></table>
                </div>
                <div class="col-12">
                    <a href="{{route('profile_form') . '/' . $data->id }}" class="btn btn-primary mr-1 waves-effect waves-light"><i class="feather icon-edit-1"></i> Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>


@section('script')
<script src="{{asset('public/admin_panel/app-assets/js/scripts/extensions/toastr.js')}}"></script>


<script>
 setTimeout(function() {
        $('.toast_message').fadeOut('slow');
    }, 3000);

</script>

@endsection
@endsection