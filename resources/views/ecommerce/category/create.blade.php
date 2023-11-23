@extends('ecommerce.master')

@section('active')
    active
@endsection
@section('title')
    Kachari
@endsection

@section('toproute')
    <div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
        <div class="col-sm-6">
            <h5 class="m-0">Category view</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('ecommerce.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item">Category</li>
            </ol>
        </div>
    </div>
@endsection


@section('homesection')
    <div class="row">

        <div class="col-md-12 m-auto">
            <div class="card card-outline card-primary">

                <div class="card-body">

                    <div class="card card-default">

                        <div class="card-header">
                            <a href="{{ route('category.create') }}" class="btn btn-outline-primary">Check Category</a>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group row">

                                    <div class="col-md-6">
                                        <label for="">Category Name <span style="font-size:18px; color:red">*</span></label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pt-1">Category Image </label>
                                        <input type="file" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pt-1">Category Tags </label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pt-1">Name</label>
                                        <input type="text" class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="pt-1">Name</label>
                                        <input type="text" class="form-control" >
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
