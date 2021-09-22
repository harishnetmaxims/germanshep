@extends('webpanel.include.master')
@section('content')
    <section id="main-content">
        <section class="wrapper">
            <h3><i class="fa fa-angle-right"></i> Update Social Profiles</h3>
            <div class="row">
                <div class="col-md-12">
                    <div class="content-panel">
                        <form class="form-horizontal style-form" name="form1" method="post" action=""
                              onSubmit="return valid();">
                            <p style="color:#F00"></p>
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"
                                       style="padding-left:40px;">Facebook</label>
                                <div class="col-sm-10">
                                        <textarea name="facebook" id="facebook"
                                                  class="form-control">{{ $resProfile->facebook }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"
                                       style="padding-left:40px;">Twitter</label>
                                <div class="col-sm-10">
                                        <textarea name="twitter" id="twitter"
                                                  class="form-control">{{ $resProfile->twitter }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"
                                       style="padding-left:40px;">Pintrest</label>
                                <div class="col-sm-10">
                                        <textarea name="pintrest" id="pintrest"
                                                  class="form-control">{{ $resProfile->pintrest }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"
                                       style="padding-left:40px;">Google+</label>
                                <div class="col-sm-10">
                                        <textarea name="google" id="google"
                                                  class="form-control">{{ $resProfile->google }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label"
                                       style="padding-left:40px;">Instagram</label>
                                <div class="col-sm-10">
                                        <textarea name="instagram" id="instagram"
                                                  class="form-control">{{ $resProfile->instagram }}</textarea>
                                </div>
                            </div>


                            <div style="margin-left:100px;">
                                <input type="submit" name="Submit" value="Update Social Profiles"
                                       class="btn btn-theme"></div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </section>
</section>
@endsection('content')