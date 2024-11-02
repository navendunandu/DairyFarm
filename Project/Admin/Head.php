<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../Assets/Templates/Admin/images/favicon.png">
    <!-- Pignose Calender -->
    <link href="../Assets/Templates/Admin/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../Assets/Templates/Admin/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../Assets/Templates/Admin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../Assets/Templates/Admin/css/style.css" rel="stylesheet">
    <link href="../Assets/Templates/form.css" rel="stylesheet">

</head>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="../Assets/Templates/Admin/index.html">
                    <b class="logo-abbr"><img src="../Assets/Templates/Admin/images/logo.png" alt=""> </b>
                    <span class="logo-compact"><img src="../Assets/Templates/Admin/images/logo-compact.png" alt=""></span>
                    <span class="brand-title">
                        <img src="../Assets/Templates/Admin/images/logo-text.png" alt="">
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        
                        
                        
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="../Assets/Templates/Admin/images/user/1.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                       
                                        <li><a href="../Assets/Templates/Admin/page-login.html"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>

                    <li>
                        <a href="Homepage.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Homepage</span>
                        </a>
                    </li>

                    <li>
                        <a href="AddProduct.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Products</span>
                        </a>
                    </li>

                    <li>
                        <a href="DeliveryAgent.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Delivery Agent</span>
                        </a>
                    </li>

                    <li>
                        <a href="UserBooking.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Bookings</span>
                        </a>
                    </li>

                    




                    
                    
                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="../Assets/Templates/Admin/javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Basic Datas</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="Category.php">Category</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="Subcategory.php">Sub Category</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="Complaints.php" aria-expanded="false">
                            <i class="icon-badge menu-icon"></i><span class="nav-text">Complaints</span>
                        </a>
                    </li>

                    <li class="mega-menu mega-menu-sm">
                        <a class="has-arrow" href="../Assets/Templates/Admin/javascript:void()" aria-expanded="false">
                            <i class="icon-globe-alt menu-icon"></i><span class="nav-text">Reports</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="SalesReport.php">Sales Report</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="CategorySalesPieChart.php">Category Report</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="CustomerMaxSalesReport.php">Customer max sales Report</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="DeliveryAgentPieChart.php">Delivery AgentPieChart Report</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="BarGraph.php">Bar Graph</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="DeliveryAgentMaxSalesReport.php">DeliveryAgent maxSales Report</a></li>
                        </ul>
                        
                    </li>
                    
                    
                </ul>
            </div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="container-fluid mt-3">
                <div id="tab" align='center'>