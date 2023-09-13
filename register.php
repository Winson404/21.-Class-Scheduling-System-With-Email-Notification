<title>Class Scheduling | Register</title>
<?php include 'navbar.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row d-flex justify-content-center">

          <div class="col-lg-9 mt-5">
            <div class="card card-outline card-primary">
              <div class="card-header text-center">
                <a href="#" class="h1"><b>Registration</b></a>
              </div>
              <div class="card-body">
                  <p class="login-box-msg">Register a new membership</p>
                  <form action="processes.php" method="post" enctype="multipart/form-data">
                  <div class="row">              
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">First name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="firstname" placeholder="First name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Middle name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="middlename" placeholder="Middle name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Last name</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="lastname" placeholder="Last name" required onkeyup="lettersOnly(this)">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Suffix</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="suffix" placeholder="Suffix">
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Gender</label>
                      <div class="input-group mb-3">
                        <select class="custom-select" name="gender" required>
                            <option selected disabled>Select gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                         </select> 
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Date of Birth</label>
                      <div class="input-group mb-3">
                        <input type="date" class="form-control" name="dob" placeholder="Date of birth" required>
                      </div>
                  </div>
                  <div class="col-lg-4">
                      <label style="margin-bottom: 0px;">Age</label>
                      <div class="input-group">
                        <input type="number" class="form-control" id="age" name="age" placeholder = "Age" onkeydown="agevalidation()" onkeyup="agevalidation()" required>
                      </div>
                      <small id="age_text"></small>
                  </div>
                  <div class="col-lg-12">
                      <label style="margin-bottom: 0px;">Address</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control" name="address" placeholder="Address" required>
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Email address</label>
                      <div class="input-group">
                        <input type="email" class="form-control" id="email" name="email" placeholder = "email@gmail.com" required onkeydown="validation()" onkeyup="validation()">
                      </div>
                      <small id="text"></small>
                  </div>
                  <div class="col-auto form-group col-lg-6 mb-3">
                      <label style="margin-bottom: 0px;">Contact number</label>
                      <div class="input-group">
                        <div class="input-group-text">+63</div>
                        <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "Contact Number" required maxlength="10">
                      </div>
                  </div>
                  <div class="col-lg-6">
                      <label style="margin-bottom: 0px;">Password</label>
                      <div class="input-group">
                        <input type="password" class="form-control" name="password" placeholder="Password" id="password" required minlength="8" onkeypress="validate_password()">
                      </div>
                      <small id="length"></small>
                  </div>
                  <div class="col-lg-6 ">
                      <label style="margin-bottom: 0px;">Confirm password</label>
                      <div class="input-group ">
                        <input type="password" class="form-control" name="cpassword" placeholder="Retype password" id="cpassword" onkeyup="validate_password_confirm_password()" required minlength="8">
                      </div>
                      <small id="wrong_pass_alert"></small>
                  </div>
                  <div class="col-lg-6 mt-3">
                      <label style="margin-bottom: 0px;">Upload image</label>
                      <div class="input-group mb-3">
                        <input type="file" class="form-control" name="fileToUpload" onchange="getImagePreview(event)" required >
                      </div>
                  </div>
                  <!-- LOAD IMAGE PREVIEW -->
                  <div class="col-lg-6 mt-3">
                      <div class="form-group" id="preview">
                      </div>
                  </div>
                </div>
                <div class="row d-none">
                  <div class="col-8">
                    <div class="icheck-primary">
                      <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                      <label for="agreeTerms">
                       I agree to the <a href="#">terms</a>
                      </label>
                    </div>
                  </div>
                </div>
                <div class="social-auth-links text-center">
                  <button type="submit" name="create_user" class="btn btn-primary" id="usercreate">Submit</button>
                </div>
                <p>I already have an account? <a href="login.php" class="text-center">Login here!</a></p>
                </form>

            </div>
          </div>

        </div>
      </div>
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php include 'footer.php'; ?>

<script>

   function agevalidation() {
    var age = document.getElementById("age").value;

    if(age < 12) {
        document.getElementById('age_text').style.color = 'red';
        document.getElementById('age_text').innerHTML = 'Must be 12yrs old and above.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
    } else {
        document.getElementById('age_text').style.color = 'green';
        document.getElementById('age_text').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
    }
  } 

  // EMAIL GOOGLE FORMAT
  function validation() {
    var email = document.getElementById("email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('text').style.color = 'green';
        document.getElementById('text').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
    } 
    else {
        document.getElementById('text').style.color = 'red';
        document.getElementById('text').innerHTML = 'Domain must be @gmail.com.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
        
    }
  }


   function getImagePreview(event)
  {
    var image=URL.createObjectURL(event.target.files[0]);
    var imagediv= document.getElementById('preview');
    var newimg=document.createElement('img');
    imagediv.innerHTML='';
    newimg.src=image;
    newimg.width="90";
    newimg.height="90";
    newimg.style['border-radius']="50%";
    newimg.style['display']="block";
    newimg.style['margin-left']="auto";
    newimg.style['margin-right']="auto";
    newimg.style['box-shadow']="rgba(100, 100, 111, 0.2) 0px 7px 29px 0px";
    imagediv.appendChild(newimg);
  }

</script>


<script>
    function validate_password_confirm_password() {
      var pass = document.getElementById('password').value;
      var confirm_pass = document.getElementById('cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('wrong_pass_alert').style.color = 'red';
        document.getElementById('wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);
      } else {
        document.getElementById('wrong_pass_alert').style.color = 'green';
        document.getElementById('wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
      }
    }

    function validate_password() {
       var pass = document.getElementById('password').value;
       var confirm_pass = document.getElementById('cpassword').value;
       var regex = /[a-zA-Z0-9]/g;
       var pass2 = pass.match(regex).length;

      if(pass2 < 8) {
        document.getElementById('length').style.color = 'red';
        document.getElementById('length').innerHTML = 'Password must be at least 8 characters.';
        document.getElementById('usercreate').disabled = true;
        document.getElementById('usercreate').style.opacity = (0.4);

      } else {
        document.getElementById('length').style.color = 'green';
        document.getElementById('length').innerHTML = '';
        document.getElementById('usercreate').disabled = false;
        document.getElementById('usercreate').style.opacity = (1);
      }
    }


    function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }
</script>