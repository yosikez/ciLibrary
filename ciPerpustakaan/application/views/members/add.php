<div class="header">
    <h1>Input Data Members</h1>
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
            <div class="form-group">
                <label for="nik" class="form-label">NIK</label>:
                <input type="text" name="nik" id="nik">
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>:
                <input type="text" name="full_name" id="full_name">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>:
                <input type="text" name="phone" id="phone">
            </div>
            <div class="form-group">
                <label for="address">Address</label>:
                <input type="text" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="born_place">Born Place</label>:
                <input type="text" name="born_place" id="born_place">
            </div>
            <div class="form-group">
                <label for="born_date">Born Date</label>:
                <input type="date" name="born_date" id="born_date">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>:
                <select name="gender" id="gender">
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                    <option value="O">Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="country">Country</label>:
                <input type="text" name="country" id="country">
            </div>
            <div class="form-group">
                <label for="nationality">Nationality</label>:
                <select name="nationality" id="nationality">
                    <option value="WNI">WNI</option>
                    <option value="WNA">WNA</option>
                </select>
            </div>
            <input type="submit" value="submit" class="saveButton">
        </form>
    </div>
</div>