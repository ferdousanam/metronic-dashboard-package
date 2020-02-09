<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>
  <base href="">
  <meta charset="utf-8"/>
  <title>{{ config('app.name') }} | @yield('page_tagline')</title>
  <meta name="description" content="Latest updates and statistic charts">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="base-url" content="{{ url('/') }}">

  <!--begin::Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">

  <!--end::Fonts -->

  <!--begin::Page Vendors Styles(used by this page) -->

  <!--end::Page Vendors Styles -->

  <!--begin::Global Theme Styles(used by all pages) -->
  <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css"/>

  <!--end::Global Theme Styles -->


  <!--begin::Layout Skins(used by all pages) -->

  <!--end::Layout Skins -->
  <link rel="shortcut icon" href="{{asset('uploads/project-info/') . '/' . project()->app_icon}}"/>
  <script>
    window.base_url = '{{ url("/") }}';
  </script>
@stack('css')

<!-- Custom Theme Style -->
</head>

<!-- end::Head -->

<!-- begin::Body -->

<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed">
<!-- begin:: Page -->
@include("dashboard::layouts.partials._header.base-mobile")
  <div id="app" class="kt-grid kt-grid--hor kt-grid--root">
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">

      @include("dashboard::layouts.partials._aside.base")
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">

        @include("dashboard::layouts.partials._header.base")
        <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        @include('dashboard::layouts.partials._subheader.subheader-v2')

        <!-- begin:: Content -->
          <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            @yield('content')
          </div>

          <!-- end:: Content -->
        </div>

        @include("dashboard::layouts.partials._footer.base")
      </div>
    </div>
  </div>
<!-- end:: Page -->

<!-- begin::Global Config(global config for global JS sciprts) -->
<script>
    var KTAppOptions = {
        "colors": {
            "state": {
                "brand": "#2c77f4",
                "light": "#ffffff",
                "dark": "#282a3c",
                "primary": "#5867dd",
                "success": "#34bfa3",
                "info": "#36a3f7",
                "warning": "#ffb822",
                "danger": "#fd3995"
            },
            "base": {
                "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
            }
        }
    };
</script>

<!-- end::Global Config -->

<!--begin::Global Theme Bundle(used by all pages) -->
<script src="{{asset('js/all.js')}}" type="text/javascript"></script>
<script src="{{asset('js/app.js')}}" type="text/javascript"></script>
{{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}

<!--end::Global Theme Bundle -->

<!--begin::Page Vendors(used by this page) -->
<script src="{{asset('vendor/dashboard/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js')}}" type="text/javascript"></script>
<script src="{{asset('vendor/dashboard/assets/plugins/custom/gmaps/gmaps.js')}}" type="text/javascript"></script>

<!--end::Page Vendors -->

<!--begin::Page Scripts(used by this page) -->
@stack('scripts')

<!--end::Page Scripts -->
</body>

</html>
