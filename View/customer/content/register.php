<style>
    /*
*
* ==========================================
* FOR DEMO PURPOSES
* ==========================================
*
*/

body {
  background: #f5f5f5;
}

.rounded-lg {
  border-radius: 1rem;
}

.nav-pills .nav-link {
  color: #555;
}

.nav-pills .nav-link.active {
  color: #fff;
}
</style>
<div class="container py-5">

  <!-- For demo purpose -->
  <div class="row mb-4">
    <div class="col-lg-8 mx-auto text-center"  style="margin-top: 90px;">
      <h2>Create account</h2>
    </div>
  </div>
  <!-- End -->


  <div class="row">
    <div class="col-lg-7 mx-auto">
      <div class="bg-white rounded-lg shadow-sm p-5">
        <div class="tab-content">

          <!-- credit card info-->
          <div id="nav-tab-card" class="tab-pane fade show active">
            <form role="form" action="" method="post">
              <div class="form-group">
                <label for="username">Email</label>
                <input type="text" name="email" placeholder="email" required class="form-control">
                <?php  

                  if(isset($data['error'])){
                    echo $data['error'];
                  }

                ?>
              </div>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="username" required class="form-control">
              </div>
                <div class="form-group">
                <label for="username">Password</label>
                <input type="password" name="password" placeholder="password" required class="form-control">
              </div>
            <div class="form-group">
                <label for="username">Phone number</label>
                <input type="text" name="phone" placeholder="phone number" required class="form-control">
              </div>
              <div class="row">
                <div class="col-sm-8">
                  <div class="form-group">
                    <label><span class="hidden-xs">Date of birth</span></label>
                    <div class="input-group">
                      <input type="number" placeholder="DD" name="day" class="form-control" required>
                      <input type="number" placeholder="MM" name="month" class="form-control" required>
                    <input type="number" placeholder="YY" name="year" class="form-control" required>
                    </div>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="form-label mr-3">Gender</label>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio1" value="1">
                  <label class="form-check-label" for="inlineRadio1">Male</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="2">
                  <label class="form-check-label" for="inlineRadio2">Female</label>
                </div>
                <div class="form-check form-check-inline">
                  <input class="form-check-input" type="radio" name="gender" id="inlineRadio2" value="3">
                  <label class="form-check-label" for="inlineRadio2">Other</label>
                </div>
                </div>
              <button type="submit" class="subscribe btn btn-primary btn-block rounded-pill shadow-sm mx-auto text-center" style="width: 20%;"  name="userregister"> Confirm  </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
$(function() {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>