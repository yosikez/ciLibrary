<div class="header">
    <h1>Input Data Subs Member</h1>
    <button><a href="<?= base_url('/Subsmembers') ?>">Back</a></button>
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
                        <option value="<?= $bk->id ?>"><?= $bk->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="member_id" class="form-label">Member Name</label>:
                <select name="member_id" id="member_id" class="form-select">
                    <?php foreach ($members as $mId) : ?>
                        <option value="<?= $mId->id ?>"><?= $mId->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
             <label for="detail_id" class="form-label">Id Detail</label>:
                <select name="detail_id" id="detail_id" class="form-select">
                    <?php foreach ($detail as $dtl) : ?>
                        <option value="<?= $dtl->id ?>"><?= $dtl->id; echo " - ".$dtl->title; echo " - ".$dtl->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
          
            <div class="form-group">
                <label for="active_at">Active At</label>:
                <input type="date" name="active_at" id="active_at" class="form-control">
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>:
                <select name="status" id="status" class="form-select">
                    <option value="fine" selected>Fine</option>
                    <option value="borrow">Borrow</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_order" class="form-label">Total Order</label>:
                <input type="number" name="total_order" id="total_order" class="form-control">
            </div>
            <div class="form-group">
                <label for="note" class="form-label">Note</label>:
                <input type="text" name="note" id="note" class="form-control">
            </div>
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>