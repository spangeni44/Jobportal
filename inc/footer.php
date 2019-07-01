<style> 
.footer_menu_text{
    font-size:15px;
}
#footer {
    clear: both;
    position: relative;
    height: 40px;
    margin-top: -40px;
}
</style>
<div class='col-sm-12 col-md-12 col-lg-12' style='background-color:skyblue;'>
<hr style="border-width: 100%; border-color: blue;">
<div class="footer-info"> Copyright &copy; <?php echo date('Y'); ?> JobPortalNepal.com All rights reserved. </div>
    <ul class="footer-links footer_menu_text">   
        <li><a href="index.php">Home</a> </li>
        <li><a href="about_us.php">About Us</a> </li>
        <li><a href="contact_us.php">Contact Us</a></li>    
        <li><a href="frequently_asked_questions.php">FAQ</a> </li>  
    </ul>
    <div class="social-links">
        <a title="Follow us on Facebook" href="https://www.facebook.com/jobportalnepal" class="facebook-link" target="_blank"></a>
        <a title="Follow us on Twitter" href="https://twitter.com/jobportalnepal" class="twitter-link" target="_blank"></a>
        <a title="Follow us on Google Plus" href="https://plus.google.com/" class="g-plus-link" target="_blank"></a>
        <a title="Follow us on Linked In" href="http://www.linkedin.com/company/jobportalnepalcom" class="linkedin-link" target="_blank"></a>
    </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.3.1.js"
  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  crossorigin="anonymous" type='text/javascript'></script>

<!-- Include all compiled plugins (below), or include individual files as needed --> 
<script type='text/javascript' src="assets/js/bootstrap.min.js"></script>
<script type='text/javascript' src='assets/jquery/jquery.min.js'></script>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
<script type='text/javascript' src="assets/js/jquery-1.2.6.min.js"></script> 
<!-- general script file --> 
<script type='text/javascript' src="assets/js/owl.carousel.js"></script> 
<!-- <script type="text/javascript" src="js/script.js"></script> -->

<script class="jsbin" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
<script class="jsbin" type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>

<script type='text/javascript' src="assets/tinymce/tinymce.min.js"></script>
<script type='text/javascript' src='assets/js/main.js' ></script>

<!-- Data table plugin-->
<!-- <script type="text/javascript" src="admin/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="admin/js/plugins/dataTables.bootstrap.min.js"></script> -->
<!-- <script type="text/javascript">$('#sampleTable').DataTable();</script> -->
<script>
    setTimeout(function(){
	        $('.alert').slideUp();
	    }, 3000);
    </script>
<script>
    tinymce.init({
      selector: '.tiny_mce_field',
      theme: 'modern',
      apply_source_formatting : false,
      plugins: 'print preview searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
      toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
      image_advtab: true,
      templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
      ],
      content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css'
      ]
     });
</script>
<div class='clear'></div>
  </body>
</html>