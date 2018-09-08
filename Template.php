<?php
header("access-control-allow-origin: *");
session_start();
function templateAboveMin($title) {


    // check if user is logged out or on login page
    $user = GetCurrentUser();


    if (!isset($user) and basename($_SERVER['PHP_SELF']) != "login.php") {
        header("Location: /login");
    }

    // change some visuals if we're on the regular or dev site
    $getTitle = 'Control';
    $mainColor = 'purple';

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="/plugins/images/favicon.png">
        <title><? echo $getTitle; ?> - <? echo $title; ?></title>
        <!-- Bootstrap Core CSS -->
        <link href="/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Menu CSS -->
        <link href="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css" rel="stylesheet">
        <!-- toast CSS -->
        <link href="/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">
        <!-- morris CSS -->
        <link href="/plugins/bower_components/morrisjs/morris.css" rel="stylesheet">
        <!-- Popup CSS -->
        <link href="/plugins/bower_components/Magnific-Popup-master/dist/magnific-popup.css" rel="stylesheet">
        <!-- animation CSS -->
        <link href="/css/animate.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="/css/style.css" rel="stylesheet">
        <!-- color CSS -->
        <link href="/css/colors/<? echo $mainColor;?>.css" id="theme"  rel="stylesheet">
        <link href="/css/custom.css"  rel="stylesheet">
        <link href="/plugins/bower_components/switchery/dist/switchery.min.css" rel="stylesheet">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!--alerts CSS -->
        <link href="/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">



        <link href="/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">
        <link href="/plugins/bower_components/custom-select/custom-select.css" rel="stylesheet" type="text/css">
        <!-- select -->
        <link href="/plugins/bower_components/bootstrap-select/bootstrap-select.min.css" rel="stylesheet">

    </head>
    <body>

<?
}

function templateAbove($title) {

    $env_style = (is_dev_site() ? 'style="background:#CC7722;"' : '');

    templateAboveMin($title);
    ?>

    <!-- Preloader -->
    <!--<div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>-->
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top m-b-0">
        <div class="navbar-header" <?php echo $env_style; ?> > <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
            <div class="top-left-part">
                <a class="logo" href="/">
                <span class="hidden">
                        <b>
                            <!--This is dark logo icon--><img src="/plugins/images/eliteadmin-logo.png" alt="home" class="dark-logo" />
                            <!--This is light logo icon--><img src="/plugins/images/eliteadmin-logo-dark.png" alt="home" class="light-logo" />
                        </b>
                </span>
                <span class="hidden-xs">

                    <!--This is light logo text--><img src="/images/bllush-small-logo.png" width="175" alt="home" class="light-logo" />
                </span></a>
            </div>
            <ul class="nav navbar-top-links navbar-left hidden-xs">
                <li><a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                <!--<li>
                    <form role="search" class="app-search hidden-xs">
                        <input type="text" placeholder="Search..." class="form-control">
                        <a href=""><i class="fa fa-search"></i></a>
                    </form>
                </li>-->
            </ul>
            <ul class="nav navbar-top-links navbar-right pull-right">

                <!-- /.dropdown -->
                <!-- .Megamenu -->


                <li class="dropdown">
                    <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#"><span class="hidden-xs"><? echo DisplayTitle(); ?></span> <i class="icon-options-vertical"></i></a>
                    <ul class="dropdown-menu animated scroll">
                        <!--<li><a href="#"><i class="ti-settings"></i> Account Setting</a></li>
                        <li role="separator" class="divider"></li>-->
                        <li><a href="/logout"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
                <!-- /.Megamenu -->

                <!--<li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-settings"></i></a></li>-->
                <!-- /.dropdown -->
            </ul>
        </div>
        <!-- /.navbar-header -->
        <!-- /.navbar-top-links -->
        <!-- /.navbar-static-side -->
    </nav>
    <!-- Left navbar-header -->
    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse slimscrollsidebar">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                    <!-- input-group -->
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
            <span class="input-group-btn">
            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
            </span> </div>
                    <!-- /input-group -->
                </li>
                <li class="nav-small-cap m-t-10">--- BLOGGERS MANAGEMENT</li>
                <li> <a href="/generate-rubistock-authorization-links" class="waves-effectbrands"><i class="linea-icon ti-instagram fa-fw" data-icon="v"></i> <span class="hide-menu">Authorization Request</span></a></li>
                <li> <a href="/manage-bloggers" class="waves-effectbrands"><i class="linea-icon ti-user fa-fw" data-icon="v"></i> <span class="hide-menu">Bloggers Images</span></a></li>

                <li class="nav-small-cap m-t-10">--- CREATE CONTENT</li>

                <li> <a href="/tag-images2" class="waves-effectbrands"><i class="linea-icon ti-pencil-alt2 fa-fw" data-icon="v"></i> <span class="hide-menu"> Tag Images</span></a></li>

                <!-- <li> <a href="/all-stories" class="waves-effectbrands"><i class="linea-icon ti-image fa-fw" data-icon="v"></i> <span class="hide-menu"> Stories & Trends </span></a></li> -->

                <li>
                    <a href="#" class="waves-effectbrands">
                        <i class="linea-icon ti-image fa-fw" data-icon="v"></i>
                        <span class="hide-menu"> Stories & Trends
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li><a href="/all-stories">All Stories</a></li>
                        <li><a href="/report-active-stories">Stories Stats</a></li>
                    </ul>
                </li>


                <li> <a href="/products" class="waves-effectbrands"><i class="linea-icon ti-truck fa-fw" data-icon="v"></i> <span class="hide-menu"> Tag Products</span></a></li>

                <li class="nav-small-cap m-t-10">--- ORGANIZE CONTENT</li>

                <li> <a href="/manage-images" class="waves-effectbrands"><i class="linea-icon ti-pencil-alt2 fa-fw" data-icon="v"></i> <span class="hide-menu"> Tagged Content </span></a></li>


                <li> <a href="/batches" class="waves-effectbrands"><i class="linea-icon ti-view-grid fa-fw" data-icon="v"></i> <span class="hide-menu"> Batch Allocation</span></a></li>

                <li> <a href="/autotagger" class="waves-effectbrands"><i class="linea-icon ti-ticket fa-fw" data-icon="v"></i> <span class="hide-menu"> Auto-Tagger</span></a></li>

                <!--<li>
                    <a href="/auto-tagger" class="waves-effectbrands">
                        <i class="linea-icon ti-ticket fa-fw" data-icon="v"></i>
                        <span class="hide-menu"> Auto-Tagger
                            <span class="fa arrow"></span>
                        </span>
                    </a>
                    <ul class="nav nav-second-level collapse" aria-expanded="false">
                        <li><a href="/autotagger">All Jobs</a></li>
                        <li><a href="/report-active-stories">Conversion Rules</a></li>
                    </ul>
                </li>-->

                <li class="nav-small-cap m-t-10">--- TOOLS</li>

                <li> <a size="large" href="#" url="/quickview" class="open-lighbox-window waves-effectbrands"><i class="linea-icon ti-heart fa-fw" data-icon="v"></i> <span class="hide-menu"> Quick-View</span></a></li>
                <li> <a size="large" href="#" url="/visual-search" class="open-lighbox-window waves-effectbrands"><i class="linea-icon ti-heart fa-fw" data-icon="v"></i> <span class="hide-menu"> Visual-Search</span></a></li>



                <li class="nav-small-cap m-t-10">--- Management</li>

                <li> <a href="/all-brands"  class="waves-effectbrands"><i class="linea-icon ti-plus fa-fw" data-icon="v"></i> <span class="hide-menu"> Brands</span></a></li>

                <li> <a href="/demos/all-demos" class="waves-effectbrands"><i class="linea-icon ti-wand fa-fw" data-icon="v"></i> <span class="hide-menu"> Demos</span></a></li>

                <li> <a href="/all-styles" class="waves-effectbrands"><i class="linea-icon ti-view-list fa-fw" data-icon="v"></i> <span class="hide-menu"> Styles</span></a></li>


                <li> <a href="/all-feeds" class="waves-effectbrands"><i class="linea-icon ti-package fa-fw" data-icon="v"></i> <span class="hide-menu"> Product Feeds</span></a></li>

                <!-- <li> <a href="/onboarding-customer" class="waves-effectbrands"><i class="linea-icon ti-plus fa-fw" data-icon="v"></i> <span class="hide-menu">Onboarding</span></a></li> -->
                <?
                    $user = GetCurrentUser();
                    if (is_admin_allowed_to_see_status($user[id]) AND !is_dev_site()) {
                        echo '<li> <a href="/tagging-stats" class="waves-effectbrands"><i class="linea-icon ti-view-grid fa-fw" data-icon="v"></i> <span class="hide-menu"> Tagging Stats</span></a></li>';
                    }

                ?>
                <li> <a href="/uptime-status" class="waves-effectbrands"><i class="linea-icon ti-stats-up fa-fw" data-icon="v"></i> <span class="hide-menu"> Server Status</span></a></li>






            </ul>
        </div>
    </div>
    <!-- Left navbar-header end -->



<?
}

function templateBelow() {
    ?>

    <div class="bllushModal modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div><!-- /.modal-content -->

        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


</div>
    <!-- /.container-fluid -->
    <footer class="footer text-center"> 2017 &copy; Copyright Bllush Inc. </footer>
    </div>
    <!-- /#page-wrapper -->

</div>
    <!-- /#wrapper -->



    <?
    templateBelowMin();
}

function templateBelowMin()
{
    ?>
    <!-- jQuery -->
    <script src="/plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <!--slimscroll JavaScript -->
    <script src="/js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="/js/waves.js"></script>
    <!-- Magnific popup JavaScript -->
    <script src="/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js"></script>
    <script src="/plugins/bower_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js"></script>
    <!--Counter js -->
    <script src="/plugins/bower_components/waypoints/lib/jquery.waypoints.js"></script>
    <script src="/plugins/bower_components/counterup/jquery.counterup.min.js"></script>
    <!--Morris JavaScript -->
    <script src="/plugins/bower_components/raphael/raphael-min.js"></script>
    <script src="/plugins/bower_components/morrisjs/morris.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/js/custom.js"></script>
    <script src="/js/bllush.js"></script>
    <script src="/js/lazyload.js"></script>

    <!-- Sparkline chart JavaScript -->
    <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="/js/jasny-bootstrap.js"></script>
    <!-- Sparkline chart JavaScript -->
    <script src="/plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>
    <script src="/plugins/bower_components/switchery/dist/switchery.min.js"></script>
    <script src="/plugins/bower_components/custom-select/custom-select.min.js" type="text/javascript"></script>
    <script src="/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>
    <!--Style Switcher -->
    <script src="/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
    <!-- Sweet-Alert  -->
    <script src="/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    <script src="/js/validator.js"></script>
    <!-- select -->
    <script src="/plugins/bower_components/bootstrap-select/bootstrap-select.min.js"></script>

    <script src="/plugins/bower_components/cropper/v3/cropper.js"></script>
    <script src="/plugins/bower_components/cropper/v3/canvas-to-blob.min.js"></script>
    <link href="/plugins/bower_components/cropper/v3/cropper.css" rel="stylesheet">
    <script src="/js/bllush-cropper.js"></script>


    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-73954150-1', 'auto');
        ga('send', 'pageview');

    </script>


<?

// add mouseflow tracking if not admin

    echo '<script type="text/javascript">
var _mfq = _mfq || [];
  (function() {
    var mf = document.createElement("script");
    mf.type = "text/javascript"; mf.async = true;
    mf.src = "//cdn.mouseflow.com/projects/e21dc6ee-5169-4bf3-b55c-d5388632fb97.js";
    document.getElementsByTagName("head")[0].appendChild(mf);
  })();
</script>';


?>

    </body>
    </html>
<?
}
?>