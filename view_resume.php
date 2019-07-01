<?php 
    include_once 'inc/header.php';
    include_once 'inc/navbar.php';
    include_once 'admin/class/Database.php';
    include_once 'admin/class/JobSeeker.php';
    include_once 'admin/class/User.php';
    if(!isset($_GET['seeker_id']) || empty($_GET['seeker_id'])){
        redirect('./', 'warning', 'User Resume Not Found !!');
    }
    $job_seeker=new JobSeeker();
    $user=new User();
?>
<link type="text/css" rel="stylesheet" href="assets/css/blue.css" />
<link type="text/css" rel="stylesheet" href="assets/css/print.css" media="print"/>
<style>
body {
    position: relative;
    width: 100%;
    background: white;
}
.glass-bg-color {
    overflow: show;
    position: relative;
    display: inline-block;
    /* float: left; */
    margin-left: 20px;
    /* width: 200px;
    height: 200px; */
    border-radius: 4px;
    /* text-align: center; */
    background-color: rgba(110,222,120,.10);
    color: blue;
}
.bottomUl {
    color: white;
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    }
    .padding-0{
        padding-left:0;
        padding-right:0;
    }
</style>


<!--[if IE 7]>
<link href="css/ie7.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<link href="css/ie6.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!-- <script type="text/javascript" src="js/jquery-1.4.2.min.js"></script> -->
<!-- <script type="text/javascript" src="js/jquery.tipsy.js"></script> -->
<!-- <script type="text/javascript" src="js/cufon.yui.js"></script> -->
<!-- <script type="text/javascript" src="js/scrollTo.js"></script> -->
<!-- <script type="text/javascript" src="js/myriad.js"></script> -->
<script type="text/javascript" src="js/jquery.colorbox.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<script type="text/javascript">
		Cufon.replace('h1%2ch2.html');
</script>
<!-- Begin Wrapper -->
<div id="wrapper">
  <div >
    <!-- Begin Paper -->
    <div class='glass-bg-color row padding-0 col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12'>
      <div id="paper-mid">
        <div class="entry padding-0" id='top'>
          <!-- Begin Image -->
          <img class='float-left padding-0 col-xs-3 col-sm-3 col-md-3 col-lg-3 col-xl-3' width='150px' height='150px;' src="<?php echo 'admin/uploaded_files/user_image/pic.jpg'; ?>" alt="John Smith" />
          <!-- End Image -->
          <!-- Begin Personal Information -->
          <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 col-xl-7">
            <h1 class="name"><?php echo $_SESSION['name']; ?></h1> <br />
             <h1> <span>PHP Developer</span></h1>
            <ul>
            <?php  ?>
              <li><i class='fa fa-home'></i>Koteshwor-32, Kathmandu, Nepal</li>
              <li><i class='fa fa-envelope-square'></i><?php echo $_SESSION['email']; ?></li>
              <li><i class='fa fa-phone'></i>+977 9868479999</li>
              <li><a href='http://www.sureshpangeni.com.np'><i class='fa fa-file'></i>www.sureshpangeni.com.np</a></li>
            </ul>
          </div>
          <!-- End Personal Information -->
          <!-- Begin Social -->
          <div class="float-right padding-0 col-xs-2 col-sm-2 col-md-2 col-lg-2">
            <ul class="bottomUl float-right">
              <li><a  href="#" title="Download.pdf"><i class='fa fa-save fa-2x'></i></a></li>
              <!-- <script>
                    var prtContent = document.getElementById("paper");
                    var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                    WinPrint.document.write(prtContent.innerHTML);
                    WinPrint.document.close();
                    WinPrint.focus();
                    WinPrint.print();
                    WinPrint.close();
              </script> -->
              <li><a  href="javascript:window.print()" title="Print"><i class='fa fa-print fa-2x'></i></a></li>
              <li><a  href="#" title="Follow on Twitter"><i class='fa fa-twitter-square fa-2x'></i></a></li>
              <li><a  href="#" title="Facebook Profile"><i class='fa fa-facebook-square fa-2x'></i></a></li>
            </ul>
          </div>
          <!-- End Social -->
        </div>
        <!-- Begin 1st Row -->
        <div class="entry row padding-0">
          <h2 >OBJECTIVE</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin dignissim viverra nibh sed varius. Proin bibendum nunc in sem ultrices posuere. Aliquam ut aliquam lacus.</p>
        </div>
        <!-- End 1st Row -->
        <!-- Begin 2nd Row -->
        <div class="entry">
          <h2>EDUCATION</h2>
          <div class="content">
            <h3>Sep 2005 - Feb 2007</h3>
            <p>Academy of Art University, London <br />
              <em>Master in Communication Design</em></p>
          </div>
          <div class="content">
            <h3>Sep 2001 - Jun 2005</h3>
            <p>University of Art &amp; Design, New York <br />
              <em>Bachelor of Science in Graphic Design</em></p>
          </div>
        </div>
        <!-- End 2nd Row -->
        <!-- Begin 3rd Row -->
        <div class="entry">
          <h2>EXPERIENCE</h2>
          <div class="content">
            <h3>May 2009 - Feb 2010</h3>
            <p>Agency Creative, London <br />
              <em>Senior Web Designer</em></p>
            <ul class="info">
              <li>Vestibulum eu ante massa, sed rhoncus velit.</li>
              <li>Pellentesque at lectus in <a href="#">libero dapibus</a> cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
          <div class="content">
            <h3>Jun 2007 - May 2009</h3>
            <p>Junior Web Designer <br />
              <em>Bachelor of Science in Graphic Design</em></p>
            <ul class="info">
              <li>Sed fermentum sollicitudin interdum. Etiam imperdiet sapien in dolor rhoncus a semper tortor posuere. </li>
              <li>Pellentesque at lectus in libero dapibus cursus. Sed arcu ipsum, varius at ultricies acuro, tincidunt iaculis diam.</li>
            </ul>
          </div>
        </div>
        <!-- End 3rd Row -->
        <!-- Begin 4th Row -->
        <div class="entry">
          <h2>SKILLS</h2>
          <div class="content">
            <h3>Software Knowledge</h3>
            <ul class="skills">
              <li>Photoshop</li>
              <li>Illustrator</li>
              <li>InDesign</li>
              <li>Flash</li>
              <li>Fireworks</li>
              <li>Dreamweaver</li>
              <li>After Effects</li>
              <li>Cinema 4D</li>
              <li>Maya</li>
            </ul>
          </div>
          <div class="content">
            <h3>Languages</h3>
            <ul class="skills">
              <li>CSS/XHTML</li>
              <li>PHP</li>
              <li>JavaScript</li>
              <li>Ruby on Rails</li>
              <li>ActionScript</li>
              <li>C++</li>
            </ul>
          </div>
        </div>
        <!-- End 4th Row -->
         <!-- Begin 5th Row -->
        <div class="entry">
        <h2>WORKS</h2>
        	<!-- <ul class="works">
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/2.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/3.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        		<li><a href="images/1.jpg" rel="gallery" title="Lorem ipsum dolor sit amet."><img src="images/image.jpg" alt="" /></a></li>
        	</ul> -->
        </div>
        <!-- Begin 5th Row -->
      </div>
      <div class="clear"></div>
      
    </div>
    <!-- End Paper -->
  </div>
 
</div>
<div id="message"><a href="#top" id="top-link">Go to Top</a></div>
<!-- End Wrapper -->

<?php include_once 'inc/footer.php'; ?>
</body>
</html>
