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
            <input type="hidden" name="id" id="id" value="<?= $subscription->id?>">
            <div class="form-group">
                <label for="title" class="form-label">Subscription Title</label>:
                <input type="text" name="title" id="title" value="<?= $subscription->title?>">
            </div>
            <div class="form-group">
                <label for="month">Month</label>:
                <input type="text" name="month" id="month" value="<?= $subscription->month?>">
            </div>
            <div class="form-group">
                <label for="price">Price</label>:
                <input type="text" name="price" id="price" value="<?= $subscription->price?>">
            </div>
            <div class="form-group">
                <label for="is_active">Activation</label>:
                <select name="is_active" id="is_active">
                    <option value="1" <?= $subscription->price == 1 ? 'selected':''?>>Active</option>
                    <option value="0" <?= $subscription->price == 0 ? 'selected':''?>>Non-Active</option>
                </select>
            </div>
            <input type="submit" value="submit" class="saveButton">
        </form>
    </div>
</div>