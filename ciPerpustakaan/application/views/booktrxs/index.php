<div class="header">
    <h1>Data Trx Member</h1>
    <button><a href="<?= base_url('/BookTrx/add') ?>">Add</a></button>
</div>
<div class="isi">
    <div class="card">
        <table class="table p-3">
            <tr>
                <td>No</td>
                <td>Book Id</td>
                <td>Book Title</td>
                <td>Member Name</td>
                <td>Detail Id</td>
                <td>Type</td>
                <td>Price</td>
                <td>Create At</td>
                <td>Action</td>
            </tr>
            <?php
            $no = 1;
            foreach ($booktrx as $dt) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->book_id ?></td>
                    <td><?= $dt->bookTitle ?></td>
                    <td><?= $dt->memberName ?></td>
                    <td><?= $dt->detail_id ?></td>
                    <td><?= $dt->type ?></td>
                    <td><?= $dt->price ?></td>
                    <td><?= $dt->created_at ?></td>

                    <td>
                        <a href="<?= base_url('/Subsmembers/edit') . "/$dt->id" ?>" class="btn btn-warning">Update</a>
                        <a href="<?= base_url('/Subsmembers/delete') . "/$dt->id" ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</div>