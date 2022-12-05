<div class="header">
    <h1>Update Data Librarian</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('/Librarian') ?>">Back</a></button>
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
            <input type="hidden" name="id" id="id" value="<?= $librarians->id ?>">
            <div class="form-group">
                <label for="username" class="form-label">username</label>:
                <input type="text" name="username" id="username" value="<?= $librarians->username ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="name" class="form-label">Nama</label>:
                <input type="text" name="name" id="name" value="<?= $librarians->name ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>:
                <input type="email" name="email" id="email" value="<?= $librarians->email ?>" class="form-control">
            </div>
            <div class="avatar">
                <label for="avatar" class="form-label">avatar</label>:
                <img src="<?= base_url('assets/profile/') . $librarians->avatar ?>" alt="" width="100px" height="100px">
            </div>
            <input type="file" name="avatar" id="avatar" value="<?= base_url('assets/profile/') . $librarians->avatar ?>" class="imgUpdate">
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-3">
        </form>
    </div>
</div>