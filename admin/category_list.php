<?php
   
    require_once 'inc/header.php';
    require_once 'inc/sidebar_menu.php';
    require_once 'checklogin.php';
    include_once 'class/Database.php';
    include_once 'class/Category.php';
    $category = new Category();
    $act='Add';
    unset($_SESSION['front_end']);
 ?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Job Portal Nepal</h1>
      <p>Job Category</p>
    </div>
  </div>
  <div class="row">
    <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="tile">
          <h3 class="tile-title"> Job Category <?php echo $act; ?></h3>
          <div class="tile-body">
        		<table class="table table-bordered table-hover" id='sampleTable'>
                    <?php flash(); ?>
        			<thead>
        				<th>S.n</th>
        				<th>Title</th>
        				<th>Status</th>
        				<th>Added Date</th>
        				<th>Action</th>
        			</thead>
        			<tbody>
        				<?php 
        					$all_categories = $category->getAllCategories();
        					if($all_categories){
        						foreach($all_categories as $key=>$rows){
        					?>
        						<tr>
        							<td><?php echo ($key+1); ?></td>
        							<td><?php echo $rows->title; ?></td>
        							<td><?php echo $rows->status; ?></td>
        							<td><?php echo date('Y-m-d', strtotime($rows->created_at)); ?></td>
        							 <td>
                  <!-- <a href="customer.php?id=&amp;act=show" class="btn-link">
                  Show
                  </a>
                  | -->
                  <a href="category_add.php?id=<?php echo $rows->id;?>&amp;act=edit" class="btn-link">Edit
                  </a>
                  | 
                  <a href="process/category.php?id=<?php echo $rows->id; ?>&amp;act=del" onclick="return confirm('Are You sure you want to delete this record?');">Delete
                  </a>
                </td>
        	</tr>
			<?php
				}
			}
		?>
	</tbody>
</table>
</div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
</main>
<?php require 'inc/footer.php'; ?>
<!-- <script type="text/javascript" src="<?php echo ADMIN_JS_URL.'jquery.dataTables.min.js';?>"></script>
<script>
    $(document).ready( function () {
        $('table').DataTable();
    } );
</script> -->