<style>
    #search_menu{
    font-size:13px;
    }
    #search_box_container{
        background-color:lightblue;
        margin:1px 1px 1px 10px; 
        padding:6px;
        box-shadow: 1px 2px 3px 1px silver;"
    }
    .padding-0{
        padding-left:0;
        padding-right:0;
    }

</style>
<div class="padding-0" id='search_box_container' >
    <form method='get' action='<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>' class='padding-0' style="margin-top:'1%'">
        <div class="row padding-0">
            <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                <div class="input-wrap">
                    <input type="text" name="title" id='search_menu' placeholder="Job Title" class="form-control">
                    <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class="col-sm-2 col-md-2 col-lg-2 col-xl-2">
                <div class="input-wrap">
                    <input type="text" id='search_menu' name="phone" placeholder="Location" class="form-control">
                    <div class="form-icon"><i class="fa fa-location-arrow"></i></div>
                </div>
            </div>
            <div class='col-sm-4 col-md-4 col-lg-4 col-xl-4'>
                <?php $category=new Category();
                $category_details=$category->getAllCategories(); ?>
                <div class="input-wrap">
                    <select class=' form-control' id='search_menu'>
                        <option> --Select One Category--</option>
                        <?php 
                            foreach($category_details as $category_detail){
                        ?>
                        <option value="<?php echo $category_detail->id; ?>"><?php echo $category_detail->title; ?> </option>
                        <?php
                            }
                        ?>
                    </select>
                    <div class='form-icon'><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                </div>
            </div>
            <div class='col-sm-3 col-md-3 col-lg-3 col-xl-3'>
                <div class="input-wrap">
                    <select class='form-control' id='search_menu'>
                        <option> Job Type</option>
                        <option value="Full Time">Full Time</option>
                        <option value="Part Time">Part Time</option>
                        <option value="Contract">Contract</option>
                    </select>
                    <div class='form-icon'><i class="fa fa-list-alt" aria-hidden="true"></i></div>
                </div>
            </div>
        </div>
        <div class="row container-fluid">
            <div class="contact-btn">
                <button class='btn-success' style='padding:12px; margin-top:3px; border-radius:5px; text-transform: uppercase;' type="submit" name="submitted"> <i class="fa fa-search" aria-hidden="true"></i> Search</button>
            </div>
    </form>
</div>