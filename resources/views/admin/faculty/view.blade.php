@extends('admin.layouts.master')



@section('contents')
    <div class="fs-2 fw-semibold">Faculty</div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item">
                <!-- if breadcrumb is single--><span>Home</span>
            </li>
            <li class="breadcrumb-item active"><span> Faculty</span></li>
        </ol>
    </nav>
    <hr>

    <div class="container ">
        <div class="card mt-4 mb-6">

            <div class="card-body mb-6">

                <table class="table border mb-0">
                    <thead class="table-light fw-semibold">
                        <tr class="align-middle">
                            <th class="text-center">
                                <svg class="icon">
                                    <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-people"></use>
                                </svg>
                            </th>
                            <th>User</th>
                            <th class="text-center">Progress</th>
                            <th >Gender</th>
                            <th class="text-center">Progress</th>
                            <th>Activity</th>
                            <th>Action</th>
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
                                <td class="text-center">
                                    <div>{{ $user->email }}</div>
                                </td>
                                <td>
                                    {{ $user->gender }}
                                </td>
                                <td class="text-center">
                                    <svg class="icon icon-xl">
                                        <use xlink:href="vendors/@coreui/icons/svg/brand.svg#cib-cc-mastercard"></use>
                                    </svg>
                                </td>
                                <td>
                                    <div class="small text-medium-emphasis">Last login</div>
                                    <div class="fw-semibold">10 sec ago</div>
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-transparent p-0" type="button" data-coreui-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <svg class="icon">
                                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-options"></use>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item"
                                                href="#">Info</a><a class="dropdown-item" href="#">Edit</a><a
                                                class="dropdown-item text-danger" href="#">Delete</a></div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
