<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <title>Gittigidiyor ürünler</title>
    <style>
        #loader {
            transition: all .3s ease-in-out;
            opacity: 1;
            visibility: visible;
            position: fixed;
            height: 100vh;
            width: 100%;
            background: #fff;
            z-index: 90000
        }

        #loader.fadeOut {
            opacity: 0;
            visibility: hidden
        }

        .spinner {
            width: 40px;
            height: 40px;
            position: absolute;
            top: calc(50% - 20px);
            left: calc(50% - 20px);
            background-color: #333;
            border-radius: 100%;
            -webkit-animation: sk-scaleout 1s infinite ease-in-out;
            animation: sk-scaleout 1s infinite ease-in-out
        }

        @-webkit-keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                opacity: 0
            }
        }

        @keyframes sk-scaleout {
            0% {
                -webkit-transform: scale(0);
                transform: scale(0)
            }
            100% {
                -webkit-transform: scale(1);
                transform: scale(1);
                opacity: 0
            }
        }
    </style>
    <link href="style.css" rel="stylesheet">
</head>
<body class="app">
<div>
    <div class="sidebar">
        <div class="sidebar-inner">
            <div class="sidebar-logo">
                <div class="peers ai-c fxw-nw">
                    <div class="peer peer-greed">
                        <a class="sidebar-link td-n" href="/">
                            <div class="peers ai-c fxw-nw">
                                <div class="peer">
                                    <div class="logo">
                                        <img src="assets/static/images/logo.png" alt="">
                                    </div>
                                </div>
                                <div class="peer peer-greed">
                                    <h5 class="lh-1 mB-0 logo-text">Covisart</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="peer">
                        <div class="mobile-toggle sidebar-toggle"><a href="" class="td-n"><i
                                    class="ti-arrow-circle-left"></i></a></div>
                    </div>
                </div>
            </div>
            <ul class="sidebar-menu scrollable pos-r">
                <li class="nav-item mT-30 active"><a class="sidebar-link" href="gittigidiyor.php"><span class="icon-holder"><i
                                class="c-blue-500 ti-home"></i> </span><span class="title">Dashboard</span></a></li>
                <li class="nav-item"><a class="sidebar-link" href=""><span class="icon-holder"><i
                                class="c-brown-500 ti-email"></i> </span><span class="title">Email</span></a></li>
                <li class="nav-item"><a class="sidebar-link" href=""><span class="icon-holder"><i
                                class="c-blue-500 ti-share"></i> </span><span class="title">Compose</span></a></li>
                <li class="nav-item"><a class="sidebar-link" href=""><span class="icon-holder"><i
                                class="c-deep-orange-500 ti-calendar"></i> </span><span class="title">Calendar</span></a></li>
                <li class="nav-item dropdown">
                    <a class="sidebar-link" href="gittigidiyor.php">
                        <span class="icon-holder">
                            <i class="c-orange-500 ti-layout-list-thumb"></i>
                        </span>
                        <span class="title">Sitedeki ürünler</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="sidebar-link" href="data_gittigidiyor.php">
                        <span class="icon-holder">
                            <i class="c-pink-500 ti-layout-list-thumb"></i>
                        </span>
                        <span class="title">Gittigidiyor Ürünler</span>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="sidebar-link" href="data_gittigidiyor.php">
                        <span class="icon-holder">
                            <i class="c-orange-500 ti-layout-list-thumb"></i>
                        </span>
                        <span class="title">N11 Ürünler</span>
                    </a>
                </li>
                <!--<li class="nav-item dropdown"><a class="dropdown-toggle" href="javascript:void(0);">
                    <span class="icon-holder"><i class="c-red-500 ti-files"></i> </span><span class="title">Pages</span>
                    <span class="arrow"><i class="ti-angle-right"></i></span></a>
                    <ul class="dropdown-menu">
                        <li><a class="sidebar-link" href="blank.html">Blank</a></li>
                        <li><a class="sidebar-link" href="404.html">404</a></li>
                        <li><a class="sidebar-link" href="500.html">500</a></li>
                        <li><a class="sidebar-link" href="signin.html">Sign In</a></li>
                        <li><a class="sidebar-link" href="signup.html">Sign Up</a></li>
                    </ul>
                </li>-->
            </ul>
        </div>
    </div>
    <div class="page-container">
        <div class="header navbar">
            <div class="header-container">
                <ul class="nav-left">
                    <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a>
                    </li>
                    <li class="search-box"><a class="search-toggle no-pdd-right" href="javascript:void(0);"><i
                                class="search-icon ti-search pdd-right-10"></i> <i
                                class="search-icon-close ti-close pdd-right-10"></i></a></li>
                    <li class="search-input"><input class="form-control" type="text" placeholder="Search..."></li>
                </ul>
                <ul class="nav-right">
                    <li class="notifications dropdown"><span class="counter bgc-red">3</span> <a href=""
                                                                                                 class="dropdown-toggle no-after"
                                                                                                 data-toggle="dropdown"><i
                                class="ti-bell"></i></a>
                        <ul class="dropdown-menu">
                            <li class="pX-20 pY-15 bdB"><i class="ti-bell pR-10"></i> <span
                                    class="fsz-sm fw-600 c-grey-900">Notifications</span></li>
                            <li>
                                <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/1.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed"><span><span class="fw-500">Aymurat</span> <span
                                                        class="c-grey-600">liked your <span class="text-dark">post</span></span></span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">5 mins ago</small>
                                                </p>
                                            </div>
                                        </a></li>
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/2.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed"><span><span class="fw-500">Moo Doe</span> <span
                                                        class="c-grey-600">liked your <span class="text-dark">cover image</span></span></span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">7 mins ago</small>
                                                </p>
                                            </div>
                                        </a></li>
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed"><span><span class="fw-500">Lee Doe</span> <span
                                                        class="c-grey-600">commented on your <span
                                                            class="text-dark">video</span></span></span>
                                                <p class="m-0">
                                                    <small class="fsz-xs">10 mins ago</small>
                                                </p>
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="pX-20 pY-15 ta-c bdT"><span><a href="" class="c-grey-600 cH-blue fsz-sm td-n">View All Notifications <i
                                            class="ti-angle-right fsz-xs mL-10"></i></a></span></li>
                        </ul>
                    </li>
                    <li class="notifications dropdown"><span class="counter bgc-blue">3</span> <a href=""
                                                                                                  class="dropdown-toggle no-after"
                                                                                                  data-toggle="dropdown"><i
                                class="ti-email"></i></a>
                        <ul class="dropdown-menu">
                            <li class="pX-20 pY-15 bdB"><i class="ti-email pR-10"></i> <span
                                    class="fsz-sm fw-600 c-grey-900">Emails</span></li>
                            <li>
                                <ul class="ovY-a pos-r scrollable lis-n p-0 m-0 fsz-sm">
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/1.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer"><p class="fw-500 mB-0">Aymurat</p></div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">5 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/2.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer"><p class="fw-500 mB-0">Moo Doe</p></div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">15 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a></li>
                                    <li><a href="" class="peers fxw-nw td-n p-20 bdB c-grey-800 cH-blue bgcH-grey-100">
                                            <div class="peer mR-15"><img class="w-3r bdrs-50p"
                                                                         src="https://randomuser.me/api/portraits/men/3.jpg"
                                                                         alt=""></div>
                                            <div class="peer peer-greed">
                                                <div>
                                                    <div class="peers jc-sb fxw-nw mB-5">
                                                        <div class="peer"><p class="fw-500 mB-0">Lee Doe</p></div>
                                                        <div class="peer">
                                                            <small class="fsz-xs">25 mins ago</small>
                                                        </div>
                                                    </div>
                                                    <span class="c-grey-600 fsz-sm">Want to create your own customized data generator for your app...</span>
                                                </div>
                                            </div>
                                        </a></li>
                                </ul>
                            </li>
                            <li class="pX-20 pY-15 ta-c bdT"><span><a href="email.html"
                                                                      class="c-grey-600 cH-blue fsz-sm td-n">View All Email <i
                                            class="fs-xs ti-angle-right mL-10"></i></a></span></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1"
                                            data-toggle="dropdown">
                            <div class="peer mR-10"><img class="w-2r bdrs-50p"
                                                         src="https://randomuser.me/api/portraits/men/10.jpg" alt=""></div>
                            <div class="peer"><span class="fsz-sm c-grey-900">Aymurat</span></div>
                        </a>
                        <ul class="dropdown-menu fsz-sm">
                            <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                        class="ti-settings mR-10"></i> <span>Setting</span></a></li>
                            <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-user mR-10"></i>
                                    <span>Profile</span></a></li>
                            <li><a href="email.html" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                        class="ti-email mR-10"></i> <span>Messages</span></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                        class="ti-power-off mR-10"></i> <span>Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <main class="main-content bgc-grey-100">
            <div id="mainContent">
                <div class="row">
                    <div class="col-md-12">
                        <div class="bgc-white bd bdrs-3 p-20 mB-20"><h4 class="c-grey-900 mB-20">Ürünler</h4>
                            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Category Code</th>
                                    <th>Store Category ID</th>
                                    <th>Title</th>
                                    <th>Page Template</th>
                                    <th>Catalog ID</th>
                                    <th>Catalog Detail</th>
                                    <th>Format</th>
                                    <th>Buy Now Price</th>
                                    <th>Listing Days</th>
                                    <th>Product Count</th>
                                    <th>City</th>
                                    <th>Payment</th>
                                    <th>Where</th>
                                </tr>
                                </thead>
                                <tfoot>
                                <tr>
                                    <th>Product ID</th>
                                    <th>Category Code</th>
                                    <th>Store Category ID</th>
                                    <th>Title</th>
                                    <th>Page Template</th>
                                    <th>Catalog ID</th>
                                    <th>Catalog Detail</th>
                                    <th>Format</th>
                                    <th>Buy Now Price</th>
                                    <th>Listing Days</th>
                                    <th>Product Count</th>
                                    <th>City</th>
                                    <th>Payment</th>
                                    <th>Where</th>
                                </tr>
                                </tfoot>
                                <tbody>
                                <?php
                                include ("urunler.php");
                                ?>
                                </tbody>
                            </table>
                            <form method="post" action="/panel/Entegrasyon/Gitti/index.php">
                                <input type="text"  hidden name="firstname">
                                <button type="submit" class="btn btn-primary" >Ürünleri Listeler</button>
                            </form>

                        </div>

                    </div>
                </div>
            </div>
        </main>
        <footer class="bdT ta-c p-30 lh-0 fsz-sm c-grey-600"><span>Copyright © 2018 Designed by <a
                    href="https://covisart.com" target="_blank" title="Covisar LTD">Covisar LTD</a>. All rights reserved.</span>
        </footer>
    </div>
</div>
<script type="text/javascript" src="vendor.js"></script>
<script type="text/javascript" src="bundle.js"></script>
</body>
</html>
