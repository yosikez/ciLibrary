<div class="header">
    <h1>Input Data Books</h1>
    <button><a href="<?= base_url('/BookTrx') ?>">Back</a></button>
</div>

<div class="container isi">
    <div class="card">
        <?php
        if (validation_errors() != false) {
        ?>
            <div class="alert" role="alert">
                <?= validation_errors(); ?>
            </div>
        <?php
        }
        ?>
        <form class="form p-3" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="book_id" class="form-label">Id Book</label>:
                <select name="book_id" id="book_id" class="form-select">
                    <?php foreach ($books as $bk) : ?>
                        <option value="<?= $bk->id ?>" <?= $bk->id == $trx->book_id ? "selected" : ""?>><?= $bk->id." - ".$bk->title ?></option>
                    <?php endforeach; ?>
                </select>
                
            </div>
    
            <div class="form-group">
                <label for="member_id" class="form-label">Member Name</label>:
                <select name="member_id" id="member_id" class="form-select">
                    <?php foreach ($members as $mId) : ?>
                        <option value="<?= $mId->id ?>" <?= $mId->id == $trx->member_id ? "selected" : ""?>><?= $mId->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
             <label for="detail_id" class="form-label">Id Detail</label>:
                <select name="detail_id" id="detail_id" class="form-select">
                    <?php foreach ($detail as $dtl) : ?>
                        <option value="<?= $dtl->id ?>" <?= $dtl->id == $trx->member_id ? "selected" : ""?>><?= $dtl->id; echo " - ".$dtl->title; echo " - ".$dtl->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
    
            <div class="form-group">
                <label for="type" class="form-label">Type</label>:
                <select name="type" id="type" class="form-select">
                    <option value="fine" <?= $trx->type == 'fine' ? "selected" : ""?>>Fine</option>
                    <option value="borrow" <?= $trx->type == 'borrow' ? "selected" : ""?>>Borrow</option>
                </select>
            </div>
            <div class="form-group">
                <label for="price" class="form-label">Total Price</label>:
                <input type="number" name="price" id="price" class="form-control" value="<?= $trx->price?>">
            </div>
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>