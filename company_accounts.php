<?php require_once 'inc/header.php';
      require_once 'inc/navbar.php';
?>
<div class="clear">
</div>
<div class="container-fluid" style="margin-top: 0px;">
	<div id="content-wrapper" style="margin-left: 5px;">
		<div id="content">
            <div class="row">
                <div class="col-2">
    			         <?php require_once 'inc/left_sidebar.php';?>
                </div>
                <div class="col-8" style="padding: 5px;">
                    <div class='well'>
                        <div class="row">
                           <h3 style="margin:200px;" class='text-center'>This is Company Accounts Page</h3>
                        </div>
                        <!-- row ends -->
                    </div>
                    <!-- well ends -->
                </div>
                <!-- class col-8 ends -->
                <div class="col-2">
                    <?php require_once 'inc/right_sidebar.php'; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require 'inc/footer.php'; ?>
