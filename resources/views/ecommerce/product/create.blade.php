@extends('ecommerce.master')

@section('active')
active
@endsection
@section('title')
Product
@endsection

@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">Product Add</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('licence')}}" class="btn btn-outline-primary button btnfont">লাইসেন্স দেখুন</a></li>
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

    <div class="col-md-12 ">
        <div class="card card-outline card-primary">
            <div class="card-header">
                {{-- <a class="h6 btnfon"> যুক্ত</a> --}}
                <a href="" class="btn btn-outline-primary " id="" >Ipload Product</a>
                <a href="" class="btn btn-outline-primary " id="" >Download</a>
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

                <form action="{{route('licence.save')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group row">
                        
                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >কাচারী <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="kachari_id" id="kachariId" value="{{ old('kacari_id') }}" class="form-control selectfont select2bs4" id="">
                                <option style="font-size: 12px;" selected="selected" disabled>সিলেক্ট কাচারী</option>

                            </select>
                        </div>

                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >স্টেশন <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="station_id" id="station" value="{{ old('station_id') }}" class="form-control selectfont select2bs4" id="">

                            </select>
                        </div>

                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >লাইসেন্সের ধরন <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="licence_type_id" id="licencetype" value="{{ old('liceneType_id') }}" class="form-control selectfont select2bs4" id="">
                                <option selected="selected" disabled>লাইসেন্সের ধরন</option>

                            </select>
                        </div>

                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >প্লট নং</label>
                            <input type="text" name="plot_no" value="n/a"  class="form-control">
                        </div>

                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >জেএল নং</label>
                            <input type="text" name="jl_no" value="n/a" class="form-control">
                        </div>

                        <div class="col-md-2 my-2">
                            <label for="" class="inputcss" >দাগ নং</label>
                            <input type="text" name="dag_no" value="n/a" class="form-control">
                        </div>

                        {{-- tofsil area  --}}
                        <hr>
                        <div class="col-md-12 mt-2" style="background-color: #F4F6F9; padding: 5px;">
                            <label for="" class="inputcss" ><b>জমির তফসিল :</b></label>
                        </div>
                        <hr>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >জেলা <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="district_id" id="tldistrict" value="{{ old('district_id') }}"  class="form-control selectfont select2bs4" id="">
                                <option selected="selected" disabled>জেলা</option>

                            </select>
                        </div>
                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >উপজেলা <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="upzila_id" id="tlThana" value="{{ old('upzila_id') }}" class="form-control selectfont select2bs4" id="">

                            </select>
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >মৌজা <b style="font-size: 15px; color:red;">*</b></label>
                            <select name="mouza_id" id="tlMouza" value="{{ old('mouza_id') }}" class="form-control selectfont select2bs4" id="">

                            </select>
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >লাইসেন্স নং <b style="font-size: 15px; color:red;">*</b></label>
                            <input type="text" readonly name="licence_no" id="licence" value="{{ old('licence_no') }}" class="form-control licence" placeholder="লাইসেন্স নং লিখুন">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >জমির দৈর্ঘ্য</label>
                            <input type="number" id="height" name="land_height" value="{{ old('land_height') }}" class="form-control" placeholder="জমির দৈর্ঘ্য">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >জমির প্রস্থ</label>
                            <input type="number" id="width" name="land_width" value="{{ old('land_width') }}" class="form-control" placeholder="জমির প্রস্থ">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >জমির পরিমান <b style="font-size: 15px; color:red;">*</b></label>
                            <input id="totalLand" type="text" name="land_total" value="{{ old('land_total') }}" class="form-control" placeholder="মোট জমির পরিমান বর্গফুট/একর">
                        </div>


                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >মেয়াদ কাল <b style="font-size: 15px; color:red;">*</b></label>
                            <input type="text" name="validity" id="validity" value="{{ old('validity') }}" class="form-control" placeholder="সর্বশেষ মেয়াদ সাল">
                        </div>

                        {{-- tofsil area  --}}
                        <hr>
                        <div class="col-md-12 mt-2" style="background-color: #F4F6F9; padding: 5px;">
                            <label for="" class="inputcss" ><b>জমির চৌহদ্দি :</b></label>
                        </div>
                        <hr>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >উত্তরে</label>
                            <input type="text" name="north" value="n/a" class="form-control" placeholder="উত্তরে কে আছে ?">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >দক্ষিনে</label>
                            <input type="text" name="south" value="n/a" class="form-control" placeholder="দক্ষিনে কে আছে ?">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >পূর্বে</label>
                            <input type="text" name="east" value="n/a" class="form-control" placeholder="পূর্বে কে আছে ?">
                        </div>

                        <div class="col-md-3 my-2">
                            <label for="" class="inputcss" >পশ্চিমে</label>
                            <input type="text" name="west" value="n/a" class="form-control" placeholder="পশ্চিমে কে আছে ?">
                        </div>


                        {{-- grohitar are  --}}
                            <div class="col-md-12 mt-2 justify-content-between d-flex " style="background-color: #F4F6F9; padding: 5px;">
                                <label for="" class="inputcss" ><b>লাইসেন্স হোল্ডারের তথ্যাদি :</b></label>
                                <button type="button" class="btn btn-sm btn-success" id="increment">যুক্ত করুন</button>
                            </div>
                            <div class="col-md-12">
                                <div class="row" id="add">
                                    <div class="col-md-4 my-2">
                                        <label for="" class="inputcss" >লাইসেন্স হোল্ডারের নাম<b style="font-size: 15px; color:red;">*</b></label>
                                        <textarea name="licence_holder[]" id="" value="{{ old('licence_holder[]') }}" cols="2" rows="2" class="form-control"  placeholder="লাইসেন্স হোল্ডারের নাম"></textarea>
                                    </div>

                                    <div class="col-md-4 my-2">
                                        <label for="" class="inputcss" > পিতা/স্বামী <b style="font-size: 15px; color:red;">*</b></label>
                                        <textarea name="father_name[]" id="" cols="2" value="{{ old('father_name[]') }}" rows="2" class="form-control" placeholder="পিতা / স্বামী"></textarea>
                                    </div>

                                    <div class="col-md-4 my-2">
                                        <label for="" class="inputcss" >ঠিকানা <b style="font-size: 15px; color:red;">*</b></label>
                                        <textarea type="text" name="address[]" id="" value="{{ old('address[]') }}" cols="2" rows="2" class="form-control" placeholder="গ্রাম-ডাকঘর-উপজেলা-জেলা"></textarea>
                                    </div>

                                    <div class="col-md-3 my-2">
                                        <label for="" class="inputcss" >এনআইডি <b style="font-size: 15px; color:red;">*</b></label>
                                        <input type="text" name="nid[]" id="nid" value="{{ old('nid[]') }}" class="form-control" placeholder="এনআইডি">
                                    </div>

                                    <div class="col-md-3 my-2">
                                        <label for="" class="inputcss" >জন্ম তারিখ <b style="font-size: 15px; color:red;">*</b></label>
                                        <input type="date" name="date_of_birth[]" value="{{ old('date_of_birth[]') }}" class="form-control" placeholder="জন্ম তারিখ">
                                    </div>

                                    <div class="col-md-3 my-2">
                                        <label for="" class="inputcss" >মোবাইল <b style="font-size: 15px; color:red;">*</b></label>
                                        <input type="text" name="mobile[]" id="mobile" value="{{ old('mobile[]') }}" class="form-control" placeholder="মোবাইল">
                                    </div>

                                    <div class="col-md-3 my-2">
                                        <label for="" class="inputcss" >ছবি</label>
                                        <input type="file" name="image[]" class="form-control" placeholder="মোবাইল">
                                    </div>

                                </div>
                            </div>

                        <div class="col-md-12 mt-4 text-right">
                            <button class="btn btn-success px-3 button btnfont" style="font-size: 14px" id="button">সংরক্ষন করুন</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('js')
    <script src="{{asset('assets/plugins/select2/js/select2.full.min.js')}}"></script>
    @endpush
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

    @include('backend.ajax.ajax')

</div>



@endsection
