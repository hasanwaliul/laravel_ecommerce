@extends('admin.layouts.master')
@section('title', 'Sub Subcategory')
@section('categories')
active show-sub
@endsection
@section('add-sub-sub-categories')
active
@endsection
@section('content')

<nav class="breadcrumb sl-breadcrumb">
    <span class="breadcrumb-item active">Dashboard</span>
    <a class="breadcrumb-item" href="">Sub Sub-Category</a>
</nav>

<div class="sl-pagebody">
    {{-- Form Part Start --}}
    <div class="row row-sm">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    @if(Session::has('success'))
                    <div class="alert alert-success alertsuccess" role="alert">
                        <strong> {{ Session::get('success')}} </strong>
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-warning alerterror" role="alert">
                        <strong> {{ Session::get('error') }} </strong>
                    </div>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>
            <div class="card pd-20 pd-sm-40 form-layout form-layout-4">
                <h6 class="card-body-title">Add New Sub SubCategory</h6>
                <form action=" {{ route('sub-sub-category-add') }} " method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row mg-t-20 form-group {{ $errors->has('category_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility  --}}
                        <label class="col-sm-4 form-control-label">Select Category: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="category_id" id="" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                                @foreach ($categories as $category)
                                <option value=" {{ $category->category_id }} "> {{ $category->category_name_en }} </option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20 form-group  {{ $errors->has('subcategory_id') ? ' has-error' : '' }}">
                        {{-- Select option with search facility  --}}
                        <label class="col-sm-4 form-control-label">Select SubCategory: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <select class="form-control select2-show-search" name="subcategory_id" data-placeholder="Choose one">
                                <option label="Choose one"></option>
                            </select>
                            @error('subcategory_id')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-10 form-group  {{ $errors->has('subsubcateg_name_en') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name EN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Sub Subcategory Name in English"
                                name="subsubcateg_name_en" value="{{ old('subsubcateg_name_en') }}">

                            @error('subsubcateg_name_en')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div><!-- row -->
                    <div class="row mg-t-20  form-group  {{ $errors->has('subsubcateg_name_bn') ? ' has-error' : '' }}">
                        <label class="col-sm-4 form-control-label">Name BN: <span class="tx-danger">*</span></label>
                        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
                            <input type="text" class="form-control" placeholder="Enter Sub Subcategory Name in Bangla"
                                name="subsubcateg_name_bn" value="{{ old('subsubcateg_name_bn') }}">

                            @error('subsubcateg_name_bn')
                            <span class="text-danger"> {{ $message }} </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-layout-footer mg-t-30  form-group">
                        <button type="submit" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </form>
            </div><!-- card -->
        </div>
        <div class="col-md-2"></div>
    </div>
    {{-- Form Part End --}}
    <br><br><br>
    {{-- Table Part Start --}}
    <div class="row row-sm">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">All Sub Sub-Categories</h6>
                <br>
                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap table-primary mg-b-0">
                        <thead>
                            <tr>
                                <th class="wd-20p">Category Name</th>
                                <th class="wd-20p">SubCategory Name</th>
                                <th class="wd-25p">Sub Subcateg Name EN</th>
                                <th class="wd-25p">Sub Subcateg Name BN</th>
                                <th class="wd-10p">Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($subsubcategories as $subsubcategory )
                            <tr>
                                <td><p>{{ isset($subsubcategory->categoryfuncSubsub) ? $subsubcategory->categoryfuncSubsub->category_name_en: '-'}}</p></td>
                                <td><p>{{ isset($subsubcategory->subcategoryfuncSubsub) ? $subsubcategory->subcategoryfuncSubsub->subcategory_name_en: '-'}}</p></td>
                                <td> {{ $subsubcategory->subsubcategory_name_en }} </td>
                                <td> {{ $subsubcategory->subsubcategory_name_bn }} </td>
                                <td>
                                    <a href=" {{ url('admin/subsubcategory-edit/'.$subsubcategory->subsubcategory_id) }} " class="btn btn-primary" title="Edit"><i class="tx-18 fa fa-pencil-square-o"></i></a>
                                    <a href=" {{ url('admin/subsubcategory-delete/'.$subsubcategory->subsubcategory_id) }} " class="btn btn-danger" title="Delete" id="delete"><i class="tx-18 fa fa-trash"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div>
        <div class="col-md-1"></div>
    </div><!-- row -->
    {{-- Table Part End --}}
</div>
<br><br><br><br><br><br><br><br><br><br>
@endsection
@section('scripts')
    <script>
         $("select[name='category_id']").on('change', function (event) {
        var catg_id = $(this).val();

        /* ==== ajax request ==== */
        if (catg_id) {
            $.ajax({
                url: "{{ url('category-wise/subcategory/') }}/" + catg_id,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    // response
                    if (data == "") {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Sub Category Not Found!</option>');
                    } else {
                        $('select[name="subcategory_id"]').empty();
                        $('select[name="subcategory_id"]').append('<option value="">Select Sub Category</option>');
                        // data load
                        $.each(data, function (key, value) {
                            $('select[name="subcategory_id"]').append('<option value="' + value.subcategory_id + '">' + value.subcategory_name_en + '</option>');
                        });
                        // data load
                    }
                    // response
                },
            });
        }
        /* ==== ajax request ==== */
    });
    </script>
@endsection
