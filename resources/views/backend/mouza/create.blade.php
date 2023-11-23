@extends('dashboard')

@section('active')
active
@endsection
@section('title')
Mouza
@endsection


@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">মৌজা যুক্ত করুন</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Mouza</a></li>
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

    <div class="col-md-10 m-auto ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <a class="h6 btnfon">মৌজা যুক্ত করুন</a>
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
                <form action="{{route('mouza.store')}}" method="post">
                    @csrf
                    <div class="form-group row">
                        <div class="col-md-4 my-2">
                            <label for="" class="inputcss" >জেলা সিলেক্ট করুন</label>
                            <select name="district_id" id="districtId" class="form-control selectfont select2bs4" id="">
                                <option selected="selected" disabled>কাচারী সিলেক্ট করুণ</option>
                                @forelse ($districts as $district)
                                <option value="{{$district->id }}">{{$district->name}}</option>
                                @empty
                                <h5>There Are no data Available to show</h5>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4 my-2">
                            <label for="" class="inputcss" >সিলেক্ট উপজেলা</label>
                            <select name="upzila_id" id="thanaId" class="form-control selectfont select2bs4" id="">

                            </select>
                        </div>
                        <div class="col-md-4 my-2">
                            <label for="" class="inputcss" >মৌজা লিখুন</label>
                            <input type="text" name="mouza" value="{{ old('mouza') }}" class="form-control" style="font-size: 13px" placeholder="কাচারীর নাম লিখুন ">
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
@push('js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
<script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
@endpush

<script>
$(document).ready(function() {
    $('.select2').select2();
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
})
</script>

<script type="text/javascript">
        $(document).ready(function () {
            $('#districtId').on('change', function () {
                var districtId = this.value;
                $('#thanaId').html('');
                $.ajax({
                    url: '{{ route('thana') }}?district_id='+districtId,
                    type: 'get',
                    success: function (res) {
                        console.log(res);
                        $('#thanaId').html('<option disabled selected > সিলেক্ট উপজেলা </option>');
                        $.each(res, function (key, value) {
                            $('#thanaId').append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                    }
                });
            });
        });
    </script>


@endsection
