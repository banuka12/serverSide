<div class="mx-auto col-8 mb-3 mt-3">
<div class="alert alert-light" role="alert">
Player Name:  <?= $name ?>
</div>
</div>

<div class="card mx-auto mb-3 mt-3 col-4">
    <img class="card-img-top mb-3 mt-3" src="<?php echo $question['img_url'] ?>" alt="Card image cap" style="width: 480px;">
    <div class="card-body">
        <form action="<?= $next_url ?>" name="post_form" id="post_form" method="post" accept-charset="utf-8">
            <p>Who is this?</p>
            <div class="form-group">
                <input type="radio" id="first_answer" name="answer" value="1" checked>
                <label for="answer"><?php echo $first_answer['name'] ?></label><br>
                <input type="radio" id="second_answer" name="answer" value="2">
                <label for="answer"><?php echo $second_answer['name'] ?></label><br>
            </div>

            <div class="form-group">
                <button type="submit" id="send_form" class="btn btn-success">Submit</button>
            </div>

        </form>
    </div>
</div>