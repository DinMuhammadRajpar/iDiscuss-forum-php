<?php
echo '

<!-- Modal -->
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Sign Up</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="partials/_signuphandler.php" method="POST">
            <div class="mb-3">
            <label for="signupemail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="signupemail" name="signupemail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="signuppassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="signuppassword" name="signuppassword">
            </div>
            <div class="mb-3">
                <label for="signupconfirmpassword" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="signupconfirmpassword" name="signupconfirmpassword">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>'
?>