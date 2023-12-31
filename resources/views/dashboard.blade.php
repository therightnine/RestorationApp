
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
   
    <title>Dashboard User - DishDash</title>
    <link rel="apple-touch-icon" href="theme-assets/images/ico/apple-icon-120.png">
    <link rel="shortcut icon" type="image/x-icon" href="theme-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/css/vendors.css">
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/vendors/css/charts/chartist.css">
    <!-- END VENDOR CSS-->
    <!-- BEGIN CHAMELEON  CSS-->
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/css/app-lite.css">
    <!-- END CHAMELEON  CSS-->
    <!-- BEGIN Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/css/core/colors/palette-gradient.css">
    <link rel="stylesheet" type="text/css" href="UserProfile/theme-assets/css/pages/dashboard-ecommerce.css">
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS-->
    <!-- END Custom CSS-->
  </head>


<body class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">


@include('layouts.dashboardNavbar')


<div class="main-menu menu-fixed menu-light menu-accordion    menu-shadow " data-scroll-to-active="true" data-img="UserProfile/theme-assets/images/backgrounds/02.jpg">
  <div class="navbar-header">
    <ul class="nav navbar-nav flex-row">       
      <li class="nav-item mr-auto"><a class="navbar-brand" href="index.html"><img class="brand-logo" alt="DISHDASH logo" src="Assets/logo.png"/>
          <h3 class="brand-text">DISHDASH</h3></a></li>
      <li class="nav-item d-md-none"><a class="nav-link close-navbar"><i class="ft-x"></i></a></li>
    </ul>
  </div>
  <div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
      <li class="active"><a href="index.html"><i class="ft-home"></i><span class="menu-title" data-i18n="">Dashboard</span></a>
      </li>
      <li class=" nav-item"><a href="charts.html"><i class="ft-pie-chart"></i><span class="menu-title" data-i18n="">Charts</span></a>
      </li>
      <li class=" nav-item"><a href="icons.html"><i class="ft-droplet"></i><span class="menu-title" data-i18n="">Orders</span></a>
      </li>
      <li class=" nav-item"><a href="cards.html"><i class="ft-layers"></i><span class="menu-title" data-i18n="">Restaurants</span></a>
      </li>
      
     
    </ul>
  </div><a class="btn btn-danger btn-block btn-glow btn-upgrade-pro mx-1" href="{{route('restaurant.application.create')}}" target="_blank">ADD  RESTAURANT !</a>
  <div class="navigation-background"></div>
</div>

<div class="app-content content">
  <div class="content-wrapper">
    <div class="content-wrapper-before"></div>
    <div class="content-header row">
    </div>
    <div class="content-body"><!-- Chart -->
<div class="row match-height">
<div class="col-12">
    <div class="">
        <div id="gradient-line-chart1" class="height-250 GradientlineShadow1"></div>
    </div>
</div>
</div>
<!-- Chart -->
<!-- eCommerce statistic -->
<div class="row">
<div class="col-xl-4 col-lg-6 col-md-12">
    <div class="card pull-up ecom-card-1 bg-white">
        <div class="card-content ecom-card2 height-180">
            <h5 class="text-muted danger position-absolute p-1">Progress Stats</h5>
            <div>
                <i class="ft-pie-chart danger font-large-1 float-right p-1"></i>
            </div>
            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3  ">
                <div id="progress-stats-bar-chart"></div>
                <div id="progress-stats-line-chart" class="progress-stats-shadow"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-6 col-md-12">
    <div class="card pull-up ecom-card-1 bg-white">
        <div class="card-content ecom-card2 height-180">
            <h5 class="text-muted info position-absolute p-1">Activity Stats</h5>
            <div>
                <i class="ft-activity info font-large-1 float-right p-1"></i>
            </div>
            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                <div id="progress-stats-bar-chart1"></div>
                <div id="progress-stats-line-chart1" class="progress-stats-shadow"></div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-12">
    <div class="card pull-up ecom-card-1 bg-white">
        <div class="card-content ecom-card2 height-180">
            <h5 class="text-muted warning position-absolute p-1">Sales Stats</h5>
            <div>
                <i class="ft-shopping-cart warning font-large-1 float-right p-1"></i>
            </div>
            <div class="progress-stats-container ct-golden-section height-75 position-relative pt-3">
                <div id="progress-stats-bar-chart2"></div>
                <div id="progress-stats-line-chart2" class="progress-stats-shadow"></div>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ eCommerce statistic -->

<!-- Statistics -->
<div class="row match-height">
<div class="col-xl-4 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="heading-multiple-thumbnails">Multiple Thumbnail</h4>
                <a class="heading-elements-toggle">
                    <i class="la la-ellipsis-v font-medium-3"></i>
                </a>
                <div class="heading-elements">
                    <span class="avatar">
                        <img src="UserProfile/theme-assets/images/portrait/small/avatar-s-2.png" alt="avatar">
                    </span>
                    <span class="avatar">
                        <img src="UserProfile/theme-assets/images/portrait/small/avatar-s-3.png" alt="avatar">
                    </span>
                    <span class="avatar">
                        <img src="UserProfile/theme-assets/images/portrait/small/avatar-s-4.png" alt="avatar">
                    </span>
                </div>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <h4 class="card-title">Content title</h4>
                    <p class="card-text">Jelly beans sugar plum cheesecake cookie oat cake soufflé.Tootsie roll bonbon liquorice tiramisu pie powder.Donut sweet
                        roll marzipan pastry cookie cake tootsie roll oat cake cookie.Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot cake sugar plum. </p>
                    <p class="card-text">Sweet roll marzipan pastry halvah. Cake bear claw sweet. Tootsie roll pie marshmallow lollipop chupa chups donut fruitcake
                        cake.Jelly beans sugar plum cheesecake cookie oat cake soufflé. Tart lollipop carrot cake sugar plum. Marshmallow
                        wafer tiramisu jelly beans.</p>
                </div>
            </div>
        </div>
</div>
<div class="col-xl-4 col-lg-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <h4 class="card-title">Recent products</h4>
                <h6 class="card-subtitle text-muted">Carousel Card With Header & Footer</h6>
            </div>
            <div id="carousel-area" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel-area" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel-area" data-slide-to="1"></li>
                    <li data-target="#carousel-area" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                    <div class="carousel-item active">
                        <img src="assets/chicken.jpeg" class="d-block w-100" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/sandwich.jpeg" class="d-block w-100" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/1.jpeg" class="d-block w-100" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel-area" role="button" data-slide="prev">
                        <span class="la la-angle-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                <a class="carousel-control-next" href="#carousel-area" role="button" data-slide="next">
                        <span class="la la-angle-right icon-next" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
            </div>
            <div class="card-body">
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
        <div class="card-footer border-top-blue-grey border-top-lighten-5 text-muted">
            <span class="float-left">2 days ago</span>
            <span class="tags float-right">
                <span class="badge badge-pill badge-primary">Branding</span>
                <span class="badge badge-pill badge-danger">Design</span>
            </span>
        </div>
    </div>
</div>
<div class="col-xl-4 col-lg-12">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Recent Buyers</h4>
            <a class="heading-elements-toggle">
                <i class="fa fa-ellipsis-v font-medium-3"></i>
            </a>
            <div class="heading-elements">
                <ul class="list-inline mb-0">
                    <li>
                        <a data-action="reload">
                            <i class="ft-rotate-cw"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="card-content">
            <div id="recent-buyers" class="media-list">
                <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md avatar-online">
                            <img class="media-object rounded-circle" src="UserProfile/theme-assets/images/portrait/small/avatar-s-7.png" alt="Generic placeholder image">
                            <i></i>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <span class="list-group-item-heading">Kristopher Candy

                        </span>
                        <ul class="list-unstyled users-list m-0 float-right">
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 1" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-1.jpg"
                                    alt="Avatar">
                            </li>
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 2" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-2.jpg"
                                    alt="Avatar">
                            </li>
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 3" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-4.jpg"
                                    alt="Avatar">
                            </li>
                        </ul>
                        <p class="list-group-item-text mb-0">
                            <span class="blue-grey lighten-2 font-small-3"> #INV-12332 </span>
                        </p>
                    </div>
                </a>
                <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md avatar-away">
                            <img class="media-object rounded-circle" src="UserProfile/theme-assets/images/portrait/small/avatar-s-8.png" alt="Generic placeholder image">
                            <i></i>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <span class="list-group-item-heading">Lawrence Fowler

                        </span>
                        <ul class="list-unstyled users-list m-0 float-right">
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 1" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-5.jpg"
                                    alt="Avatar">
                            </li>
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 2" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-6.jpg"
                                    alt="Avatar">
                            </li>
                        </ul>
                        <p class="list-group-item-text mb-0">
                            <span class="blue-grey lighten-2 font-small-3"> #INV-12333 </span>
                        </p>
                    </div>
                </a>
                <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md avatar-busy">
                            <img class="media-object rounded-circle" src="UserProfile/theme-assets/images/portrait/small/avatar-s-9.png" alt="Generic placeholder image">
                            <i></i>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <span class="list-group-item-heading">Linda Olson

                        </span>
                        <ul class="list-unstyled users-list m-0 float-right">
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 1" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-2.jpg"
                                    alt="Avatar">
                            </li>
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 2" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-5.jpg"
                                    alt="Avatar">
                            </li>
                        </ul>
                        <p class="list-group-item-text mb-0">
                            <span class="blue-grey lighten-2 font-small-3"> #INV-12334 </span>
                        </p>
                    </div>
                </a>
                <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md avatar-online">
                            <img class="media-object rounded-circle" src="UserProfile/theme-assets/images/portrait/small/avatar-s-10.png" alt="Generic placeholder image">
                            <i></i>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <span class="list-group-item-heading">Roy Clark

                        </span>
                        <ul class="list-unstyled users-list m-0 float-right">
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 1" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-6.jpg"
                                    alt="Avatar">
                            </li>
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 2" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-1.jpg"
                                    alt="Avatar">
                            </li>
                        </ul>
                        <p class="list-group-item-text mb-0">
                            <span class="blue-grey lighten-2 font-small-3"> #INV-12335 </span>
                        </p>
                    </div>
                </a>
                <a href="#" class="media border-0">
                    <div class="media-left pr-1">
                        <span class="avatar avatar-md avatar-online">
                            <img class="media-object rounded-circle" src="UserProfile/theme-assets/images/portrait/small/avatar-s-11.png" alt="Generic placeholder image">
                            <i></i>
                        </span>
                    </div>
                    <div class="media-body w-100">
                        <span class="list-group-item-heading">Kristopher Candy

                        </span>
                        <ul class="list-unstyled users-list m-0 float-right">
                            <li data-toggle="tooltip" data-popup="tooltip-custom" data-original-title="Product 1" class="avatar avatar-sm pull-up">
                                <img class="media-object rounded-circle no-border-top-radius no-border-bottom-radius" src="UserProfile/theme-assets/images/portfolio/portfolio-5.jpg"
                                    alt="Avatar">
                            </li>
                        </ul>
                        <p class="list-group-item-text mb-0">
                            <span class="blue-grey lighten-2 font-small-3"> #INV-12336 </span>
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<!--/ Statistics -->
    </div>
  </div>
</div>
    <!-- BEGIN VENDOR JS-->
    <script src="UserProfile/theme-assets/vendors/js/vendors.min.js" type="text/javascript"></script>
    <!-- BEGIN VENDOR JS-->
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="UserProfile/theme-assets/vendors/js/charts/chartist.min.js" type="text/javascript"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN CHAMELEON  JS-->
    <script src="UserProfile/theme-assets/js/core/app-menu-lite.js" type="text/javascript"></script>
    <script src="UserProfile/theme-assets/js/core/app-lite.js" type="text/javascript"></script>
    <!-- END CHAMELEON  JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="UserProfile/theme-assets/js/scripts/pages/dashboard-lite.js" type="text/javascript"></script>
    <!-- END PAGE LEVEL JS-->
</body>
</html>