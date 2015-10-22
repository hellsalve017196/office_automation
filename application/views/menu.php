<body>
<!-- topbar starts -->
<div class="navbar navbar-default" role="navigation">

    <div class="navbar-inner">
        <button type="button" class="navbar-toggle pull-left animated flip">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.html">
            <span>BASE Office</span></a>

        <!-- user dropdown starts -->
        <!--<div>
            <a class="btn btn-default" href="<? base_url().'main/logout' ?>">logout</a>
        </div>-->
        <!--<div class="btn-group pull-right">
            <a class="btn btn-default" href="<? base_url().'main/logout' ?>">
                logout
            </a>

        </div>-->
        <!-- user dropdown ends -->

        <!-- theme selector starts -->
        <div class="btn-group pull-right theme-container animated tada">

        </div>
        <!-- theme selector ends -->

        <ul class="collapse navbar-collapse nav navbar-nav top-menu">
        </ul>

    </div>
</div>
<!-- topbar ends -->
<div class="ch-container">
    <div class="row">

        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Main</li>

                        <?
                        if($menu[0])
                        {
                            ?>
                                <li><a class="ajax-link" href="<? echo base_url().'main/adding_new' ?>"><span>Adding new Employee</span></a>
                                 </li>
                            <?
                        }
                        ?>
                        <li><a class="ajax-link" href="<? echo base_url().'main/employe_list' ?>"><span>Employee List</span></a></li>

                        <?
                            if($menu[1])
                            {
                            ?>
                                <li><a class="ajax-link" href="<? echo base_url().'main/upload_cv_form' ?>"><span>Upload CV</span></a>
                                </li>
                            <?
                            }
                        ?>
						
						<?
							if($menu[2])
							{
							?>
								<li><a class="ajax-link" href="<? echo base_url().'main/file_list/1' ?>"><span>CV list</span></a></li>
							<?
							}
                        
                        ?>
						
						<?
                        if($menu[3])
                        {
                            ?>
                            <li><a class="ajax-link" href="<? echo base_url().'main/upload_project_form' ?>"><span>Upload Project File</span></a>
                            </li>
                        <?
                        }
                        ?>
                        <li><a class="ajax-link" href="<? echo base_url().'main/file_list/3' ?>"><span>Project File list</span></a></li>
                        <?
                        if($menu[4])
                        {
                            ?>
                            <li><a class="ajax-link" href="<? echo base_url().'main/upload_account_form' ?>"><span>Upload Account File</span></a>
                            </li>
                        <?
                        }
                        ?>
                        <li><a class="ajax-link" href="<? echo base_url().'main/file_list/2' ?>"><span>Account File list</span></a></li>
                        <li><a class="ajax-link" href="<? echo base_url().'main/logout' ?>"><span>Log out</span></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->