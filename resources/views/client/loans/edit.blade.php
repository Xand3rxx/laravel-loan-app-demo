@extends('layouts.app')
@section('title', 'Edit Loan Request')
@section('content')

    <div class="toolbar py-5 py-lg-5" id="kt_toolbar">
        <!--begin::Container-->
        <div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
            <!--begin::Page title-->
            <div class="page-title d-flex flex-column me-3">
                <!--begin::Title-->
                <h1 class="d-flex text-dark fw-bolder my-1 fs-3">Edit</h1>
                <!--end::Title-->
                <!--begin::Breadcrumb-->
                <x-breadcrumb title="Loans" sub-title="Edit loan request" />
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page title-->
        </div>
        <!--end::Container-->
    </div>

    <div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
        <!--begin::Post-->
        <div class="content flex-row-fluid" id="kt_content">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-lg-row">
                <!--begin::Content-->
                <div class="flex-lg-row-fluid mb-10 mb-lg-0 me-lg-6 me-xl-6 col-7">
                    <!--begin::Card-->
                    <div class="card">
                        <!--begin::Card body-->
                        <div class="card-body p-12">
                            <!--begin::Form-->
                            <form method="POST" action="{{ route('client.loans.update', $loan['uuid']) }}">
                                @csrf @method('PUT')
                                <div class="flex-lg-auto min-w-lg-300px">
                                    <div class="mb-10">
                                        @include('client.loans.includes._form')
                                    </div>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Card body-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Content-->
                <!--begin::Sidebar-->
                <div class="flex-lg-auto min-w-lg-300px col-5">
                    <div class="pb-5 fs-6">
                        <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed mb-9 p-6">
                            <!--begin::Icon-->
                            <!--begin::Svg Icon | path: icons/duotune/art/art006.svg-->
                            <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                                <img src="{{ asset('assets/media/icons/duotune/general/gen044.svg') }}" />
                            </span>
                            <!--end::Svg Icon-->
                            <!--end::Icon-->
                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-grow-1">
                                <!--begin::Content-->
                                <div class="fw-bold">
                                    <div class="fs-6 text-gray-700"><strong>Fill up the loan request form with the
                                            correct information</div>
                                    <small class="mt-n4">Asterisk (<span class="text-danger">*</span>) next to a form
                                        control's
                                        label indicates that such field is <strong>"required"</strong></small>
                                </div>

                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                    </div>
                </div>
                <!--end::Sidebar-->
            </div>
            <!--end::Layout-->
        </div>
        <!--end::Post-->
    </div>

    @push('scripts')
        <script src="{{ asset('assets/js/cleave.min.js') }}"></script>
        <script>
            $('.select').select2({
                placeholder: 'Select...',
                closeOnSelect: false,
            });

            $('.select').val(null);

            // Numeral Formatting
            const sourceAmount = new Cleave('#loan_amount', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand'
            });

        </script>
    @endpush
@endsection
