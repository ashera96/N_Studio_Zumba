@extends('layouts.static_app')
<script language="JavaScript">
    <!--
    function calculateBmi() {
        var weight = document.bmiForm.weight.value
        var height = document.bmiForm.height.value
        if(weight > 0 && height > 0){
            var finalBmi = weight/(height/100*height/100)
            document.bmiForm.bmi.value = finalBmi
            if(finalBmi < 18.5){
                document.bmiForm.meaning.value = "Under Weight"
            }
            if(finalBmi > 18.5 && finalBmi < 25){
                document.bmiForm.meaning.value = "Healthy"
            }
            if(finalBmi > 25){
                document.bmiForm.meaning.value = "Over Weight"
            }
        }
        else{
            alert("Please Fill in everything correctly")
        }
    }
    //-->
</script>

@section('content')

    <!-- /.header start -->
    @include('static_pages.navbar');
    <!--header end-->


    <!-- Slider Area Start Here-->
    <div class="slider-area1">
        <div id="rev_slider_1_wrapper" class="rev_slider_wrapper fullscreen-container" data-alias="photography1" style="background-color:transparent;padding:0px;">
            <div id="rev_slider_1" class="rev_slider fullscreenbanner" style="display:none;" data-version="5.0.7">
                <ul>
                    <!-- SLIDE  -->
                    <li data-index="rs-1" data-transition="slideoververtical">
                        <!-- MAIN IMAGE -->
                        <img height="1080px" width="1920px" src="{{ URL::asset('images/slider-show/s-1.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption slide-text-one tp-resizeme" id="slide-1-layer-1" data-x="['left','center','center','center']" data-hoffset="['65','50','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-100','-145','-60','-100']" data-fontsize="['inherit','20','20','17']" data-lineheight="['60','30','30','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-250px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>healthy <span>life</span></h1>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption slide-text-two tp-resizeme" id="slide-1-layer-2" data-x="['left','left','center','center']" data-hoffset="['65','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-0','-80','30','0']" data-fontsize="['60','60','60','30']" data-lineheight="['60','60','60','40']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2300;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-200px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="750" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>fitness is not a destination it is a way of life</h1>
                            <h1>exercise in disguise</h1>
                        </div>
                    </li>

                    <!-- SLIDE  2-->
                    <li data-index="rs-2" data-transition="slideoververtical">
                        <!-- MAIN IMAGE -->
                        <img src="{{ URL::asset('images/slider-show/s-2.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption slide-text-one tp-resizeme" id="slide-1-layer-1" data-x="['left','center','center','center']" data-hoffset="['65','50','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-100','-145','-60','-100']" data-fontsize="['inherit','20','20','17']" data-lineheight="['60','30','30','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-250px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>goal <span>digger</span></h1>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption slide-text-two tp-resizeme" id="slide-1-layer-2" data-x="['left','left','center','center']" data-hoffset="['65','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-0','-80','30','0']" data-fontsize="['60','60','60','30']" data-lineheight="['60','60','60','40']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2300;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-200px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="750" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>fitness is not a destination it is a way of life</h1>
                        </div>
                    </li>

                    <!-- SLIDE  3-->
                    <li data-index="rs-3" data-transition="slideoververtical">
                        <!-- MAIN IMAGE -->
                        <img src="{{ URL::asset('images/slider-show/s-3.jpg') }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" class="rev-slidebg" data-no-retina>

                        <!-- LAYER NR. 1 -->
                        <div class="tp-caption slide-text-one tp-resizeme" id="slide-1-layer-1" data-x="['left','center','center','center']" data-hoffset="['65','50','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-100','-145','-60','-100']" data-fontsize="['inherit','20','20','17']" data-lineheight="['60','30','30','26']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-250px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="500" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 5; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>be <span>strong</span></h1>
                        </div>

                        <!-- LAYER NR. 2 -->
                        <div class="tp-caption slide-text-two tp-resizeme" id="slide-1-layer-2" data-x="['left','left','center','center']" data-hoffset="['65','0','0','0']" data-y="['middle','middle','middle','middle']" data-voffset="['-0','-80','30','0']" data-fontsize="['60','60','60','30']" data-lineheight="['60','60','60','40']" data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;" data-transform_in="x:[-100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2300;e:Power4.easeInOut;" data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;" data-mask_in="x:-200px;y:0;s:inherit;e:inherit;" data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;" data-start="750" data-splitin="none" data-splitout="none" data-responsive_offset="on" style="z-index: 6; white-space: nowrap; font-family: 'Roboto Condensed', sans-serif">
                            <h1>fitness is not a destination it is a way of life</h1>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--#rev_slider_1_wrapper-->
    </div>
    <!-- Slider Area End Here-->


    <!--features-area start-->
    <div class="features-area pb30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="features-body">
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">zumba classes</h4>
                                <p class="mb20">Everybody and every body! Each zumba class is designed to bring people together to sweat it on.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/1.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">workout classes</h4>
                                <p class="mb20">A total workout combining cardio, muscle conditioning,boosted energy, balance and flexibility.</p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/2.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements">
                                <h4 class="mb20">cardio fitness</h4>
                                {{--<p class="mb20">Effective cardiovascular program to optimize fat burning, improve mood and reduce stress.<br></p>--}}
                                <p class="mb20">Everybody and every body! Each zumba class is designed to bring people together to sweat it on.<br></p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/3.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>
    <!--features-area end-->

    <!--BMI calculating area start-->
    <div class="portfolio-area title-white bg1 parallax overlay pad90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Stay Healthy</h3>
                        <p>Calculate Your Body Mass Index </p>
                        <form name="bmiForm">
                            <label  >Weight</label>
                            <input  type="text" name="weight" class="form-control"  aria-describedby="weightHelp" placeholder="Your Weight in kg" size="10" ><br />

                            <label  >Height</label>
                            <input type="text" name="height" class="form-control"  aria-describedby="heightHelp" placeholder="Your Height in cm" size="10"><br />


                            <input type="button" class="btn btn-primary" value="Calculate BMI" onClick="calculateBmi()"><br /><br />

                            <label  >Your BMI : </label>
                            <input type="text" name="bmi" class="form-control"  aria-describedby="weightHelp" placeholder="Your BMI" size="10"><br />

                            <label  >Status : </label>
                            <input type="text" name="meaning" class="form-control"  aria-describedby="weightHelp" placeholder="BMI Status" size="25"><br />


                            <input type="reset" class="btn btn-success" value="Reset" /><br />


                        </form>
                    </div>




                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.port carousel -->
    </div>
    <!--BMI calculating area end-->

    <br>
    <h2 style="color: #e83e8c">Notifications</h2>
    <br>

@endsection


@section('js_styling')
    <script type="text/javascript">
        function setREVStartSize(e) {
            try {
                var i = jQuery(window).width(),
                    t = 9999,
                    r = 0,
                    n = 0,
                    l = 0,
                    f = 0,
                    s = 0,
                    h = 0;
                if (e.responsiveLevels && (jQuery.each(e.responsiveLevels, function(e, f) {
                    f > i && (t = r = f, l = e), i > f && f > r && (r = f, n = e)
                }), t > r && (l = n)), f = e.gridheight[l] || e.gridheight[0] || e.gridheight, s = e.gridwidth[l] || e.gridwidth[0] || e.gridwidth, h = i / s, h = h > 1 ? 1 : h, f = Math.round(h * f), "fullscreen" == e.sliderLayout) {
                    var u = (e.c.width(), jQuery(window).height());
                    if (void 0 != e.fullScreenOffsetContainer) {
                        var c = e.fullScreenOffsetContainer.split(",");
                        if (c) jQuery.each(c, function(e, i) {
                            u = jQuery(i).length > 0 ? u - jQuery(i).outerHeight(!0) : u
                        }), e.fullScreenOffset.split("%").length > 1 && void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 ? u -= jQuery(window).height() * parseInt(e.fullScreenOffset, 0) / 100 : void 0 != e.fullScreenOffset && e.fullScreenOffset.length > 0 && (u -= parseInt(e.fullScreenOffset, 0))
                    }
                    f = u
                } else void 0 != e.minHeight && f < e.minHeight && (f = e.minHeight);
                e.c.closest(".rev_slider_wrapper").css({
                    height: f
                })
            } catch (d) {
                console.log("Failure at Presize of Slider:" + d)
            }
        };

    </script>
@endsection



