@extends('dashboard')

@section('active')
active
@endsection
@section('title')
Licwncw type
@endsection


@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">কাচারীর ধরন যুক্ত </h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">kachari type</a></li>
        </ol>
    </div>
</div>
@endsection


@section('homesection')

<div class="row">

    <div class="col-md-7 m-auto ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfon">কাচারীর ধরন যুক্ত করুন</a>
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
                <form action="{{route('licence-type.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-12 my-2">
                            <label for="" class="inputcss" >কাচারীর ধরন নাস্বার</label>
                            <input type="text" readonly name="licence_type_number"  value="{{ $serial }}" name="name" class="form-control" style="font-size: 13px" placeholder="কাচারীর ধরন লিখুন ">
                        </div>

                        <div class="col-md-12 my-2">
                            <label for="" class="inputcss" >কাচারীর সিরিয়াল নাস্বার</label>
                            <input type="text" readonly name="licence_type_serial"  value="{{ $serialtwo }}" name="name" class="form-control" style="font-size: 13px" placeholder="কাচারীর ধরন লিখুন ">
                        </div>

                        <div class="col-md-12 my-2">
                            <label for="" class="inputcss" >কাচারীর ধরন লিখুন</label>
                            <input type="text"  value="{{ old('name') }}" name="name" class="form-control" style="font-size: 13px" placeholder="কাচারীর ধরন লিখুন ">
                        </div>

                        <div class="col-md-12 mt-3 text-right">
                            <button class="btn btn-success px-3 button btnfont" style="font-size: 14px" id="button">সংরক্ষন করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



</div>

@endsection
