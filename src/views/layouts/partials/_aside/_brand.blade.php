<!-- begin:: Aside -->
<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
  <div class="kt-aside__brand-logo">
    <a href="{{ config('dashboard.redirect_after_login') ? url(config('dashboard.redirect_after_login')) : route('admin.dashboard.index') }}">
      <img alt="Brand" src="{{brandLogo()}}">
    </a>
  </div>
  <div class="kt-aside__brand-tools">
    <button class="kt-aside__brand-aside-toggler" id="kt_aside_toggler"><span></span></button>
  </div>
</div>

<!-- end:: Aside -->
