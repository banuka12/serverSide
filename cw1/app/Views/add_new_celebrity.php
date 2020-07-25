<div class=" mx-auto mb-3 mt-3 col-8">
<h3>Add a new celebrity to the quiz</h3>
    <br>
    <?= \Config\Services::validation()->listErrors(); ?>
 
    <span class="d-none alert alert-success mb-3" id="res_message"></span>
 
    <div class="row">
      <div class="col-md-9">
        <form action="<?php echo base_url('celebrity/store');?>" name="post_form" id="post_form" method="post" accept-charset="utf-8">
 
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="Please enter name">
             
          </div> 
 
          <div class="form-group">
            <label for="img_url">Image_url</label>
            <input type="text" name="img_url" class="form-control" id="img_url" placeholder="Please enter img_url">
             
          </div>   
 
          <div class="form-group">
           <button type="submit" id="send_form" class="btn btn-success">Submit</button>
          </div>
          
        </form>
      </div>
 
    </div>
</div>