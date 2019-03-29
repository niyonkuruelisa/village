        <!-- Navigation Bar-->
        <header id="topnav">
            <div class="topbar-main">
                <div class="container">

                    <!-- Logo container-->
                    <div class="logo">
                        <!-- Text Logo -->
                        <!--<a href="index.html" class="logo">-->
                            <!--Zircos-->
                        <!--</a>-->
                        <!-- Image Logo -->
                        <a href="#" class="logo">
                            <img src="<?php echo URLROOT?>front/images/about-logo.png" alt="" height="50" width="50">
                        </a>

                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras">

                        <ul class="nav navbar-nav navbar-right pull-right">
                            
                            <li class="dropdown navbar-c-items">
                                <a href="" class="dropdown-toggle waves-effect waves-light profile" data-toggle="dropdown" aria-expanded="true"><img src="<?php echo URLROOT?>assets/images/users/avatar-1.jpg" alt="user-img" class="img-circle"> </a>
                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li class="text-center">
                                        <h5>Hi, <?php echo NAMES;?> (Admin)</h5>
                                    </li>
                                    <li><a href="#" id="Profile"><i class="ti-user m-r-5"></i> My Profile</a></li>
                                    <li><a href="javascript:void(0)"><i class="ti-lock m-r-5"></i> Lock screen</a></li>
                                    <li><a href="#" id="Logout"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>

                            </li>
                        </ul>
                        <div class="menu-item">
                            <!-- Mobile menu toggle-->
                            <a class="navbar-toggle">
                                <div class="lines">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </div>
                            </a>
                            <!-- End mobile menu toggle-->
                        </div>
                    </div>
                    <!-- end menu-extras -->

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->

            <div class="navbar-custom">
                <div class="container">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <ul class="navigation-menu">
                            <li class="has-submenu">
                                <a href="<?php echo URLROOT?>admin"><i class="mdi mdi-view-dashboard"></i>Home</a>
                            </li>
                            <li class="has-submenu">
                                <a href="addClient.php"><i class="ion-android-social"></i>Add New Client</a>
                            </li>
                            <li class="has-submenu">
                                <a href="addAgent.php"><i class="ion-android-social"></i>Add New Agent</a>
                            </li>
                            <li class="has-submenu">
                                <a href="transactions.php"><i class="ion-android-social"></i>Transactions</a>
                            </li>
                            <li class="has-submenu">
                                <a href="agents.php"><i class="ti-user m-r-5"></i>All Agents</a>
                            </li>
                            <li class="has-submenu">
                                <a href="clients.php"><i class="ti-user m-r-5"></i>All Clients</a>
                            </li>
                        </ul>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->