@extends('layouts.app2')
@section('brandPage') active @endsection
@section('content')
<div class="sl-mainpanel">
    <nav class="breadcrumb sl-breadcrumb">
        <a class="breadcrumb-item" href="index.html">Starlight</a>
        <a class="breadcrumb-item" href="index.html">Tables</a>
        <span class="breadcrumb-item active">Data Table</span>
    </nav>
    <div class="sl-pagebody">
        <div class="card pd-20 pd-sm-40">
            <h6 class="card-body-title">Add New Brand</h6>
            <form action="{{ url('/addBrand') }}" method="POST">
                @csrf
                <div class="form-layout">
                    <div class="row mg-b-10">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <input class="form-control" type="text" name="brand_name" value="" placeholder="Enter Brand Name....." required>
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                    <div class="form-layout-footer">
                        <button type="submit" style="cursor: pointer;" class="btn btn-info mg-r-5">Add New</button>
                    </div><!-- form-layout-footer -->
                </div><!-- form-layout -->
            </form>
        </div><!-- card -->
    </div>
    <div class="sl-pagebody">
        <div class="sl-page-title">
            <h5>All Brands</h5>
            <p>DataTables is a plug-in for the jQuery Javascript library.</p>
        </div><!-- sl-page-title -->
        <div class="card pd-20 pd-sm-40">
            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">SL</th>
                            <th class="wd-15p">Category Name</th>
                            <th class="wd-20p">Category Slug</th>
                            <th class="wd-15p">Status</th>
                            <th class="wd-10p">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($i=1)
                        @foreach($data as $row)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $row->brand_name }}</td>
                            <td>{{ $row->brand_slug }}</td>
                            <td>
                                @if($row->status == 1)
                                    <a href="{{ url('/changeBrandStatus/'.$row->id) }}" class="btn btn-sm btn-success">Active</a>
                                @else
                                    <a href="{{ url('/changeBrandStatus/'.$row->id) }}" class="btn btn-sm btn-danger">Inactive</a>
                                @endif
                                
                            </td>
                            <td>
                                <a href="{{ url('/editBrand/'.$row->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                <a href="{{ url('/deleteBrand/'.$row->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @php($i++)
                        @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
        </div><!-- card -->
    </div>
</div>





@endsection

@section('script')
<script type="text/javascript">
    $('#datatable1').DataTable({
        responsive: true,
        language: {
            searchPlaceholder: 'Search...',
            sSearch: '',
            lengthMenu: '_MENU_ items/page',
        }
    });
</script>
@endsection