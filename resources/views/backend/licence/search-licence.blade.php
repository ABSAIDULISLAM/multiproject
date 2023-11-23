@extends('dashboard')

@section('active')
active
@endsection
@section('title')
Licence
@endsection

@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">লাইসেন্স খুজুন</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('licence.add')}}" class="btn btn-outline-success button btnfont">Add Licence</a></li>
        </ol>
    </div>
</div>
@endsection

@push('css')
<link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">
<link rel="stylesheet" href="{{asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ')}}">
@endpush



@section('homesection')

<div class="row">

    <div class="col-md-4 ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfont">লাইসেন্স অনুযায়ী</a>
            </div>
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
                <form action="{{route('licence_search_number')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12 my-3">
                            <input type="number" name="licence_number" value="{{old('licence_number')}}" style="font-size: 13px" class="form-control" placeholder="লাইসেন্স নং লিখুন">
                        </div>
                        <div class="col-md-12 text-right">
                            <button class="btn btn-success px-3 button btnfont" style="font-size: 14px" id="button">খোজ করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-4 ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfont">কাচারীর/স্টেশন/লাইসেন্সের ধরন অনুযায়ী</a>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    <div class="form-group row">

                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>কাচারীর সিলেক্ট করুন</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>স্টেশন সিলেক্ট করুন</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>লাইসেন্সের ধরন সিলেক্ট করুণ</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 text-right mt-3">
                            <button class="btn btn-success px-3 button btnfont" style="font-size: 14px" id="button">খোজ করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4 ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfont">জেলা/উপজেলা/মৌজা/লাইসেন্সের ধরন অনুযায়ী</a>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    @csrf

                    <div class="form-group row">
                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>জেলা সিলেক্ট করুন</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-3">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>উপজেলা সিলেক্ট করুন</option>
                                <option value="">Search</option>
                                <option value="">asdf</option>
                                <option value="">rweer</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>মৌজা সিলেক্ট করুন</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 my-1">
                            <select name="" id="" class="form-control btnfont select2bs4" style="width: 100%;">
                                <option selected disabled>লাইসেন্সের ধরন সিলেক্ট করুণ</option>
                                <option value="">Search</option>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3 text-right">
                            <button class="btn btn-success px-3 button btnfont" style="font-size: 14px" id="button">খোজ করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


</div>
@push('js')
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@endpush
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
$(document).ready(function() {

    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
})

</script>
@endsection
