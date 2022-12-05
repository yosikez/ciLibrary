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
                <label for="member_id" class="form-label">Member Name</label>:
                    <select name="member_id" id="member_id" class="form-select">
                    <?php foreach ($members as $mems) : ?>
                        <option value="<?= $mems->id ?>" <?= $mems->id == $subsmember->member_id ? "selected" : "" ?>><?= $mems->full_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="subs_id" class="form-label">Subscription Title</label>:
                <select name="subs_id" id="subs_id" class="form-select">
                    <?php foreach ($subscriptions as $subs) : ?>
                        <option value="<?= $subs->id ?>"><?= $subs->title ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="active_at">Active At</label>:
                <input type="date" name="active_at" id="active_at" class="form-control" value="<?= $subsmember->active_at?>">
            </div>
            <div class="form-group">
                <label for="status" class="form-label">Status</label>:
                <select name="status" id="status" class="form-select">
                    <option value="PAID" <?= $subsmember->status == 'PAID' ? 'selected':''?>>PAID</option>
                    <option value="UNPAID" <?= $subsmember->status == 'UNPAID' ? 'selected':''?>>UNPAID</option>
                </select>
            </div>
            <div class="form-group">
                <label for="total_order" class="form-label">Total Order</label>:
                <input type="number" name="total_order" id="total_order" value="<?= $subsmember->total_order ?>">
            </div>
            <div class="form-group">
                <label for="note" class="form-label">Note</label>:
                <input type="text" name="note" id="note" class="form-control" value="<?= $subsmember->note ?>">
            </div>
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>