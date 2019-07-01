<?php require_once 'inc/header.php';
      require_once 'inc/navbar.php';
 ?>
 <style type="text/css">
   div.information strong{
    font-size: 12px;
    font-family: "Arial";
    font-weight: bold;
   }
 </style>
 <br><br>
  <!--Contact Start-->
  <div class="container">
  <center> <?php flash(); ?> </center>
  <div class="row">
	      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-home"></i></span>
          <div class="information"> <strong>Address:</strong>
            <p> Tripureshwor, Kathmandu, Nepal</p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact" style="font-size: 15px;"> <span><i class="fa fa-phone"></i></span>
          <div class="information"> <strong>Phone No:</strong>
            <p>+977 01-00....</p>
            <!-- <p>(777) 123 4567</p> -->
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="contact"> <span><i class="fa fa-envelope"></i></span>
          <div class="information"> 
            <strong>Email Address:</strong>
            <p>mail@newsportalnepal.com</p>
          </div>
        </div>
      </div>
    </div>  
    <div class="row formCont">
      <div class="col-md-6">
        <form method='post' action='admin/process/contact_us.php'>
          <div class="row">
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="sender_name" placeholder="Full Name" class="form-control">
                <div class="form-icon"><i class="fa fa-user" aria-hidden="true"></i></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="input-wrap">
                <input type="text" name="sender_phone" placeholder="Your Phone" class="form-control">
                <div class="form-icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
              </div>
            </div>
          </div>
          <div class="input-wrap">
            <input type="email" name="sender_email" placeholder="Your Email" class="form-control">
            <div class="form-icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          </div>
          <div class="input-wrap">
            <textarea class="form-control" name='sender_message' placeholder="Type Your Message here.."></textarea>
            <div class="form-icon"><i class="fa fa-comment" aria-hidden="true"></i></div>
          </div>
          <div class="contact-btn">
            <button class='btn btn-warning' type="submit" value="submit" name="submitted"> <i class="fa fa-paper-plane" aria-hidden="true"></i> Send Message</button>
          </div>
        </form>
      </div>
      <div class="col-md-6">
      <div>
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d413.4628193054125!2d85.31527181749516!3d27.69336886404352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19b29c2af457%3A0xbe9518493be9eaf2!2sEastlink+Technology+Pvt.+Ltd.!5e0!3m2!1sen!2snp!4v1547128651770" width="600" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
      </div>
      </div>
    </div>
    
  <!--Contact End--> 
  </div>
</div>
<!--Inner Content End-->
</div>
<?php require 'inc/footer.php' ?>