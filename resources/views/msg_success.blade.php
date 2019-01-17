<?php if(session('msg_success')) : ?>
    <div class="col-md-12">
        <div class="alert alert-success">
            <?=session('msg_success')?>
        </div>
    </div>
<?php endif ?>