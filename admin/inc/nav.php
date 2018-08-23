 <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="dashboard">Cardinal School-Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                
               
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['name']; ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                       
                        <li>
                            <a href="logout"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                   


                   <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#banner"><i class="fa fa-fw fa-list"></i> Banner Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="banner" class="collapse">
                            <li>
                                <a href="banner-add">Banner Add</a>
                            </li>
                            <li>
                                <a href="banner-list">Banner List</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#news"><i class="fa fa-fw fa-newspaper-o"></i> News Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="news" class="collapse">
                            <li>
                                <a href="news-add">News Add</a>
                            </li>
                            <li>
                                <a href="news-list">News List</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#notice"> <i class="fa fa-file-text" aria-hidden="true"></i> Notice Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="notice" class="collapse">
                            <li>
                                <a href="notice-add">Notice Add</a>
                            </li>
                            <li>
                                <a href="notice-list">Notice List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#calendar"><i class="fa fa-calendar" aria-hidden="true"></i> Calendar Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="calendar" class="collapse">
                            <li>
                                <a href="calendar-add">Calendar Add</a>
                            </li>
                            <li>
                                <a href="calendar-list">Calendar List</a>
                            </li>
                        </ul>
                    </li>

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#gallery"><i class="fa fa-camera" aria-hidden="true"></i> Gallery Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="gallery" class="collapse">
                            <li>
                                <a href="#">Image Add</a>
                            </li>
                            <li>
                                <a href="#">Image List</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#video"><i class="fa fa-video-camera" aria-hidden="true"></i>  Video Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="video" class="collapse">
                            <li>
                                <a href="video-add">Video Add</a>
                            </li>
                            <li>
                                <a href="video-list">Video List</a>
                            </li>
                        </ul>
                    </li>


                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#comment"><i class="fa fa-comment" aria-hidden="true"></i>  Review Management <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="comment" class="collapse">
                            <li>
                                <a href="review-add">Review Add</a>
                            </li>
                            <li>
                                <a href="review-list">Review List</a>
                            </li>
                        </ul>
                    </li>

                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>