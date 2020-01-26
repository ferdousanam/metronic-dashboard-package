@extends('dashboard::layouts.app')

@push('css')
  <!-- Datatables -->
  <link href="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet">
@endpush

@section('page_title', 'Sub Menu')
@section('page_tagline', '')

@section('content')
  @include('dashboard::components.delete-modal')
  @include('dashboard::msg.message')
  <div class="kt-portlet kt-portlet--mobile">
    <div class="kt-portlet__head kt-portlet__head--lg">
      <div class="kt-portlet__head-label">
        <span class="kt-portlet__head-icon">
          <i class="kt-font-brand flaticon2-line-chart"></i>
        </span>
        <h3 class="kt-portlet__head-title">
          Sub Menu List
        </h3>
      </div>
    </div>
    <div class="kt-portlet__body">

      <!--begin: Datatable -->
    {!! $dataTable->table(['class' => 'table table-striped- table-bordered table-hover table-checkable dataTable no-footer dtr-inline'], true) !!}

    <!--end: Datatable -->
    </div>
  </div>
@endsection

@push('scripts')
  @include('dashboard::scripts.delete')
  <script type="text/javascript">
      $(document).ready(function () {
          $('#sub-menus-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
          $('#sub-menus-sm').addClass('kt-menu__item--active');
      });
  </script>
  <!-- Datatables -->
  <script src="{{asset('vendor/dashboard/assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
  <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}" type="text/javascript"></script>
  {!! $dataTable->scripts() !!}
@endpush
