<noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
            <div>
    <ul class="breadcrumb">
        <li>
            <a href="#">Home</a>
        </li>
        <li>
            <a href="#">Forms</a>
        </li>
    </ul>
</div>

    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Adding new Employee</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content">

                <form method="post" action="<? echo base_url().'main/add_employe' ?>">
                <h5>
                    <?
                    if(sizeof($error)>0)
                    {
                       print_r($error);
                    }
                    ?>
                </h5>
                    <h5><? echo $success; ?></h5>
                <div class="control-group">
                    <label class="control-label">Employee Name</label>

                    <div class="controls">
                        <input type="text" name="e_name" multiple class="form-control"/>
                    </div>
                </div>
				<div class="control-group">
                    <label class="control-label">Employee Type</label>

                    <div class="controls">
                        <select  name="e_type">
                            <option value="0">Admin</option>
							<option value="1">Hr manager</option>
							<option value="2">Accounts manager</option>
							<option value="3">Project manager</option>
							<option value="4">normal employe</option>
						</select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">Employee email</label>

                    <div class="controls">
                        <input type="text" name="e_email" multiple class="form-control"/>
                    </div>
                </div>
				 <div class="control-group">
                    <label class="control-label">Employee Username for automation:</label>

                    <div class="controls">
                        <input type="text" name="e_username" multiple class="form-control"/>
                    </div>
                </div>
				
				 <div class="control-group">
                    <label class="control-label">Employee password</label>

                    <div class="controls">
                        <input type="password" name="e_password" multiple class="form-control"/>
                    </div>
                </div>
				<br>
				
				<button type="submit" class="btn btn-primary">Submit</button>
                </form>
				
                <br>
                <br>
                <br>

            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->
    

</div><!--/.fluid-container-->


