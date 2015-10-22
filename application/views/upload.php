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
                <h2><i class="glyphicon glyphicon-edit"></i>Uploading</h2>

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

                <h5><? echo $error;  ?></h5>
                <h5><? echo $success;  ?></h5>

                <? echo form_open_multipart($destination); ?>
                <div class="control-group">
                    <label class="control-label"><strong>Upload file</strong></label>

                    <div class="controls">
                        <input type="text" style="display: none" name="flag" value="<? echo $flag ?>"/>
                        <input type="file" name="userfile" multiple class="form-control"/>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Upload</button>
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


