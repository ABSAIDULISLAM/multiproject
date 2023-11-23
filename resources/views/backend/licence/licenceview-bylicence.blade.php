@extends('dashboard')

@section('title')
    Licence View
@endsection

@section('toproute')
<div class="row mb-2" style="box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px; padding: 8px; background-color:#fff">
    <div class="col-sm-6">
        <h1 class="m-0">লাইসেন্স দেখুন</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('licence')}}" class="btn btn-outline-success button btnfont">লাইসেন্স খুজুন</a></li>
        </ol>
    </div>
</div>
@endsection

@push('css')
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css ') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
@endpush

@section('homesection')
    <div class="row">
        <div class="col-md-12 ">
            <div class="card card-outline card-primary">

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="" class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-md-1" style="width:3%">#</th>
                                    <th scope="col" class="col-md-1" style="width:7%">লাইসেন্স</th>
                                    <th scope="col" class="col-md-1" style="width:7%">কাচারী</th>
                                    <th scope="col" class="col-md-1" style="width:7%">ষ্টেশন</th>
                                    <th scope="col" class="col-md-3" style="width:20%;">গ্রহিতা</th>
                                    <th scope="col" class="col-md-2" style="width:18%">তফসিল</th>
                                    <th scope="col" class="col-md-1" style="width:7%">জমির পরিমান</th>
                                    <th scope="col" class="col-md-1" style="width:7%">ধরন</th>
                                    <th scope="col" class="col-md-1" style="width:7%">মেয়াদ কাল</th>
                                    <th scope="col" class="col-md-1" style="width:7%">অবস্থা</th>
                                    <th scope="col" class="col-md-1" style="width:10%">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($licences as $licence)
                                <tr>
                                    <td style="width:2%; font-size:14px;padding:0px; margin:0xpx; text-align:center;">{{$loop->index+1}}</td>
                                    <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{$licence->licence_no}}</td>
                                    <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{$licence->kachari->name}} </td>
                                    <td style="width:5%; font-size:14px;padding:2px; margin:2px ;text-align:center;">{{$licence->station->name}} </td>
                                    <td style="width:25%; font-size:14px; padding:3px;margin:3px; ">
                                        @foreach ($licence->licenceholder as $lsinfo)
                                        <span>{{$loop->index+1}} . </span><br> <span> নাম: {{$lsinfo->licence_holder}}</span>, <br> <span>পিতা/স্বামী: {{$lsinfo->father_name}}</span>, <br> <span> ঠিকানা: {{$lsinfo->address}}</span>, <br> <span>এনআইডি: {{$lsinfo->nid}}</span>, <br> <span>জন্মতারিখ: {{$lsinfo->date_of_birth}}</span>, <br> <span>ফোন: {{$lsinfo->mobile}}</span> <br><br>
                                        @endforeach
                                    </td>
                                    <td style="width:23%; font-size:14px; padding:3px;margin:3px; ">
                                        <span>জেএল নং: {{$licence->jl_no}} </span>, <span>দাগ নং: {{$licence->dag_no}}</span>, <span>প্লট নং: {{$licence->plot_no}}</span>, <span>মৌজা: {{$licence->mouza->mouza}}</span>, <span>উপজেলা: {{$licence->upzila->name}}</span>, <span>জেলা: {{$licence->district->name}}</span>,
                                    </td>
                                    @if ($licence->licence_type_id==1)
                                        <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{ $licence->land_total }}.00 বর্গ.</td>
                                    @else
                                        <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{ $licence->land_total }} একর</td>
                                    @endif
                                    <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{$licence->licencetype->name}}</td>
                                    <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;"text-align:center;>{{$licence->validity}}</td>
                                    <td style="width:5%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">{{$licence->status=="pending"? 'Pending' : 'active'}}</td>
                                    <td style="width:15%; font-size:14px;padding:0px; margin:0xpx;text-align:center;">
                                        <a href="#">edit</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('js')
        <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    @endpush
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(function () {
          $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
            "buttons": ["pdf", "print"]
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
