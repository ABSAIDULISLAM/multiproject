@extends('dashboard')

@section('active')
active
@endsection
@section('title')
জেলা যুক্ত
@endsection


@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">জেলা যুক্ত</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Station</a></li>
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

    <div class="col-md-8 m-auto">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfon">জেলা যুক্ত করুন</a>
                {{-- <a href="" class="btn btn-success btnfont" id="button" >Licence Check</a> --}}
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
                <form action="{{route('distrct.store')}}" method="post">
                    @csrf
                    <div class="form-group row">

                        <div class="col-md-6 my-2">
                            <label for="" class="inputcss" >সিলেক্ট কাচারী</label>
                            <select name="kachari_id" class="form-control selectfont select2bs4" id="">
                                    <option selected="selected" disabled>কাচারী সিলেক্ট করুণ</option>
                                @forelse ($kacharis as $kachari)
                                    <option value="{{$kachari->id}}">{{$kachari->name}}</option>
                                @empty
                                    <h5>There Are no data Available to show</h5>
                                @endforelse
                            </select>
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="" class="inputcss" >জেলার নাম লিখুন</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" style="font-size: 13px" placeholder="জেলার নাম লিখুন ">
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
