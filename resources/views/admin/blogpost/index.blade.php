@extends('layouts.master')

@section('page_sub_title')
    <div class="col-sm-6">
        <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
            <li class="m-nav__item m-nav__item--home">
                <a href="{{route('admin.dashboard')}}" class="m-nav__link m-nav__link--icon">
                    <i class="m-nav__link-icon la la-home"></i>
                </a>
            </li>
            <li class="m-nav__separator">-</li>
            <li class="m-nav__item">
                <a href="javascript:void(0);" class="m-nav__link">
                    <span class="m-nav__link-text">Blog Posts</span>
                </a>
            </li>
        </ul>
    </div>
    <div class="col-sm-6">
        <div class="row">
            <div class="col-sm-8">
                <select class="form-control m_selectpicker" placeholder="Status">
                    <option selected disabled hidden>Choose Status</option>
                    <option >Active</option>
                    <option >InActive</option>
                </select>
            </div>
            <div class="col-sm-2">
                <a href="javascript:void(0);" class="btn m-btn--square btn-outline-info" id="filter_btn" style="float:right;">
                    Filter
                </a>
            </div>
        </div>
    </div>
@endsection

@section('page_content')
    <div class="m-portlet m-portlet--mobile" m-portlet="true">
        <div class="m-portlet__head">
            <div class="m-portlet__head-caption">
                <div class="m-portlet__head-title">
                    <h3 class="m-portlet__head-text">
                        Categories
                    </h3>
                </div>
            </div>
            <div class="m-portlet__head-tools">
                <a href="{{route('admin.blogpost.create')}}" class="btn m-btn--square btn-outline-info btn-sm m-btn m-btn--custom m-1">
                    <span>
                        <i class="la la-plus"></i>
                        <span>
                            New Blog Post
                        </span>
                    </span>
                </a>
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a href="javascript:;" m-portlet-tool="fullscreen" class="btn m-btn--square m-btn m-btn--custom btn-bizinabox btn-sm">
                            <i class="la la-expand"></i>
                        </a>
                    </li>
                </ul>
            </div>

        </div>
        <div class="m-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable table-center" id="datatable">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Post URL</th>
                    <th>Subcategory</th>
                    <th>Title</th>
                    <th>Thumbnail</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($blogposts as $blogpost)
                    <tr>
                        <td>{{$blogpost->id}}</td>
                        <td>{{$blogpost->postUrl}}</td>
                        <td>{{$blogpost->subcategory->name}}</td>
                        <td>{{$blogpost->title}}</td>
                        <td>{{$blogpost->thumbnail}}</td>
                        <td>{{$blogpost->created_at}}</td>
                        <td>
                            <div class="row w-100 d-flex justify-content-center">
                                <a href="{{route('admin.blogpost.edit', $blogpost->id)}}" class="m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Edit">
                                    <i class="la la-edit"></i>
                                </a>
                                <form method="POST" action="{{route('admin.blogpost.destroy',$blogpost->id)}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="delete-item m-portlet__nav-link btn m-btn m-btn--hover-brand m-btn--icon m-btn--icon-only m-btn--pill" title="Delete">
                                        <i class="la la-remove"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



    <div class="modal fade" id="m_modal_6" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>
                        Do you really want to delete it?
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    <button type="button" id="delet-confirm" class="btn btn-danger">Confirm</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page_scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $("#datatable").DataTable({
                responsive: !0,
                lengthMenu: [5, 10, 25, 50],
                pageLength: 10,
            });
            $(".m_selectpicker").selectpicker();

            $(document).on('click','.delete-item', function (e) {
                e.preventDefault();
                let form = $(this).parents('form');
                $('#m_modal_6').modal('show');
                $('#delet-confirm').click(function () {
                    form.submit();
                })
            })
        });
    </script>
@endsection
