@extends('dashboard::layouts.app')

@section('page_title', 'Create Main Menu')
@section('page_tagline', '')

@section('content')
  @include('dashboard::msg.message')
  <!--begin::Portlet-->
  <div class="kt-portlet">
    <div class="kt-portlet__head">
      <div class="kt-portlet__head-label">
        <h3 class="kt-portlet__head-title">

        </h3>
      </div>
    </div>

    <!--begin::Form-->
    <form id="menu-form" action="{{ route('main-menu.store') }}" method="POST" class="kt-form kt-form--label-right">
      <div class="kt-portlet__body">
        @csrf

        <div class="form-group row">
          <label for="serial_no" class="col-2 col-form-label">Serial No *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="serial_no" name="serial_no" value="{{ old('serial_no') }}" placeholder="Serial No." required>
          </div>
        </div>
        <div class="form-group row">
          <label for="menu_name" class="col-2 col-form-label">Menu Title *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="menu_name" name="menu_name" value="{{ old('menu_name') }}" placeholder="Menu Title" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="route_name" class="col-2 col-form-label">Route Url *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="route_name" name="route_name" value="{{ old('route_name') }}" placeholder="Route Url" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="selector" class="col-2 col-form-label">Selector *</label>
          <div class="col-10">
            <input class="form-control" type="text" id="selector" name="selector" value="{{ old('selector') }}" placeholder="Menu ID Selector" required>
          </div>
        </div>
        <div class="form-group row">
          <label for="icon" class="col-2 col-form-label">Icon Name</label>
          <div class="col-10">
            <input class="form-control" type="text" id="icon" name="icon" value="{{ old('icon') }}" placeholder="fa fa-home">
          </div>
        </div>
        <div class="form-group row">
          <label for="status" class="col-2 col-form-label">Status *</label>
          <div class="col-10">
            <div class="kt-radio-inline">
              <label class="kt-radio">
                <input type="radio" name="status" value="1"
                  {{(old('status') !== 0) ? 'checked' : ''}}>
                Active
                <span></span>
              </label>
              <label class="kt-radio">
                <input type="radio" name="status" value="0"
                  {{(old('status') === 0) ? 'checked' : ''}}>
                Inactive
                <span></span>
              </label>
            </div>
            <span class="form-text text-muted"></span>
          </div>
        </div>
        <div class="kt-portlet__foot">
          <div class="kt-form__actions">
            <div class="row">
              <div class="col-2">
              </div>
              <div class="col-10">
                <a href="{{ route('main-menu.index') }}" class="btn btn-primary">Cancel</a>
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

  <!--end::Portlet-->
@endsection

@push('scripts')
  <script>
      $('#main-menus-mm').addClass('kt-menu__item--submenu kt-menu__item--open kt-menu__item--here');
      $('#main-menus--create-sm').addClass('kt-menu__item--active');
  </script>
@endpush
