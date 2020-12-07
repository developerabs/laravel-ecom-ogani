@extends('layouts.app2')
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Category</a>
        <span class="breadcrumb-item active">Update Category</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update this Category</h6>
            <form action="{{ url('/updateCategorys') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id}}">
                <div class="form-layout">
                    <div class="row mg-b-10">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="category_update" value="{{ $data->category_name}}" placeholder="Enter Category Name.....">
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" class="btn btn-info mg-r-5">Update</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div><!-- card -->
    </div>
</div>
@endsection