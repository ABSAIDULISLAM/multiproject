<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function () {
        // grohita district info
        $('#districtId').on('change', function () {
            var districtId = this.value;
            $('#thanaId').html('');
            $.ajax({
                url: '{{ route('thana') }}?district_id='+districtId,
                type: 'get',
                success: function (res) {
                    console.log(res);
                    $('#thanaId').html('<option selected disabled> সিলেক্ট উপজেলা </option>');
                    $.each(res, function (key, value) {
                        $('#thanaId').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        // grohita thana info to union info
        // $('#thanaId').on('change', function () {
        //     var thanaId = this.value;
        //     $('#union').html('');
        //     $.ajax({
        //         url: '{{ route('union') }}?union_id='+thanaId,
        //         type: 'get',
        //         success: function (res) {
        //             $('#union').html('<option selected disabled >সিলেক্ট ইউনিয়ন</option>');
        //             $.each(res, function (key, value) {
        //                 $('#union').append('<option value="' + value
        //                     .union_id + '">' + value.union_name + '</option>');
        //             });
        //         }
        //     });
        // });

        // tofsil district info to thana info
        $('#tldistrict').on('change', function () {
            var tldisId = this.value;
            $('#tlThana').html('');
            $.ajax({
                url: '{{ route('thana') }}?district_id='+tldisId,
                type: 'get',
                success: function (res) {
                    $('#tlThana').html('<option selected disabled >সিলেক্ট থানা</option>');
                    $.each(res, function (key, value) {
                        $('#tlThana').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        // tofsil thana info to mouza info
        $('#tlThana').on('change', function () {
            var tlMouza = this.value;
            $('#tlMouza').html('');
            $.ajax({
                url: '{{ route('mouza') }}?thana_id='+tlMouza,
                type: 'get',
                success: function (res) {
                    $('#tlMouza').html('<option selected disabled>সিলেক্ট মৌজা</option>');
                    $.each(res, function (key, value) {
                        $('#tlMouza').append('<option value="' + value
                            .id + '">' + value.mouza + '</option>');
                    });
                }
            });
        });

        // kachari id to kachari number
        // $("#kachariId").on('change', function () {
        //     var kachariId = this.value;
        //     $.ajax({
        //         url: '{{ route('kachari') }}?kachariId='+kachariId,
        //         type: 'get',
        //         success: function (res) {
        //             $("#kachariNo").val(res[0].kachari_serial);
        //             // let one = $("#licence").val(res[0].kachari_serial);
        //             updateConcatenatedValue();
        //         }
        //     });
        // })

        // for kachari info to station info
        $('#kachariId').on('change', function () {
            var kachariId = this.value;
            $('#station').html('');
            $.ajax({
                url: '{{ route('station') }}?kachari_id='+kachariId,
                type: 'get',
                success: function (res) {
                    $('#station').html('<option selected disabled >সিলেক্ট ষ্টেশন</option>');
                    $.each(res, function (key, value) {
                        $('#station').append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });

        // for total land poriman
        $("#height, #width").on("input", function () {
            const height = parseFloat($("#height").val());
            const width = parseFloat($("#width").val());

            if (!isNaN(height) && !isNaN(width)) {
                const totalLand = height * width;
                $("#totalLand").val(totalLand);
            } else {
                $("#totalLand").val("");
            }
        });

        // station to station setal number
        // $("#station").on('change', function () {
        //     var stationId = this.value;
        //     $.ajax({
        //         url: '{{ route('stationnumber') }}?stationId='+stationId,
        //         type: 'get',
        //         success: function (res) {
        //             $("#statioSerial").val(res[0].staion_serial);
        //             //  $("#licence").val(one + res[0].staion_serial);
        //             updateConcatenatedValue();
        //         }
        //     });
        // });

        // licence type to licence number increment
        $("#licencetype").on('change', function () {
            var licencetype = this.value;
            $.ajax({
                url: '{{ route('licencetype') }}?licencetype='+licencetype,
                type: 'get',
                success: function (res) {
                    if (res[0].id == 1) {
                        // $("#licencetypeserial").val(res[0].licence_type_number);#
                        $("#lcserial").val(res[0].licence_type_serial+1);
                        updateConcatenatedValue();
                    } else if (res[0].id == 2) {
                        // $("#licencetypeserial").val(res[0].licence_type_number);
                        $("#lcserial").val(res[0].licence_type_serial+1);
                        updateConcatenatedValue();
                    } else if (res[0].id == 3) {
                        // $("#licencetypeserial").val(res[0].licence_type_number);
                        $("#lcserial").val(res[0].licence_type_serial+1);
                        updateConcatenatedValue();
                    } else if (res[0].id == 4) {
                        // $("#licencetypeserial").val(res[0].licence_type_number);
                        $("#lcserial").val(res[0].licence_type_serial+1);
                        updateConcatenatedValue();
                    }
                }
            });
        });

        // THIS FUNCTION FOR CONCATE & CREATE LICENCE BY kachariNo+statioSerial+licencetypeserial+lcserial
        // $("#kachariNo, #statioSerial, #licencetypeserial, #lcserial").on("input", function(){
        function updateConcatenatedValue() {
            const one = $("#kachariNo").val();
            const two = $("#statioSerial").val();
            const three = $("#licencetypeserial").val();
            const four = $("#lcserial").val();
            const concatenatedValue = (one + two + three + four) ;
            $("#licence").val(concatenatedValue);
        }
        // });

        // to replace licence time english to bangla
        $("#validity").on("input", function () {
            const englishInput = $(this).val();
            const numeralMap = {
                '0': '০',
                '1': '১',
                '2': '২',
                '3': '৩',
                '4': '৪',
                '5': '৫',
                '6': '৬',
                '7': '৭',
                '8': '৮',
                '9': '৯',
            };
            const bengaliNumerals = englishInput.replace(/\d/g, match => numeralMap[match]);
            $(this).val(bengaliNumerals);
        });


    function convertBengaliToEnglishNumerals(input) {
        const numeralMap = {
            '০': '0',
            '১': '1',
            '২': '2',
            '৩': '3',
            '৪': '4',
            '৫': '5',
            '৬': '6',
            '৭': '7',
            '৮': '8',
            '৯': '9',
        };
        return input.replace(/[০-৯]/g, match => numeralMap[match]);
    }

    // this for mobile input bangla to english
    $("#mobile").on("input", function () {
        const banglaInput = $(this).val();
        const englishNumerals = convertBengaliToEnglishNumerals(banglaInput);
        $(this).val(englishNumerals);
    });


    // this for mobile input bangla to english
    $("#nid").on("input", function () {
        const banglaInput = $(this).val();
        const englishNumerals = convertBengaliToEnglishNumerals(banglaInput);
        $(this).val(englishNumerals);
    });

        // add more licence holder form info
         person = '<div class="col-md-12"><div class="row" id="add"><div class="col-md-4 my-2"><label for="" class="inputcss" >লাইসেন্স হোল্ডারের নাম<b style="font-size: 15px; color:red;">*</b></label><textarea name="licence_holder[]" id="" cols="2" rows="2" class="form-control"  placeholder="লাইসেন্স হোল্ডারের নাম"></textarea></div><div class="col-md-3 my-2"><label for="" class="inputcss" > পিতা / স্বামী <b style="font-size: 15px; color:red;">*</b></label><textarea name="father_name[]" id="" cols="2" rows="2" class="form-control" placeholder="পিতা / স্বামী"></textarea></div><div class="col-md-4 my-2"><label for="" class="inputcss" >ঠিকানা<b style="font-size: 15px; color:red;">*</b></label><textarea name="address[]" id="" cols="2" rows="2" class="form-control" placeholder="গ্রাম-ডাকঘর-উপজেলা-জেলা"></textarea></div><div class="col-md-1 my-2"><button type="button" class="btn btn-sm btn-danger mt-5" id="remove">রিমোভ</button></div><div class="col-md-3 my-2"><label for="" class="inputcss" >এনআইডি <b style="font-size: 15px; color:red;">*</b></label><input type="number" name="nid[]" class="form-control" placeholder="10 ডিজিটের এনআইডি দিন"></div><div class="col-md-3 my-2"><label for="" class="inputcss" >জন্ম তারিখ <b style="font-size: 15px; color:red;">*</b></label><input type="date" name="date_of_birth[]" class="form-control" placeholder="জন্ম তারিখ"></div><div class="col-md-3 my-2"><label for="" class="inputcss" >মোবাইল <b style="font-size: 15px; color:red;">*</b></label><input type="number" name="mobile[]" class="form-control" placeholder="মোবাইল"></div><div class="col-md-3 my-2"><label for="" class="inputcss" >ছবি</label><input type="file" name="image[]" class="form-control" placeholder="মোবাইল"></div></div></div>';
        $("#increment").click(function () {
            var x = 1;
            $("#add").append(person);
            x++;

            $("#add").on("click", "#remove", function(){
                  $(this).closest('#add').remove();
                  x--;
            });

        });




    });
</script>
