@extends('layouts.admin_app');

@section('content');

@extends('layouts.hori_sidebar');

<script src ="js/canvasjs.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
<script type="text/javascript">

    window.onload =function(){
        var chart = new CanvasJS.Chart("chartContainer",{
            title:{
                text: "Graph of Weight for Customers"
            },
            /*data:[
                {
                    type: "column",
                    dataPoints:[
                        <?php
                        foreach($w as $rows)
                        {
                            echo "{label: '{$rows->month}-y:'{$rows->weight}',\r\n";
                        }
                        ?>
                    ]
                }
            ]*/
        });
        chart.render();
    }

</script>

<div class="container-fluid">
    <div class="row">
        @extends('layouts.vertical_sidebar');

        <div class="col-lg-10 col-md-9 mar30">


            <div class="section-title text-center">
                <div class="title-bar full-width mb20">
                    <br><br><br>
                    <img src="{{ URL::asset('images/logo/ttl-bar.png') }}"  alt="title-img">
                </div>

                <h3>View Weight</h3>
            </div>



            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="contact-form mt20">
                        <div class="appointment-schedule">

                            <div id ="chartContainer" style="height: 270px; width: 40px; "></div>


                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.col -->
    </div>
</div>
@endsection
