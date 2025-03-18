<?php
echo '

<!-- Modal -->
<div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="partials/_loginhandler.php" method="post">
            <div class="mb-3">
            <label for="loginemail" class="form-label">Email address</label>
            <input type="email" class="form-control" id="loginemail" name="loginemail" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We\'ll never share your email with anyone else.</div>
            </div>
            <div class="mb-3">
                <label for="loginpassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginpassword" name="loginpassword">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
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