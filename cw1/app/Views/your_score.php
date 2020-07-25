<div class="mx-auto col-6 mb-3 mt-3">
<div class="alert alert-success" role="alert">
  <h1>
Score <?= $score ?>
  </h1>
  <hr>
  <h3>
Player: <?= $name ?>
  </h3>

</div>
<a class="btn btn-info" href="<?php echo base_url('scoreBoard');?>" role="button">See score board</a>
<a class="btn btn-success" href="<?php echo base_url('home');?>" role="button">Start a new session</a>
</div>