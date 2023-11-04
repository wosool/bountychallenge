<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">

    <title>BeSmart - Startup Landing Page Template</title>

    <!-- Loading Bootstrap -->
    <link href="{{asset('quiz/css/bootstrap.css')}}" rel="stylesheet">

    <!-- Loading Template CSS -->
    <link href="{{asset('quiz/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('quiz/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('quiz/css/style-magnific-popup.css')}}" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="{{asset('quiz/css/fonts.css')}}" rel="stylesheet">

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,500,700,100' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700' rel='stylesheet' type='text/css'>

    <!-- Font Favicon -->
    <link rel="shortcut icon" href="{{asset('quiz/images/favicon.ico')}}">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
    <script src="{{asset('quiz/js/html5shiv.js')}}"></script>
    <script src="{{asset('quiz/js/respond.min.js')}}"></script>
    <![endif]-->

    <!--headerIncludes-->

</head>
<body>

<!--begin loader -->
<div id="loader">
    <div class="sk-three-bounce">
        <div class="sk-child sk-bounce1"></div>
        <div class="sk-child sk-bounce2"></div>
        <div class="sk-child sk-bounce3"></div>
    </div>
</div>
<!--end loader -->

<!--begin header -->
<header class="header">

    <!--begin nav -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="p-4 border border-danger">
            <input class="form-control w-auto bold is-invalid" style="color: black;background-color: gray;" type="text" id="fram-in" value="https://www.first-bank.com"/>
        </div>
        <!--begin container -->
        <div class="container">

            <!--begin navbar -->
            <div class="navbar-header">
                <button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a href="#" class="navbar-brand brand scrool"><span class="blue">E-</span>Banking</a>
            </div>

            <div id="navbar-collapse-02" class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">

                    <li><a data-toggle="modal" data-target="#login-model" href="javascript:void(0)" class="purchase username-test-btn">Login</a></li>
                    <li><a href="javascript:void(0)" class="purchase hidden username-test"></a></li>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Features</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">Services</a></li>



                </ul>
            </div>
            <!--end navbar -->

        </div>
        <!--end container -->

    </nav>
    <!--end nav -->
    <div class="modal fade" id="login-model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Login Form</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="username-input" class="col-form-label">Username:</label>
                        <input id="username-input" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password-input" class="col-form-label">password:</label>
                        <input type="password" class="form-control" id="password-input">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary do-login-4">Login</button>
                </div>
            </div>
        </div>
    </div>


</header>
<!--end header -->

<!--begin services-->
<section id="services">

    <!--begin section-grey-->
    <div class="section-grey small-padding-bottom">

        <!--begin container-->
        <div class="container">

            <!--begin row-->
            <div class="row margin-bottom-30">

                <!--begin col-md-12-->

                <!--end col-md-12-->

            </div>
            <!--end row-->

            <!--begin row-->
            <div class="row">

                <!--begin col-md-12-->
                <div class="col-md-12 text-center margin-top-20 margin-bottom-40">
                    <img src="{{asset('quiz/images/bank.jpg')}}" class="width-100" alt="imac">
                </div>
                <!--end col-md-12-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.15s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-design-pencil-rule-streamline"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>Any where Account</h4>
                        <p>Curabitur quas nets lacus et nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.3s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-settings-streamline-2"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>Bloom Package</h4>
                        <p>Curabitur quas nets lacus et nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.45s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-arrow-streamline-target"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>Money Market Change</h4>
                        <p>Curabitur quas nets lacus ets nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.6s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-streamline-umbrella-weather"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>55 Plus Checking</h4>
                        <p>Curabitur quas nets lacus et nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.75s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-receipt-shopping-streamline"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>Premium Accounts</h4>
                        <p>Curabitur quas nets lacus et nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

                <!--begin col-md-4-->
                <div class="col-sm-6 col-md-4 services-item wow fadeIn" data-wow-delay="0.9s">

                    <!--begin popup image -->
                    <div class="services-icon">
                        <i class="icon icon-speech-streamline-talk-user"></i>
                    </div>
                    <!--end popup image -->

                    <!--begin service-inner-->
                    <div class="services-text">
                        <h4>24/7 Support</h4>
                        <p>Curabitur quas nets lacus ets nulat niste iaculis etimusad nisle varius etim vitae seditum ligulase quiste net sequi.</p>
                    </div>
                    <!--end service-inner-->

                </div>
                <!--end col-md-4-->

            </div>
            <!--end row-->

        </div>
        <!--end container-->

    </div>
    <!--end section-grey-->

</section>
<!--end services-->


<!--begin footer -->
<div class="footer">

    <!--begin container -->
    <div class="container">

        <!--begin row -->
        <div class="row">

            <!--begin col-md-12 -->
            <div class="col-md-12 text-center">

                <!--begin footer_social -->
                <ul class="footer_social">
                    <li>
                        <a href="#">
                            <i class="icon icon-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-pinterest"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-skype"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="icon icon-dribble"></i>
                        </a>
                    </li>
                </ul>
                <!--end footer_social -->

            </div>
            <!--end col-md-6 -->

        </div>
        <!--end row -->

    </div>
    <!--end container -->

</div>
<!--end footer -->

<!-- Load JS here for greater good =============================-->
<script src="{{asset('quiz/js/jquery-1.11.3.min.js')}}"></script>
<script src="{{asset('quiz/js/bootstrap.min.js')}}"></script>
<script src="{{asset('quiz/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('quiz/js/jquery.nav.js')}}"></script>
<script src="{{asset('quiz/js/jquery.scrollTo-min.js')}}"></script>
<script src="{{asset('quiz/js/SmoothScroll.js')}}"></script>
<script src="{{asset('quiz/js/wow.js')}}"></script>
<script src="{{asset('quiz/js/custom.js')}}?=new3"></script>
<script src="{{asset('quiz/js/plugins.js')}}"></script>



</body>

</html>
