
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
        <?
            if(sizeof($result) > 0)
            {
                ?>
                <table class="table table-striped table-bordered responsive">
                    <thead>
                    <tr>
                        <th>File Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?
                        foreach($result as $r) {
                            ?>
                            <tr>
                                <td><? echo $r['filename'] ?></td>

                                <td class="center">
                                    <a class="btn btn-success" target="_blank"
                                       href="<? echo base_url() . 'uploads/' . $r['filename'] ?>">
                                        <i class="glyphicon glyphicon-trash icon-white"></i>
                                        Download
                                    </a>
                                    <?
                                        if($this->session->userdata("dep_no") == 0 or $this->session->userdata("dep_no") == $r['dep_id']) {
                                            ?>
                                            <a class="btn btn-danger" href="<? echo base_url().'main/delete/'.$r['f_id'].'/'.$r['dep_id'] ?>">
                                                <i class="glyphicon glyphicon-trash icon-white"></i>
                                                Delete
                                            </a>
                                        <?
                                        }
                                    ?>
                                </td>
                            </tr>
                        <?
                        }
                    ?>

                    </tbody>
                </table>
                <?
            }
            else
            {
                echo "<h4>there is no files in this section</h4>";
            }
        ?>

    </div>
    <!--/span-->

</div><!--/row-->

<!-- content ends -->
</div><!--/#content.col-md-0-->
</div><!--/fluid-row-->


</div><!--/.fluid-container-->


