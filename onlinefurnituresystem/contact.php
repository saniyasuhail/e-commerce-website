<?php require_once ("connection.php"); ?>
<?php include 'theme/header.php';
include 'theme/sidebar.php';
?>

<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=arya%20kanya%20school%20faizabad&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://putlocker-is.org"></a></div><style>.mapouter{position:relative;text-align:right;height:500px;width:100%;}.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:100%;}</style></div>
<div class="container paddingContact-container">

  <div class="row">
    <div class="col-md-12">
      <h1 class="white">Tell Us Your Suggestions Or Feedback!</h1>
      <p>Contact us today to discuss any of your issues.</p>
    </div>
  </div>
</div>
<div class="parallax texture" id="parallax-cta" style="background-image:url(https://www.solodev.com/assets/hero-slider/slide1.jpg);"></div>
<!-- contact-form -->
<div class="container form">
  <div class="row">
    <div class="col-md-7">
      <div class="row">
        <div class="form-group col-md-12">
         
          
        </div>
      </div>
    
  <form action="feedback.php" method="post" id="contact-form">
   
 
            <div class="control-group">
               <?php echo((!empty($_GET['errorMessage'])) ?$_GET['errorMessage'] : '') ?>
 		<?php echo((!empty($_GET['successmessage'])) ? $_GET['successmessage'] : '') ?>
            </div>

    
     <div class="row">
          <div class="col-md-12">
            <div class="control-group">
              <label><i class="fa fa-user" aria-hidden="true"></i>Name</label>
              <input type="text" name="name" class="demo-default form-control" placeholder="Your Name">
            </div>
    <div class="control-group">
              <label><i class="fa fa-phone"></i> Phone</label>
              <input type="text" name="phone" class="demo-default form-control" placeholder="Phone #">
            </div>
            <div class="control-group">
              <label><i class="fa fa-envelope" aria-hidden="true"></i> Email</label>
              <input type="text" name="email" class="demo-default form-control" placeholder="yourname@domain.com">
            </div>
            <div class="control-group">
              <label><i class="fa fa-comment" aria-hidden="true"></i> Message</label>
              <textarea name="feedback" class="demo-default form-control" placeholder="Whatever you like"></textarea>
            </div></div>
        </div>
        <br>
        <div class="row">

          <div class="form-group col-md-12 text-center">
            <button class="btn btn-primary">Submit</button>
          </div>
        </div>
  </form>
  <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>
event.preventDefault();
      const constraints = {
          name: {
              presence: {allowEmpty: false}
          },
          email: {
              presence: {allowEmpty: false},
              email: true
          },
          message: {
              presence: {allowEmpty: false}
          }
      };

      const form = document.getElementById('contact-form');

      form.addEventListener('submit', function (event) {
          const formValues = {
              name: form.elements.name.value,
              email: form.elements.email.value,
              message: form.elements.message.value
          };

          const errors = validate(formValues, constraints);

          if (errors) {
              event.preventDefault();
              const errorMessage = Object
                  .values(errors)
                  .map(function (fieldValues) {
                      return fieldValues.join(', ')
                  })
                  .join("\n");

              alert(errorMessage);
          }
      }, false);
  </script>

<div id="error_message" style="width:100%; height:100%; display:none; ">
						<h4>Error</h4>
						Sorry there was an error sending your form.
						</div>
						<div id="success_message" style="width:100%; height:100%; display:none; ">
						<h2>Success! Your Message was Sent Successfully.</h2>
						</div>
    </div>
    <div class="col-md-5 contact-right-info">
      <h2>Avon PlyHouse</h2>
      <p style="color: #000000"><a href="tel:4078981961">987654321</a><br />
        <br />
        <a href="tel:4078981961"></a>
      </p>
      <h2>EMAIL ADDRESS</h2>
      <a href="mailto:info@webcorpco.com">info@avonplyhouse.com</a>
      <h2>SUPPORT</h2>
     
      <a href="mailto:support@webcorpco.com">avonplyhouse.com</a>
    </div>
  </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.13.1/validate.min.js"></script>
  <script>

<?php include 'theme/stickyfooter.php'; ?>

