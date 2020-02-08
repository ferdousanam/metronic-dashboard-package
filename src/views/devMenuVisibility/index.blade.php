@extends('dashboard::layouts.app')

@push('css')
    <style>
        .visibility-menus > ul {
            padding: 0;
        }

        ul {
            list-style: none;
        }

        ul .col-sm-12 {
            margin: 0;
            padding: 0;
        }

        ul .col-sm-12 > label {
            display: block;
            color: #fff;
            background-color: #337ab7;
            margin-top: 10px;
            padding-top: 7px;
            padding-bottom: 7px;
        }

        ul .col-sm-12 > label > input ~ span {
            margin: 7px;
        }

        #appmodule_view {
            border: 1px solid #e2d7d7;
            display: block;
        }
    </style>
@endpush

@section('page_title', 'Menu Visibility')
@section('page_tagline', 'Menu Visibility')

@section('content')
    @include('dashboard::msg.message')
    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">
                    Menu Visibility
                </h3>
            </div>
        </div>

        <!--begin::Form-->
        <form id="menu-form" action="{{ route('menu-visibility.update', 1) }}" method="POST"
              class="kt-form kt-form--label-right">
            <div class="kt-portlet__body">
                @method('PUT')
                @csrf

                <div class="visibility-menus">
                    {!! generate_visibility_menus() !!}
                </div>
                <div class="kt-portlet__foot">
                    <div class="kt-form__actions">
                        <div class="row">
                            <div class="col-2">
                            </div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success">Save</button>
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('#menu-visibility-mm').addClass('kt-menu__item--active');

            $('input[type=checkbox]').on("click", function () {
                let current_menu_id = $(this).val();
                if ($(this).is(':checked')) {

                    let parent = $(this).attr('parent-id');
                    $('#menu-id-' + parent).prop('checked', true);

                    let grand_parent = $('#menu-id-' + parent).attr('parent-id');
                    $('#menu-id-' + grand_parent).prop('checked', true);

                    console.log(current_menu_id + " is checked!");
                    console.log('Parent ID: ' + parent);
                } else {
                    console.log(current_menu_id + " is unchecked!");

                    let child = $('input[parent-id=' + current_menu_id + ']');
                    child.prop('checked', false);

                    child.each(function () {
                        let next_child = $('input[parent-id=' + $(this).val() + ']');
                        next_child.prop('checked', false);
                    });
                }
            });
        });
    </script>
@endpush
