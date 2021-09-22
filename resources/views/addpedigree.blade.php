@extends('include.master')
@section('content')
<section class="headinner" style="background: url({{asset('images_1/80.jpg')}}) 50% 0;">
    <div class="container">
        <h3>Add Pedigree</h3>
        <div class="breadcom">
            <a href="">Home</a>
        </div>
    </div>
</section>
<style>
  li{
      list-style: none;
  }
</style>
<div class="add-img">
    <div class="container">
{{--

        @foreach ($result as $re)
            {{$re->user_id}}
        @endforeach --}}


        <div class="row">
            <div class="col-xl-8 ml-auto mr-auto mt-5 mb-5" style="background-color: #eee">
                <div class="text-danger text-center">
                    {{session('msg')}}
                </div>
            <form action="{{route('create_pedigree')}}"  method="post" enctype="multipart/form-data" class="p-5">
                    @csrf

                    <h3>Basic Information</h3>
                    <hr>

                    <div class="form-row">


                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Category</strong></label>
                            <select id="inputState" class="form-control" name="cat">
                                <option selected></option>
                                @foreach ( $cat  as $c)
                                    <option value=" {{$c->channel_id}}">
                                        {{$c->channel_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Breeder</strong></label>
                            <select id="inputState" class="form-control"  name="breeder">
                                <option selected></option>
                                @foreach ( $breeder  as $breed)
                                    <option value=" {{$breed->breeder}}">
                                        {{$breed->user_name}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Owner</strong></label>
                            <select id="inputState" class="form-control" name="owner">
                                <option selected></option>
                                @foreach ( $owner  as $owner)
                                <option value=" {{$owner->owner}}">
                                    {{$owner->user_name}}
                                </option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Regcode #1:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="redcode1">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState"><strong></strong></label>
                            <select id="inputState" class="form-control" name="reg1value">
                                <option selected></option>
                                @foreach ( $registry  as $reg)
                                    <option value=" {{$reg->title}}">
                                        {{$reg->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Regcode #2:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="regcode2">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState"><strong></strong></label>
                            <select id="inputState" class="form-control" name="reg2vaue">
                                <option selected></option>
                                @foreach ( $registry  as $reg)
                                    <option value=" {{$reg->title}}">
                                        {{$reg->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>



                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Dog Name:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="dog_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Kennel Name:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="kennel_name">
                        </div>



                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Father's Regcode:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="father_name">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Mother's Regcode:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="mother_name">
                        </div>



                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Gender:</strong></label>
                            <select id="inputState" class="form-control" name="gender">
                                <option value="R">Male</option>
                                <option value="H">Female</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Title:</strong></label>
                            <select id="inputState" class="form-control" name="title">
                                <option selected></option>
                                @foreach ( $title  as $kz)
                                <option value=" {{$kz->title}}">
                                    {{$kz->title}}
                                </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Koer:</strong></label>
                            <select id="inputState" class="form-control" name="koer">
                                {{-- <option selected></option> --}}
                                <option selected></option>
                                @foreach ( $koer  as $kr)
                                <option value=" {{$kr->title}}">
                                    {{$kr->title}}
                                </option>
                            @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Tattoo:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="tattoo">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>HDZW:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="hdzw">
                        </div>




                        <div class="form-group col-md-6">
                            <label for="inputState"><strong>Hips:</strong></label>
                            <select id="inputState" class="form-control" name="hips">
                              <option selected></option>
                              @foreach ( $hips  as $hp)
                                <option value=" {{$hp->hdb}}">
                                    {{$hp->hips_desc}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputState"><strong>Elbow:</strong></label>
                            <select id="inputState" class="form-control" name="elbow">
                              <option selected></option>
                              @foreach ( $hi_el  as $hi_el)
                              <option value=" {{$hi_el->hdb}}">
                                  {{$hi_el->hips_desc}}
                              </option>
                              @endforeach
                            </select>
                        </div>




                        <div class="form-group col-md-12">
                            <label for="inputEmail4"><strong>Date of Birth:</strong></label>
                            <input type="date" class="form-control" id="inputEmail4" name="dob">
                        </div>



                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><strong>Micro Chip:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="micro_chip">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><strong>DNA:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="dna">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Degenerative Myelopathy:</strong></label>
                            <select id="inputState" class="form-control" name="degenerative">
                                <option value="">Please Select an Option </option>
                                <option value="1">Clear</option>
                                <option value="2">Normal (N/N)</option>
                                <option value="3">Carrier (A/N)</option>
                                <option value="4">At-Risk (A/A)</option>
                            </select>
                        </div>



                        <div class="form-group col-md-4">
                            <label for="inputEmail4"><strong>Color:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="color">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Class:</strong></label>
                            <select id="inputState" class="form-control" name="class">
                                <option value=""> </option>
                                <option value="VA">VA</option>
                                <option value="V">V</option>
                                <option value="SG">SG</option>
                                <option value="G">G</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState"><strong>Coat Type:</strong></label>
                            <select id="inputState" class="form-control" name="coat-type">
                                <option value="">Please Select an Option </option>
                                <option value="0">Stock Coat (Stockhaar)</option>
                                <option value="1">Long Stock Coat (Langstockhaar)</option>
                                <option value="2">Long Coat (Langhaar)</option>
                            </select>
                        </div>




                        <hr>
                            <h3 class="col-md-12">Koer Information</h3>
                        <hr>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Breast Depth:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="breast_depth">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Breast width:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="breast_width">
                        </div>


                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Height/Withers:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="height-wi">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputEmail4"><strong>Weight:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="weight">
                        </div>

                        <label> <strong> Koer Report (breed certification report in English):</strong></label><br>
                        <textarea name="koer_report" id="" class="col-md-12" name="koer_report"></textarea>


                        <div class="form-group col-md-12">
                            <label for="inputEmail4"><strong>Koer Date:</strong></label>
                            <input type="text" class="form-control" id="inputEmail4" name="koer_date">
                        </div>


                        <li><strong>Pedigree Image:</strong><br>
                            <label for="imageUpload" class="btn btn-primary btn-block btn-outlined">Upload
                                Picture</label>
                            <input type="file" id="imageUpload" accept="image/*" style="display: none" name="image"><br>
                            <img src="" id="profile-img-tag" width="100px">

                            <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>-->
                            <script type="text/javascript">
                              function readURL(input) {
                                if (input.files && input.files[0]) {
                                  var reader = new FileReader();

                                  reader.onload = function (e) {
                                    $('#profile-img-tag').attr('src', e.target.result);
                                  }
                                  reader.readAsDataURL(input.files[0]);
                                }
                              }

                              $("#imageUpload").change(function () {
                                readURL(this);
                              });
                            </script>
                        </li>





                        <hr>
                            <h3 class="col-md-12"> Health Matters </h3>
                        <hr>






                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-lg-3"><span><label><strong>Insert Date:</strong></label></span></div>
                                <div class="col-lg-3"><span><label><strong>Name:</strong></label></span></div>
                                <div class="col-lg-2"><span><label><strong>Dosage:</strong></label></span></div>
                                <div class="col-lg-3"><span><label><strong>Due Date:</strong></label></span></div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input_fields_wrap_hm">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control" name="insert_date_hm[]" id="insert_date_hm" type="date" value=""></span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control" name="name_hm[]" id="name_hm" type="text" value=""></span></div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-group"><span><input class="input form-control" name="dosage_hm[]" id="dosage_hm" type="text" value=""></span></div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group"><span><input class="input form-control" name="due_date_hm[]" id="due_date_hm" type="date" value=""></span></div>
                                    </div>
                                    <button style="background-color:green; height:37px;" class="add_field_button_hm btn btn-info active">+
                                    </button>
                                </div>


                            </div>
                        </div>



                    <hr>
                        <h3 class="col-md-12"> Vaccines </h3>
                    <hr>



                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label><strong>Insert Date:</strong></label></span></div>
                            <div class="col-lg-3"><span><label><strong>Name:</strong></label></span></div>
                            <div class="col-lg-2"><span><label><strong>Dosage:</strong></label></span></div>
                            <div class="col-lg-3"><span><label><strong>Due Date:</strong></label></span></div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="input_fields_wrap_vc">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="insert_date_vaccines[]" id="name_vaccines" type="date" value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="name_vaccines[]" id="name_vaccines" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="dosage_vaccines[]" id="dosage_vaccines" type="text" value=""></span>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="due_date_vaccines[]" id="due_date_vaccines" type="date" value=""></span></div>
                                </div>
                                <button style="background-color:green; height:37px;" class="add_field_button_vc btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>



                    <hr>
                        <h3 class="col-md-12">Rabies</h3>
                    <hr>

                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label><strong>Insert Date:</strong></label></span></div>
                            <div class="col-lg-3"><span><label><strong>Name:</strong></label></span></div>
                            <div class="col-lg-2"><span><label><strong>Dosage:</strong></label></span></div>
                            <div class="col-lg-3"><span><label><strong>Due Date:</strong></label></span></div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="input_fields_wrap_rb">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="insert_date_rabies[]" id="insert_date_rabies" type="date" value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="name_rabies[]" id="name_rabies" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="dosage_rabies[]" id="dosage_rabies" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="due_date_rabies[]" id="due_date_rabies" type="date" value=""></span>
                                    </div>
                                </div>
                                <button style="background-color:green; height:37px;" class="add_field_button_rb btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>


                <hr>
                    <h3 class="col-md-12">Deworming</h3>
                <hr>




                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3"><span><label><strong>Insert Date:</strong></label></span></div>
                        <div class="col-lg-3"><span><label><strong>Name:</strong></label></span></div>
                        <div class="col-lg-1"><span><label><strong>Dosage:</strong></label></span></div>
                        <div class="col-lg-1"><span><label><strong>Weight:</strong></label></span></div>
                        <div class="col-lg-3"><span><label><strong>Due Date:</strong></label></span></div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="input_fields_wrap_de">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group"><span><input class="input form-control" name="insert_date_deworming[]" id="insert_date_deworming" type="date" value=""></span></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><span><input class="input form-control" name="name_deworming[]" id="name_deworming" type="text" value=""></span></div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group"><span><input class="input form-control" name="dosage_deworming[]" id="dosage_deworming" type="text" value=""></span>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group"><span><input class="input form-control" name="weight_deworming[]" id="weight_deworming" type="text" value=""></span>
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><span><input class="input form-control" name="due_date_deworming[]" id="due_date_deworming" type="date" value=""></span></div>
                            </div>

                            <button style="background-color:green; height:37px;" class="add_field_button_de btn btn-info active">+
                            </button>
                        </div>
                    </div>
                </div>





                <hr>
                    <h3 class="col-md-12">Litters Information</h3>
                <hr>


                <div class="col-md-12">
                    <div class="row">
                        <div class="col-lg-3"><span><label><strong>Date of Birth:</strong></label></span></div>
                        <div class="col-lg-3"><span><label><strong>Breeding Partner:</strong></label></span></div>
                        <div class="col-lg-2"><span><label><strong>Breed Book No.:</strong></label></span></div>
                        <div class="col-lg-1"><span><label><strong>Breeder:</strong></label></span></div>
                        <div class="col-lg-1"><span><label><strong>Letter:</strong></label></span></div>
                        <div class="col-lg-1"><span><label><strong>Males Total:</strong></label></span></div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="input_fields_wrap_lt">
                        <div class="row">
                            <div class="col-lg-3">
                                <div class="form-group"><span><input class="input form-control" name="dateofbirth[]" id="dateofbirth" type="date" value=""></span></div>
                            </div>
                            <div class="col-lg-3">
                                <div class="form-group"><span><input class="input form-control" name="breeding_partner[]" id="breeding_partner" type="text" value=""></span>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group"><span><input class="input form-control" name="breed_bookno[]" id="breed_bookno" type="text" value=""></span></div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group"><span> <input class="input form-control" name="breederinfo[]" id="breederinfo" type="text" value=""></span></div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group"><span><input class="input form-control" name="letter[]" id="letter" type="text" value=""></span>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group"><span><input class="input form-control" name="males_total[]" id="males_total" type="text" value=""></span></div>
                            </div>
                            <button style="background-color:green; height:37px;" class="add_field_button_lt btn btn-info active">+
                            </button>
                        </div>
                    </div>
                </div>



<hr>
    <h3>Show Detail</h3>
<hr>



        <div class="col-md-12">
                        <div class="row">
                            <div class="col-lg-3"><span><label><strong>Show:</strong></label></span></div>
                            <div class="col-lg-2"><span><label><strong>Country Code:</strong></label></span></div>
                            <div class="col-lg-2"><span><label><strong>Judge.:</strong></label></span></div>
                            <div class="col-lg-2"><span><label><strong>Place:</strong></label></span></div>
                            <div class="col-lg-1"><span><label><strong>Rank:</strong></label></span></div>
                            <div class="col-lg-1"><span><label><strong>Override:</strong></label></span></div>
                        </div>
        </div>

<div class="col-md-12">
                        <div class="input_fields_wrap_sd">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="form-group"><span><input class="input form-control" name="show[]" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option><option value="ABW">ABW</option><option value="AFG">AFG</option><option value="AGO">AGO</option><option value="AIA">AIA</option><option value="ALA">ALA</option><option value="ALB">ALB</option><option value="AND">AND</option><option value="ARE">ARE</option><option value="ARG">ARG</option><option value="ARM">ARM</option><option value="ASM">ASM</option><option value="ATA">ATA</option><option value="ATF">ATF</option><option value="ATG">ATG</option><option value="AUS">AUS</option><option value="AUT">AUT</option><option value="AZE">AZE</option><option value="BDI">BDI</option><option value="BEL">BEL</option><option value="BEN">BEN</option><option value="BFA">BFA</option><option value="BGD">BGD</option><option value="BGR">BGR</option><option value="BHR">BHR</option><option value="BHS">BHS</option><option value="BIH">BIH</option><option value="BLM">BLM</option><option value="BLR">BLR</option><option value="BLZ">BLZ</option><option value="BMU">BMU</option><option value="BOL">BOL</option><option value="BRA">BRA</option><option value="BRB">BRB</option><option value="BRN">BRN</option><option value="BTN">BTN</option><option value="BVT">BVT</option><option value="BWA">BWA</option><option value="BES">BES</option><option value="CAF">CAF</option><option value="CAN">CAN</option><option value="CCK">CCK</option><option value="CHE">CHE</option><option value="CHL">CHL</option><option value="CHN">CHN</option><option value="CIV">CIV</option><option value="CMR">CMR</option><option value="COD">COD</option><option value="COG">COG</option><option value="COK">COK</option><option value="COL">COL</option><option value="COM">COM</option><option value="CPV">CPV</option><option value="CRI">CRI</option><option value="CUB">CUB</option><option value="CUW">CUW</option><option value="CXR">CXR</option><option value="CYM">CYM</option><option value="CYP">CYP</option><option value="CZE">CZE</option><option value="DEU">DEU</option><option value="DJI">DJI</option><option value="DMA">DMA</option><option value="DNK">DNK</option><option value="DOM">DOM</option><option value="DZA">DZA</option><option value="ECU">ECU</option><option value="EGY">EGY</option><option value="ERI">ERI</option><option value="ESH">ESH</option><option value="ESP">ESP</option><option value="EST">EST</option><option value="ETH">ETH</option><option value="FIN">FIN</option><option value="FJI">FJI</option><option value="FLK">FLK</option><option value="FRA">FRA</option><option value="FRO">FRO</option><option value="FSM">FSM</option><option value="GAB">GAB</option><option value="GBR">GBR</option><option value="GEO">GEO</option><option value="GGY">GGY</option><option value="GHA">GHA</option><option value="GIB">GIB</option><option value="GIN">GIN</option><option value="GLP">GLP</option><option value="GMB">GMB</option><option value="GNB">GNB</option><option value="GNQ">GNQ</option><option value="GRC">GRC</option><option value="GRD">GRD</option><option value="GRL">GRL</option><option value="GTM">GTM</option><option value="GUF">GUF</option><option value="GUM">GUM</option><option value="GUY">GUY</option><option value="HKG">HKG</option><option value="HMD">HMD</option><option value="HND">HND</option><option value="HRV">HRV</option><option value="HTI">HTI</option><option value="HUN">HUN</option><option value="IDN">IDN</option><option value="IMN">IMN</option><option value="IND">IND</option><option value="IOT">IOT</option><option value="IRL">IRL</option><option value="IRN">IRN</option><option value="IRQ">IRQ</option><option value="ISL">ISL</option><option value="ISR">ISR</option><option value="ITA">ITA</option><option value="JAM">JAM</option><option value="JEY">JEY</option><option value="JOR">JOR</option><option value="JPN">JPN</option><option value="KAZ">KAZ</option><option value="KEN">KEN</option><option value="KGZ">KGZ</option><option value="KHM">KHM</option><option value="KIR">KIR</option><option value="KNA">KNA</option><option value="KOR">KOR</option><option value="KWT">KWT</option><option value="LAO">LAO</option><option value="LBN">LBN</option><option value="LBR">LBR</option><option value="LBY">LBY</option><option value="LCA">LCA</option><option value="LIE">LIE</option><option value="LKA">LKA</option><option value="LSO">LSO</option><option value="LTU">LTU</option><option value="LUX">LUX</option><option value="LVA">LVA</option><option value="MAC">MAC</option><option value="MAF">MAF</option><option value="MAR">MAR</option><option value="MCO">MCO</option><option value="MDA">MDA</option><option value="MDG">MDG</option><option value="MDV">MDV</option><option value="MEX">MEX</option><option value="MHL">MHL</option><option value="MKD">MKD</option><option value="MLI">MLI</option><option value="MLT">MLT</option><option value="MMR">MMR</option><option value="MNE">MNE</option><option value="MNG">MNG</option><option value="MNP">MNP</option><option value="MOZ">MOZ</option><option value="MRT">MRT</option><option value="MSR">MSR</option><option value="MTQ">MTQ</option><option value="MUS">MUS</option><option value="MWI">MWI</option><option value="MYS">MYS</option><option value="MYT">MYT</option><option value="NAM">NAM</option><option value="NCL">NCL</option><option value="NER">NER</option><option value="NFK">NFK</option><option value="NGA">NGA</option><option value="NIC">NIC</option><option value="NIU">NIU</option><option value="NLD">NLD</option><option value="NOR">NOR</option><option value="NPL">NPL</option><option value="NRU">NRU</option><option value="NZL">NZL</option><option value="OMN">OMN</option><option value="PAK">PAK</option><option value="PAN">PAN</option><option value="PCN">PCN</option><option value="PER">PER</option><option value="PHL">PHL</option><option value="PLW">PLW</option><option value="PNG">PNG</option><option value="POL">POL</option><option value="PRI">PRI</option><option value="PRK">PRK</option><option value="PRT">PRT</option><option value="PRY">PRY</option><option value="PSE">PSE</option><option value="PYF">PYF</option><option value="QAT">QAT</option><option value="REU">REU</option><option value="ROU">ROU</option><option value="RUS">RUS</option><option value="RWA">RWA</option><option value="SAU">SAU</option><option value="SDN">SDN</option><option value="SEN">SEN</option><option value="SGP">SGP</option><option value="SGS">SGS</option><option value="SSD">SSD</option><option value="SHN">SHN</option><option value="SXM">SXM</option><option value="SJM">SJM</option><option value="SLB">SLB</option><option value="SLE">SLE</option><option value="SLV">SLV</option><option value="SMR">SMR</option><option value="SOM">SOM</option><option value="SPM">SPM</option><option value="SRB">SRB</option><option value="STP">STP</option><option value="SUR">SUR</option><option value="SVK">SVK</option><option value="SVN">SVN</option><option value="SWE">SWE</option><option value="SWZ">SWZ</option><option value="SYC">SYC</option><option value="SYR">SYR</option><option value="TCA">TCA</option><option value="TCD">TCD</option><option value="TGO">TGO</option><option value="THA">THA</option><option value="TJK">TJK</option><option value="TKL">TKL</option><option value="TKM">TKM</option><option value="TLS">TLS</option><option value="TON">TON</option><option value="TTO">TTO</option><option value="TUN">TUN</option><option value="TUR">TUR</option><option value="TUV">TUV</option><option value="TWN">TWN</option><option value="TZA">TZA</option><option value="UGA">UGA</option><option value="UKR">UKR</option><option value="UMI">UMI</option><option value="URY">URY</option><option value="USA">USA</option><option value="UZB">UZB</option><option value="VAT">VAT</option><option value="VCT">VCT</option><option value="VEN">VEN</option><option value="VGB">VGB</option><option value="VIR">VIR</option><option value="VNM">VNM</option><option value="VUT">VUT</option><option value="WLF">WLF</option><option value="WSM">WSM</option><option value="YEM">YEM</option><option value="ZAF">ZAF</option><option value="ZMB">ZMB</option><option value="ZWE">ZWE</option></select></span>
                                    </div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="judge[]" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-2">
                                    <div class="form-group"><span><input class="input form-control" name="rank[]" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control" name="place[]" type="text" value=""></span></div>
                                </div>
                                <div class="col-lg-1">
                                    <div class="form-group"><span><input class="input form-control" name="override" id="override1" type="radio" value="1"></span></div>
                                </div>
                                <button style="background-color:green; height:37px;" class="add_field_button_sd btn btn-info active">+
                                </button>
                            </div>
                        </div>
                    </div>






                <li><input type="submit" value="Add Pedigree" name="pedigree" class="button yelsubmit">
                </li>




                    </div>
            </form>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_hm"); //Fields wrapper
      var add_button = $(".add_field_button_hm"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_hm[]" id="insert_date_hm" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_hm[]" id="name_hm" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_hm[]" id="dosage_hm" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_hm[]" id="due_date_hm" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_hm btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_hm", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>

<script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_vc"); //Fields wrapper
      var add_button = $(".add_field_button_vc"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_vaccines[]" id="insert_date_vaccines" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_vaccines[]" id="name_vaccines" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_vaccines[]" id="dosage_vaccines" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_vaccines[]" id="due_date_vaccines" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_vc btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_vc", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>
  <script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_rb"); //Fields wrapper
      var add_button = $(".add_field_button_rb"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_rabies[]" id="insert_date_rabies" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_rabies[]" id="name_rabies" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="dosage_rabies[]" id="dosage_rabies" type="text" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_rabies[]" id="due_date_rabies" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_rb btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_rb", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>
  <script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_de"); //Fields wrapper
      var add_button = $(".add_field_button_de"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="insert_date_deworming[]" id="insert_date_deworming" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="name_deworming[]" id="name_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="dosage_deworming[]" id="dosage_deworming" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="weight_deworming[]" id="weight_deworming" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="due_date_deworming[]" id="due_date_deworming" type="date" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_de btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_de", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>

<script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_lt"); //Fields wrapper
      var add_button = $(".add_field_button_lt"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="dateofbirth[]" id="dateofbirth" type="date" value=""></span></div></div><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="breeding_partner[]" id="breeding_partner" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="breed_bookno[]" id="breed_bookno" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span> <input class="input form-control" name="breederinfo[]" id="breederinfo" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="letter[]" id="letter" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="males_total[]" id="males_total" type="text" value=""></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_lt btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_lt", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>

<script>
    $(document).ready(function () {
      var max_fields = 15; //maximum input boxes allowed
      var wrapper = $(".input_fields_wrap_sd"); //Fields wrapper
      var add_button = $(".add_field_button_sd"); //Add button ID
      var x = 1; //initlal text box count
      $(add_button).click(function (e) { //on add input button click
        e.preventDefault();
        if (x < max_fields) { //max input box allowed
          x++; //text box increment
          $(wrapper).append('<div class="row"><div class="col-lg-3"><div class="form-group"><span><input class="input form-control" name="show[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><select name="country[]" class="input form-control"><option value="">Select</option><option value="ABW">ABW</option><option value="AFG">AFG</option><option value="AGO">AGO</option><option value="AIA">AIA</option><option value="ALA">ALA</option><option value="ALB">ALB</option><option value="AND">AND</option><option value="ARE">ARE</option><option value="ARG">ARG</option><option value="ARM">ARM</option><option value="ASM">ASM</option><option value="ATA">ATA</option><option value="ATF">ATF</option><option value="ATG">ATG</option><option value="AUS">AUS</option><option value="AUT">AUT</option><option value="AZE">AZE</option><option value="BDI">BDI</option><option value="BEL">BEL</option><option value="BEN">BEN</option><option value="BFA">BFA</option><option value="BGD">BGD</option><option value="BGR">BGR</option><option value="BHR">BHR</option><option value="BHS">BHS</option><option value="BIH">BIH</option><option value="BLM">BLM</option><option value="BLR">BLR</option><option value="BLZ">BLZ</option><option value="BMU">BMU</option><option value="BOL">BOL</option><option value="BRA">BRA</option><option value="BRB">BRB</option><option value="BRN">BRN</option><option value="BTN">BTN</option><option value="BVT">BVT</option><option value="BWA">BWA</option><option value="BES">BES</option><option value="CAF">CAF</option><option value="CAN">CAN</option><option value="CCK">CCK</option><option value="CHE">CHE</option><option value="CHL">CHL</option><option value="CHN">CHN</option><option value="CIV">CIV</option><option value="CMR">CMR</option><option value="COD">COD</option><option value="COG">COG</option><option value="COK">COK</option><option value="COL">COL</option><option value="COM">COM</option><option value="CPV">CPV</option><option value="CRI">CRI</option><option value="CUB">CUB</option><option value="CUW">CUW</option><option value="CXR">CXR</option><option value="CYM">CYM</option><option value="CYP">CYP</option><option value="CZE">CZE</option><option value="DEU">DEU</option><option value="DJI">DJI</option><option value="DMA">DMA</option><option value="DNK">DNK</option><option value="DOM">DOM</option><option value="DZA">DZA</option><option value="ECU">ECU</option><option value="EGY">EGY</option><option value="ERI">ERI</option><option value="ESH">ESH</option><option value="ESP">ESP</option><option value="EST">EST</option><option value="ETH">ETH</option><option value="FIN">FIN</option><option value="FJI">FJI</option><option value="FLK">FLK</option><option value="FRA">FRA</option><option value="FRO">FRO</option><option value="FSM">FSM</option><option value="GAB">GAB</option><option value="GBR">GBR</option><option value="GEO">GEO</option><option value="GGY">GGY</option><option value="GHA">GHA</option><option value="GIB">GIB</option><option value="GIN">GIN</option><option value="GLP">GLP</option><option value="GMB">GMB</option><option value="GNB">GNB</option><option value="GNQ">GNQ</option><option value="GRC">GRC</option><option value="GRD">GRD</option><option value="GRL">GRL</option><option value="GTM">GTM</option><option value="GUF">GUF</option><option value="GUM">GUM</option><option value="GUY">GUY</option><option value="HKG">HKG</option><option value="HMD">HMD</option><option value="HND">HND</option><option value="HRV">HRV</option><option value="HTI">HTI</option><option value="HUN">HUN</option><option value="IDN">IDN</option><option value="IMN">IMN</option><option value="IND">IND</option><option value="IOT">IOT</option><option value="IRL">IRL</option><option value="IRN">IRN</option><option value="IRQ">IRQ</option><option value="ISL">ISL</option><option value="ISR">ISR</option><option value="ITA">ITA</option><option value="JAM">JAM</option><option value="JEY">JEY</option><option value="JOR">JOR</option><option value="JPN">JPN</option><option value="KAZ">KAZ</option><option value="KEN">KEN</option><option value="KGZ">KGZ</option><option value="KHM">KHM</option><option value="KIR">KIR</option><option value="KNA">KNA</option><option value="KOR">KOR</option><option value="KWT">KWT</option><option value="LAO">LAO</option><option value="LBN">LBN</option><option value="LBR">LBR</option><option value="LBY">LBY</option><option value="LCA">LCA</option><option value="LIE">LIE</option><option value="LKA">LKA</option><option value="LSO">LSO</option><option value="LTU">LTU</option><option value="LUX">LUX</option><option value="LVA">LVA</option><option value="MAC">MAC</option><option value="MAF">MAF</option><option value="MAR">MAR</option><option value="MCO">MCO</option><option value="MDA">MDA</option><option value="MDG">MDG</option><option value="MDV">MDV</option><option value="MEX">MEX</option><option value="MHL">MHL</option><option value="MKD">MKD</option><option value="MLI">MLI</option><option value="MLT">MLT</option><option value="MMR">MMR</option><option value="MNE">MNE</option><option value="MNG">MNG</option><option value="MNP">MNP</option><option value="MOZ">MOZ</option><option value="MRT">MRT</option><option value="MSR">MSR</option><option value="MTQ">MTQ</option><option value="MUS">MUS</option><option value="MWI">MWI</option><option value="MYS">MYS</option><option value="MYT">MYT</option><option value="NAM">NAM</option><option value="NCL">NCL</option><option value="NER">NER</option><option value="NFK">NFK</option><option value="NGA">NGA</option><option value="NIC">NIC</option><option value="NIU">NIU</option><option value="NLD">NLD</option><option value="NOR">NOR</option><option value="NPL">NPL</option><option value="NRU">NRU</option><option value="NZL">NZL</option><option value="OMN">OMN</option><option value="PAK">PAK</option><option value="PAN">PAN</option><option value="PCN">PCN</option><option value="PER">PER</option><option value="PHL">PHL</option><option value="PLW">PLW</option><option value="PNG">PNG</option><option value="POL">POL</option><option value="PRI">PRI</option><option value="PRK">PRK</option><option value="PRT">PRT</option><option value="PRY">PRY</option><option value="PSE">PSE</option><option value="PYF">PYF</option><option value="QAT">QAT</option><option value="REU">REU</option><option value="ROU">ROU</option><option value="RUS">RUS</option><option value="RWA">RWA</option><option value="SAU">SAU</option><option value="SDN">SDN</option><option value="SEN">SEN</option><option value="SGP">SGP</option><option value="SGS">SGS</option><option value="SSD">SSD</option><option value="SHN">SHN</option><option value="SXM">SXM</option><option value="SJM">SJM</option><option value="SLB">SLB</option><option value="SLE">SLE</option><option value="SLV">SLV</option><option value="SMR">SMR</option><option value="SOM">SOM</option><option value="SPM">SPM</option><option value="SRB">SRB</option><option value="STP">STP</option><option value="SUR">SUR</option><option value="SVK">SVK</option><option value="SVN">SVN</option><option value="SWE">SWE</option><option value="SWZ">SWZ</option><option value="SYC">SYC</option><option value="SYR">SYR</option><option value="TCA">TCA</option><option value="TCD">TCD</option><option value="TGO">TGO</option><option value="THA">THA</option><option value="TJK">TJK</option><option value="TKL">TKL</option><option value="TKM">TKM</option><option value="TLS">TLS</option><option value="TON">TON</option><option value="TTO">TTO</option><option value="TUN">TUN</option><option value="TUR">TUR</option><option value="TUV">TUV</option><option value="TWN">TWN</option><option value="TZA">TZA</option><option value="UGA">UGA</option><option value="UKR">UKR</option><option value="UMI">UMI</option><option value="URY">URY</option><option value="USA">USA</option><option value="UZB">UZB</option><option value="VAT">VAT</option><option value="VCT">VCT</option><option value="VEN">VEN</option><option value="VGB">VGB</option><option value="VIR">VIR</option><option value="VNM">VNM</option><option value="VUT">VUT</option><option value="WLF">WLF</option><option value="WSM">WSM</option><option value="YEM">YEM</option><option value="ZAF">ZAF</option><option value="ZMB">ZMB</option><option value="ZWE">ZWE</option></select></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="judge[]" type="text" value=""></span></div></div><div class="col-lg-2"><div class="form-group"><span><input class="input form-control" name="rank[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" name="place[]" type="text" value=""></span></div></div><div class="col-lg-1"><div class="form-group"><span><input class="input form-control" id="override' + x + '" name="override" type="radio" value="' + x + '"></span></div></div><div style="cursor:pointer;background-color:red;height:37px;" class="remove_field_sd btn btn-info">-</div></div>'); //add input box
        }
      });
      $(wrapper).on("click", ".remove_field_sd", function (e) { //user click on remove text
        e.preventDefault();
        $(this).parent('div').remove();
        x--;
      })
    });
  </script>
{{-- koer_report --}}
<script src="{{asset('ckeditor/ckeditor.js')}}"></script>
<script>
    CKEDITOR.replace('koer_report');
</script>

@include('include.newsletter-form')
@endsection
