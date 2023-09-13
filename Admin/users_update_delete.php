<!-- UPDATE -->
<div class="modal fade" id="update<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-pen"></i> Update System User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        
        <div class="row">
          <form action="process_update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
          <div class="col-lg-6">
            <div class="form-group">
              <label>Usertype</label>
              <select class="custom-select" name="usertype" required>
                  <!-- <option value="Staff" <?php //if($row['user_type'] == 'Staff') { echo 'selected'; } ?> >Staff</option> -->
                  <option value="Admin" <?php if($row['user_type'] == 'Admin') { echo 'selected'; } ?> >Admin</option>
              </select>  
            </div>
          </div>
           <div class="col-lg-6">
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                <label>First name</label>
                <input type="text" class="form-control" name="firstname" required onkeyup="lettersOnly(this)" value="<?php echo $row['firstname']; ?>">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
                <label>Middle name</label>
                <input type="text" class="form-control" name="middlename" required onkeyup="lettersOnly(this)" value="<?php echo $row['middlename']; ?>">
            </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                <label>Last name</label>
                <input type="text" class="form-control" name="lastname" required onkeyup="lettersOnly(this)" value="<?php echo $row['lastname']; ?>">
              </div>
          </div>
          <div class="col-lg-6">
            <div class="form-group">
              <label>Suffix name</label>
              <input type="text" class="form-control" name="suffix" onkeyup="lettersOnly(this)" value="<?php echo $row['suffix']; ?>">
            </div>
          </div>
          <div class="col-auto form-group col-lg-6">
              <label for="contact">Contact number</label>
              <div class="input-group">
                <div class="input-group-text">+63</div>
                <input type="tel" class="form-control" pattern="[7-9]{1}[0-9]{9}" id="contact" name="contact" placeholder = "9123456789" required maxlength="10" value="<?php echo $row['contact']; ?>">
              </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                  <label>Email address</label>
                  <input type="email" class="form-control" id="update_email" name="email" placeholder = "email@gmail.com" required onkeydown="update_validation()" onkeyup="update_validation()" value="<?php echo $row['email']; ?>">
                  <small id="update_text" style="font-style: italic;"></small>
                </div>
            </div>
      </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="update_system_user" id="admin_update"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script>

  function lettersOnly(input) {
      var regex = /[^a-z ]/gi;
      input.value = input.value.replace(regex, "");
    }

  function update_validation() {
    var email = document.getElementById("update_email").value;
    var pattern =/.+@(gmail)\.com$/;
    // var pattern =/.+@(gmail|yahoo)\.com$/;
    // var form = document.getElementById("form");

    if(email.match(pattern)) {
        document.getElementById('update_text').style.color = 'green';
        document.getElementById('update_text').innerHTML = '';
        document.getElementById('admin_update').disabled = false;
        document.getElementById('admin_update').style.opacity = (1);
    } 
    else {
        document.getElementById('update_text').style.color = 'red';
        document.getElementById('update_text').innerHTML = 'Domain must be @gmail.com';
        document.getElementById('admin_update').disabled = true;
        document.getElementById('admin_update').style.opacity = (0.4);
        
    }
  }
</script>


<!-- DELETE -->
<div class="modal fade" id="delete<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-user-large"></i> Delete System User</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_delete.php" method="POST">
          <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
          <h6 class="text-center">Delete System User record?</h6>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="delete_system_user"><i class="fa-solid fa-trash-can"></i> Delete</button>
      </div>
        </form>
    </div>
  </div>
</div>




<!-- CHANGE PASSWORD -->
<div class="modal fade" id="password<?php echo $row['user_Id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
       <div class="modal-header bg-light">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-lock"></i> Change password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true"><i class="fa-solid fa-circle-xmark"></i></span>
        </button>
      </div>
      <div class="modal-body">
        <form action="process_update.php" method="POST">
           <input type="hidden" class="form-control" value="<?php echo $row['user_Id']; ?>" name="user_Id">
            <div class="form-group mb-3">
              <label for=""><b>Old password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Old password" name="OldPassword" required minlength="8">
            </div>
            <div class="form-group mb-3">
              <label for=""><b>New password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Password" name="password" required id="new_password" minlength="8">
            </div>
            <div class="form-group mb-3">
              <label for=""><b>Confirm password</b></label>
              <input type="password" class="form-control form-control-sm" placeholder="Confirm password" name="cpassword" required id="new_cpassword" onkeyup="new_validate_password()" minlength="8">
                <small id="new_wrong_pass_alert" style="font-style: italic;"></small>
            </div>
      </div>
      <div class="modal-footer alert-light">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa-solid fa-ban"></i> Cancel</button>
        <button type="submit" class="btn bg-gradient-primary" name="password_system_user" id="new_create"><i class="fa-solid fa-floppy-disk"></i> Submit</button>
      </div>
        </form>
    </div>
  </div>
</div>


<script>
    function new_validate_password() {

      var pass = document.getElementById('new_password').value;
      var confirm_pass = document.getElementById('new_cpassword').value;
      if (pass != confirm_pass) {
        document.getElementById('new_wrong_pass_alert').style.color = 'red';
        document.getElementById('new_wrong_pass_alert').innerHTML = 'X Password did not matched!';
        document.getElementById('new_create').disabled = true;
        document.getElementById('new_create').style.opacity = (0.4);
      } else {
        document.getElementById('new_wrong_pass_alert').style.color = 'green';
        document.getElementById('new_wrong_pass_alert').innerHTML = '✓ Password matched!';
        document.getElementById('new_create').disabled = false;
        document.getElementById('new_create').style.opacity = (1);
      }
    }

</script>
