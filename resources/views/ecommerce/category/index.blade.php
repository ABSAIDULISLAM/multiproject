@extends('ecommerce.master')

@section('active')
active
@endsection
@section('title')
Category
@endsection


@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h4 class="m-0">Category Manage</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('ecommerce.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Station</a></li>
            </ol>
        </div>
    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush


@section('homesection')
    <div class="row">

        <div class="col-md-8 order-2 order-md-1">
            <div class="card card-outline card-primary">
                <div class="card-body">

                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Image(s)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $category->name }}</td>

                                    @if ($category->image)

                                    <td><img src="{{ asset($category->image) }}" alt="" height="40px" width="55px"></td>

                                    @elseif ($category->image==null)
                                    <td>N/A</td>
                                    @endif

                                    <td>{{ $category->status==1? 'Active': 'Ineative'}}</td>
                                    <td>
                                        <a href="" class="badge badge-success" >edit</a>
                                        <a href="">delete</a>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <h2>No Data Here</h2>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4 order-1 order-md-2">
            <div class="card card-outline card-success">
                <div class="card-header"><h4>Create Category</h4></div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    @php
                                        toastr()->error($error);
                                    @endphp
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{route('category.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12 my-2">
                                <label for="">Category Name</label>
                                <input type="text" class="form-control" name="name" >
                            </div>
                            <div class="col-md-12 my-2">
                                <label for="">Category Image</label>
                                <input type="file" class="form-control" name="image">
                            </div>

                            <div class="col-md-12 mt-4 text-right d-block">
                                <button type="submit" class="d-block btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
    @push('js')
        <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>



        <!-- jQuery -->
        <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <!-- DataTables  & Plugins -->
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        {{-- <script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
        <script src="{{ asset('assets/dist/js/demo.js') }}"></script> --}}
    @endpush
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
    <script>
        $(document).ready(function() {

            $('.select2').select2();
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        })
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
