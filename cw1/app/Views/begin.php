<div class=" mx-auto mb-3 mt-3 col-8">
<h3>Hit the "Start" button to start the quiz"</h3>
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo base_url('quiz/start');?>" name="post_form" id="post_form" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Please enter name">
          </div> 

          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Start</button>
          </div>
          
        </form>
      </div>
 
    </div>
  
</div>