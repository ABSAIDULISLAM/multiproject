@extends('dashboard')

@section('active')
active
@endsection
@section('title')
Kachari
@endsection


@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">কাচারি যুক্ত</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('licence')}}" class="btn btn-outline-success button btnfont">কাচারি দেখুন</a></li>
        </ol>
    </div>
</div>
@endsection


@section('homesection')

<div class="row">

    <div class="col-md-7 m-auto ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfon">কাচারী যুক্ত</a>
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
                <form action="{{route('kachari.store')}}" method="post">
                    @csrf
                    @php

                    @endphp
                    <div class="form-group row">
                        <div class="col-md-6 my-2">
                            <label for="" class="inputcss" >কাচারীর নাম্বার লিখুন</label>
                            <input type="number" readonly name="kachari_serial" value="{{$serial}}" class="form-control" style="font-size: 13px" placeholder="কাচারীর নাম্বার লিখুন">
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="" class="inputcss" >কাচারীর নাম লিখুন</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="font-size: 13px" placeholder="কাচারীর নাম লিখুন ">
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
