@extends('admin.layouts.master')



@section('contents')
    <div class="fs-2 fw-semibold">Faculty</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span> Faculty</span></li>
            <li class="breadcrumb-item active"><span> View Activity</span></li>
        </ol>
    </nav>
    <hr>

    <div class="card mb-4">
        <div class="card-body p-4">
            <div class="row">
                <div class="col">
                    <div class="card-title fs-4 fw-semibold">Faculty</div>
                    <div class="card-subtitle text-secondary mb-4">{{ $facultyCount }} registered faculty</div>
                </div>
                <div class="col-auto ms-auto">
                    <button class="btn btn-info text-white">
                        <svg class="icon me-2">
                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-user-plus"></use>
                        </svg>Add new Faculty
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table border ">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                            <th class="text-center">
                                <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                </svg>
                            </th>
                            <th>Faculty</th>
                            <th >Progress</th>
                            <th class="text-center">Gender</th>
                            <th class="text-center">Status</th>
                            <th>Activity</th>
                            <th class="text-center">View Result</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr class="align-middle">
                                <td class="text-center">
                                    <div class="avatar avatar-md"><img class="avatar-img" src="{{ $user->avatar }}"
                                            alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                                </td>
                                <td>
                                    <div>{{ $user->first_name }} {{ $user->last_name }}</div>
                                    <div class="small text-medium-emphasis"><span>New</span> | Registered:
                                        {{ $user->created_at->format('M d, Y') }}</div>
                                </td>
                                <td class=" ">

                                        <div class="clearfix">
                                          <div class="float-start">
                                            <div class="fw-semibold">10%</div>
                                          </div>
                                          <div class="float-end"><small class="text-medium-emphasis">Jun 11, 2020 - Jul 10,
                                              2020</small></div>
                                        </div>
                                        <div class="progress progress-thin">
                                          <div class="progress-bar bg-info" role="progressbar" style="width: 10%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                </td>
                                <td class="text-center">
                                    @if($user->gender === 'male')
                                    <i class="fas fa-mars text-primary" style="font-size: 24px"></i>
                                    @else
                                    <i class="fas fa-venus text-danger" style="font-size: 24px"></i>
                                    @endif
                                </td>
                                <td class="text-center">
                                    @if($user->status === 1)
                                    <i class="fas fa-check-circle text-success" style="font-size: 24px;"></i>
                                    @else
                                    <i class="fas fa-times-circle text-danger" style="font-size: 24px"></i>
                                    @endif

                                </td>
                                <td>
                                    <div class="small text-medium-emphasis">Last login</div>
                                    <div class="fw-semibold">10 sec ago</div>
                                </td>
                                <td class="text-center">


                                       <a href="{{ route('admin.faculty.result',$user->id) }}"> <i class="fas fa-search btn btn-success text-light" style="font-size: 20px"></i>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
