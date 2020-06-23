<?php if(session('success')){ ?>
    
    <div class="alert alert-success alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0"><?= session('success')?></p>
    </div>
<?php } ?>

<?php if(session('error')){ ?>
    
    <div class="alert alert-danger alert-dismissable" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <p class="mb-0"><?= session('error')?></p>
    </div>
<?php } ?>