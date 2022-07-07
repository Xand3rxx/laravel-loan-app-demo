@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
    <div class="card card-xl-stretch bg-body border-0 mb-5 mb-xl-0">
        <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
            <div class="content flex-row-fluid" id="kt_content">
                <h3 class="fs-2x line-height-lg mb-5">
                    <span class="fw-bold">Hello,
                        <x-username />
                    </span><br>
                </h3>
                <!--begin::Row-->
                <div class="row g-5 g-xl-8">

                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 2-->
                        <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                            style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-3.svg">
                            <!--begin::Body-->
                            <div class="card-body d-flex align-items-center pt-3 pb-0">
                                <div class="d-flex flex-column flex-grow-1 py-2 py-lg-13 me-2">
                                    <a href="#" class="fw-bolder text-dark fs-4 mb-2 text-hover-primary">
                                        <x-name />
                                    </a>
                                    <span class="fw-bold text-muted fs-5">
                                        <x-email />
                                    </span>
                                </div>
                                <img src="{{ file_exists($user['image']) ? asset($user['image']) : asset('assets/media/avatars/blank.png') }}"
                                    alt="Profile avatar" class="align-self-end h-100px" />
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 2-->
                    </div>

                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                            style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-2.svg">
                            <!--begin::Body-->
                            <div class="card-body">
                                <a href="#"
                                    class="card-title fw-bolder text-muted text-hover-primary fs-4">Username</a>
                                <p class="text-dark-75 fw-bold fs-5 m-0 mb-2">
                                    <x-username />
                                </p>

                                <a href="#" class="card-title fw-bolder text-muted text-hover-primary fs-4">Phone
                                    Number</a>
                                <p class="text-dark-75 fw-bold fs-5 m-0 mb-2">
                                    <x-phone-number />
                                </p>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>

                    <div class="col-xl-4">
                        <!--begin::Statistics Widget 1-->
                        <div class="card bgi-no-repeat card-xl-stretch mb-xl-8"
                            style="background-position: right top; background-size: 30% auto; background-image: url(assets/media/svg/shapes/abstract-4.svg">
                            <!--begin::Body-->
                            <div class="card-body">
                                <p class="text-dark-75 fw-bold fs-5 m-0">Track and follow-up with
                                    your
                                    loan applications</p>

                                <a href="{{ route('client.loans.create') }}"
                                    class="btn btn-primary fw-bold px-6 py-3 mt-10">Request Loan</a>
                            </div>
                            <!--end::Body-->
                        </div>
                        <!--end::Statistics Widget 1-->
                    </div>
                </div>
                <!--end::Row-->
            </div>
        </div>
        <!--end::Body-->
    </div>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Card-->
            <div class="card">
                <div class="card-header border-0 pt-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bolder fs-3 mb-1">Loan Application History</span>
                        <span class="text-muted mt-1 fw-bold fs-7">All loan applications created as of
                            {{ date('M, d Y') }}</span>
                    </h3>
                </div>

                <div class="card-body py-4">
                    <div class="card-title">
                        <!--begin::Search-->
                        <div class="d-flex align-items-center position-relative my-1">
                            <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2"
                                        rx="1" transform="rotate(45 17.0365 15.1223)" fill="black"></rect>
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="black"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search loan history">
                        </div>
                        <!--end::Search-->
                    </div>
                    <div class="table-responsive">
                        <!--begin::Table-->
                        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                            <!--begin::Table head-->
                            <thead>
                                <!--begin::Table row-->
                                <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Amount</th>
                                    <th class="text-center">Duration</th>
                                    <th class="text-center">Loan Type</th>
                                    <th class="text-center">Status</th>
                                    <th>Date Requested</th>
                                    <th>Date Approved</th>
                                    <th class="text-end min-w-100px">Actions</th>
                                </tr>
                                <!--end::Table row-->
                            </thead>
                            <!--end::Table head-->
                            <!--begin::Table body-->
                            <tbody class="text-gray-600 fw-bold">
                                <!--begin::Table row-->
                                @foreach ($loans as $loan)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td class="text-center">{{ !empty($loan['loan_amount']) ? $loan->amount() : 0 }}
                                        </td>
                                        <td class="text-center">{{ !empty($loan['duration']) ? $loan['duration'] : 0 }}
                                        </td>
                                        <td class="text-center">
                                            {{ !empty($loan['loan_type']) ? $loan->type()->name : 'Unavailable' }}
                                        </td>
                                        <td class="text-center">
                                            <div class="badge badge-{{ $loan->status()->class }} fw-bolder">
                                                {{ !empty($loan['status']) ? $loan->status()->name : 'Unavailable' }}
                                            </div>
                                        </td>
                                        <td>{{ $loan->dateCreated() }}</td>
                                        <td>{{ $loan->dateApproved() }}</td>
                                        <td class="text-end">
                                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm"
                                                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                                                <span class="svg-icon svg-icon-5 m-0">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none">
                                                        <path
                                                            d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                                            fill="black" />
                                                    </svg>
                                                </span>
                                                <!--end::Svg Icon-->
                                            </a>
                                            <!--begin::Menu-->
                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                                                data-kt-menu="true">
                                                @if ($loan->status()->name == 'Pending')
                                                    <div class="menu-item px-3">
                                                        <a href="{{ route('client.loans.edit', $loan['uuid']) }}"
                                                            class="menu-link px-3 text-warning"> <i
                                                                class="bi bi-pencil-square text-warning"></i><span
                                                                style="margin-left: 0.5rem !important; margin-top: 0.1rem">Edit</span></a>
                                                    </div>
                                                    <div class="menu-item px-3">
                                                        <a href="#"
                                                            onclick="event.preventDefault(); document.getElementById('delete-loan').submit();"
                                                            class="menu-link px-3 text-danger"
                                                            data-kt-users-table-filter="delete_row" title="Delete"><i
                                                                class="bi bi-trash text-danger"></i> <span
                                                                style="margin-left: 0.5rem !important; margin-top: 0.1rem">Delete</span></a>

                                                        <form id="delete-loan"
                                                            action="{{ route('client.loans.destroy', $loan['uuid']) }}"
                                                            method="POST" class="d-none">
                                                            @csrf @method('DELETE')
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                            <!--end::Menu-->
                                        </td>
                                    </tr>
                                @endforeach
                                <!--end::Table row-->
                            </tbody>
                            <!--end::Table body-->
                        </table>
                        <!--end::Table-->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
