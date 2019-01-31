@extends('layouts.static_app')

@section('content')

    <style>
        @media (max-width: 768px) {
            #feature-area {
                margin-top: -120px;
            }
        }
    </style>


    <style>
        .pagination > li > a,
        .pagination > li > span {
            background: none !important;
            border: none !important;
            color: deeppink !important;
        }
        .pagination > li > a:hover,
        .pagination > li > a:focus,
        .pagination > li > span:hover,
        .pagination > li > span:focus,
        .pagination > li.active > a,
        .pagination > li.active > span {
            color: #000 !important;
            border: solid 1px #707d82!important;
        }
    </style>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script type="text/javascript">

        $(window).on('hashchange', function() {

            if (window.location.hash) {

                var page = window.location.hash.replace('#', '');

                if (page == Number.NaN || page <= 0) {

                    return false;

                }else{

                    getData(page);

                }

            }

        });



        $(document).ready(function()

        {

            $(document).on('click', '.pagination a',function(event)

            {

                event.preventDefault();

                $('li').removeClass('active');

                $(this).parent('li').addClass('active');

                var myurl = $(this).attr('href');

                var page=$(this).attr('href').split('page=')[1];

                getData(page);

            });

        });



        function getData(page){

            $.ajax(

                {

                    url: '?page=' + page,

                    type: "get",

                    datatype: "html"

                })

                .done(function(data)

                {

                    $("#posts").empty().html(data);

                    location.hash = page;

                })

                .fail(function(jqXHR, ajaxOptions, thrownError)

                {

                    alert('No response from server');

                });

        }

    </script>


    <!-- /.header start -->
    @include('static_pages.navbar');
    <!--header end-->

    <br><br><br>

    <!--features-area start-->
    <div class="features-area pb30" id="feature-area">
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
                                <h4 class="mb20">workout sessions</h4>
                                <p class="mb20">A total workout combining cardio, muscle conditioning, boosted energy, balance and flexibility.</p>
                            </div>
                            <div class="features-box-img">
                                <a class="primary-overlay" href="#"><img src="{{ URL::asset('images/feature/2.jpg') }}"  alt="feature img"></a>
                            </div>
                        </div>
                        <div class="features-box text-center">
                            <div class="features-elements" style="margin-bottom: 18px">
                                <h4 class="mb20">cardio fitness</h4>
                                <p class="mb20">Effective cardiovascular program to optimize fat burning, improve mood and reduce stress.<br></p>
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

    {{--JS Files to calculate the BMI start--}}
    <script language="JavaScript">
        <!--
        function calculateBmi() {
            var weight = document.bmiForm.weight.value
            var height = document.bmiForm.height.value
            if(weight > 0 && height > 0){
                var finalBmi = weight/(height/100*height/100)
                document.bmiForm.bmi.value = finalBmi.toFixed(2)
                if(finalBmi < 18.5){
                    document.bmiForm.meaning.value = "Under Weight"
                }
                else if(finalBmi >= 18.5 && finalBmi < 25){
                    document.bmiForm.meaning.value = "Healthy"
                }
                else if(finalBmi >= 25 && finalBmi < 30){
                    document.bmiForm.meaning.value = "Over Weight"
                }
                else{
                    document.bmiForm.meaning.value = "Obese"
                }
            }
            else{
                alert("Please Fill in everything correctly")
            }
        }
        //-->
    </script>
    {{--JS Files to calculate the BMI end--}}

    <!--BMI calculating area start-->
    <div class="portfolio-area title-white bg1 parallax overlay pad90">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Calculate your BMI</h3>
                        <p>Body mass index (BMI) is a measure of body fat based on height and weight.</p>
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-3">
                                </div>
                                <div class="col-sm-6">
                                    <form name="bmiForm">
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Weight</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="weight" class="form-control"  placeholder="50kg" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Height</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="height" class="form-control"  placeholder="160cm" size="10" ><br />
                                            </div>
                                        </div>
                                        <input type="button" class="btn active btn-primary" id="bmi-button" value="Calculate BMI" onClick="calculateBmi()"><br /><br />

                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your BMI</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="bmi" class="form-control" disabled placeholder="BMI Value" size="10" ><br />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 text-left">
                                                <label>Your Status</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input  type="text" name="meaning" class="form-control" disabled placeholder="BMI Status" size="25" ><br />
                                            </div>
                                        </div>
                                        <input type="reset" class="btn active btn-success" id="bmi-button" value="Reset" /><br />

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.port carousel -->
    </div>
    <!--BMI calculating area end-->

    {{--Notifications area start--}}
    <div class="about-area pad90">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-title text-center">
                        <div class="title-bar full-width mb20">
                            <img src="{{ URL::asset('images/logo/ttl-bar.png') }}" alt="title-img">
                        </div>
                        <h3>Notifications</h3>
                        <div id="posts" style="color: gray ;padding: 15px;background-clip: padding-box;font-size: medium">
                            @include('customer_pages.pagination_data')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{--Notifications area end--}}
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



