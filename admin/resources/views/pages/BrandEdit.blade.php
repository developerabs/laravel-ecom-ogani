@extends('layouts.app2')
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Brand</a>
        <span class="breadcrumb-item active">Update Brand</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Update this Brand</h6>
            <form action="{{ url('/updateBrand') }}" method="POST">
                @csrf
                <input type="hidden" name="id" value="{{ $data->id}}">
                <div class="form-layout">
                    <div class="row mg-b-10">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="brand_update" value="{{ $data->brand_name}}" placeholder="Enter Brand Name....." required>
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