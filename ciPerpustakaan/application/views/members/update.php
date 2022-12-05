<div class="header">
    <h1>Update Member</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?=base_url('/Member') ?>">Back</a></button>
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
            <input type="hidden" name="id" id="id" value="<?= $member->id?>">
            <div class="form-group">
                <label for="nik" class="form-label">NIK</label>:
                <input type="text" name="nik" id="nik" value="<?= $member->nik?>">
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>:
                <input type="text" name="full_name" id="full_name" value="<?= $member->full_name?>">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>:
                <input type="text" name="phone" id="phone" value="<?= $member->phone?>">
            </div>
            <div class="form-group">
                <label for="address">Address</label>:
                <input type="text" name="address" id="address" value="<?= $member->address?>">
            </div>
            <div class="form-group">
                <label for="born_place">Born Place</label>:
                <input type="text" name="born_place" id="born_place" value="<?= $member->born_place?>">
            </div>
            <div class="form-group">
                <label for="born_date">Born Date</label>:
                <input type="date" name="born_date" id="born_date" value="<?= $member->born_date?>">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>:
                <select name="gender" id="gender">
                    <option value="L" <?= $member->gender == 'L' ? 'selected' : '';?>>Laki-laki</option>
                    <option value="P" <?= $member->gender == 'P' ? 'selected' : '';?>>Perempuan</option>
                    <option value="O" <?= $member->gender == 'O' ? 'selected' : '';?>>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country</label>:
                <input type="text" name="country" id="country" value="<?= $member->country?>">
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>:
                <select name="nationality" id="nationality">
                    <option value="WNI" <?= $member->nationality == 'WNI' ? 'selected' : '';?>>WNI</option>
                    <option value="WNA" <?= $member->nationality == 'WNA' ? 'selected' : '';?>>WNA</option> 
                </select>
            </div>
            <input type="submit" value="submit" class="saveButton">
        </form>
    </div>
</div>