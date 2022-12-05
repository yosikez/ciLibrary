<div class="header">
    <h1>Input Data Borrow</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('/Book') ?>">Back</a></button>
</div>

<div class="container isi">
    <div class="card">
        <form class="form p-3" action="" method="POST">
            <div class="form-group">
                <label for="member_id" class="form-label">Member Name</label>:
                <select name="member_id" id="member_id" class="form-select">
                    <?php foreach ($members as $mId) : ?>
                        <option value="<?= $mId->id ?>" <?= $mId->id == $borrow->member_id ? "selected" : "" ?>><?= $mId->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
            <label for="book_id" class="form-label">Id Book</label>:
                <select name="book_id[]" id="book_id" class="form-select" multiple required>
                    <?php foreach ($books as $bk) : ?>
                        <option value="<?= $bk->id ?>"><?= $bk->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="note">Note</label>:
                <input type="text" name="note" id="note" class="form-control" value="<?= $borrow->note?>">
            </div>

            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>