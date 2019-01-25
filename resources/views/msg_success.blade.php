<?php if(session('msg_success')) : ?>
    <div class="col-md-12">
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?=session('msg_success')?>
        </div>
    </div>
<?php endif ?>