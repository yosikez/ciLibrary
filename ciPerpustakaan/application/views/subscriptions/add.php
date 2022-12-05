<div class="header">
    <h1>Input Data Subscriptions</h1>
    <button><a href="<?=base_url('/Subscriptions') ?>">Back</a></button>
</div>

<div class="container isi">
    <div class="card">
        <?php
        if(validation_errors() != false){
            ?>
            <div class="alert" role="alert">
                <?= validation_errors();?>
            </div>
            <?php
        }
        ?>
        <form class="form p-3" action="" method="POST">
            <div class="form-group">
                <label for="title" class="form-label">Subscription Title</label>:
                <input type="text" name="title" id="title">
            </div>
            <div class="form-group">
                <label for="month">Month</label>:
                <input type="text" name="month" id="month">
            </div>
            <div class="form-group">
                <label for="price">Price</label>:
                <input type="text" name="price" id="price">
            </div>
            <input type="submit" value="submit" class="saveButton">
        </form>
    </div>
</div>