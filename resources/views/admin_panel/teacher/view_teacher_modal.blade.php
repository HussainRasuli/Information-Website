

<style>
tr.tr-height{
    line-height: 2.3rem !important;
}
</style>
<div class="modal fade text-left" id="view_teacher" tabindex="-1" role="dialog" aria-labelledby="myModalLabel160" aria-hidden="true">
    <div class="modal-dialog modal-dialog modal-dialog-scrollable modal-lg modal-xl" role="document" style="margin-left: 8%;margin-right: 8%;">
        <div class="modal-content">
            <div class="modal-header bg-primary white">
                <h5 class="modal-title" id="myModalLabel160" style="font-weight:bold;"><span>Information of {{$data->teacher_name }} {{$data->teacher_lastname}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
                 <div class="modal-body col-12" style="padding: 1.5rem !important;"> 
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-4">
                                           <div class="users-view-image col-md-11">
                                                @if($data->teacher_image != '')
                                                    <img class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" src="{{ url('/storage/app/teacher/'.$data->teacher_image) }}" alt="{{$data->first_name}}'s photo">
                                                @elseif($data->gender == 'Male')
                                                    <img class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" src="{{asset('public/admin_panel/app-assets/images/user/male_user.jpg')}}" alt="{{$data->first_name}}'s photo">
                                                @elseif($data->gender == 'Female')
                                                    <img class="users-avatar-shadow w-100 rounded mb-2 pr-2 ml-1" src="{{asset('public/admin_panel/app-assets/images/user/female_user.jpg')}}" alt="{{$data->first_name}}'s photo">
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 col-12 mt-1 pr-0 pl-0">
                                            <table>
                                                <tbody>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">First Name </td>
                                                    <td></td>
                                                    <td> {{$data->teacher_name}}</td>
                                                </tr>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Last Name </td>
                                                    <td></td>
                                                    <td> {{$data->teacher_lastname}}</td>
                                                </tr>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Gender </td>
                                                    <td></td>
                                                    <td>@if($data->gender == 'Male') Male @else Female @endif</td>
                                                </tr>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Email Address </td>
                                                    <td></td>
                                                    <td> {{$data->email}}</td>
                                                </tr>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Education </td>
                                                    <td></td>
                                                    <td>
                                                        @if($data->education == 'Bachelor') Bachelor
                                                        @elseif($data->education == 'Master') Master
                                                        @elseif($data->education == 'PHD') PHD
                                                        @endif
                                                    </td>
                                                </tr>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Position </td>
                                                    <td></td>
                                                    <td> {{$data->position}}</td>
                                                </tr>
                                            </tbody></table>
                                        </div>

                                        <div class="col-md-4 col-12 mt-1 pr-0 pl-0">
                                        <table>
                                            <tbody>
                                                <tr class="tr-height">
                                                    <td class="font-weight-bold">Description </td>
                                                    <td></td>
                                                    <td> {{$data->teacher_des}}</td>
                                                </tr>
                                               
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div> 
                </div>