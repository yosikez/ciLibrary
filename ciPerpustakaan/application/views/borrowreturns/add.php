<div class="header">
    <h1>Input Data Book Return</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?=base_url('/BorrowReturn') ?>">Back</a></button>
</div>

<div class="container isi">
    <div class="card">
        <form class="form p-3" action="" method="POST">
            <div class="form-group">
             <label for="detail_id" class="form-label">Id Detail</label>:
                <select name="detail_id" id="detail_id" class="form-select">
                    <?php foreach ($detail as $dtl) : ?>
                        <option value="<?= $dtl->id ?>"><?= $dtl->id; echo " - ".$dtl->title; echo " - ".$dtl->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="return_at">Return at</label>:
                <input type="datetime-local" name="return_at" id="return_at" class="form-control">
            </div>
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>