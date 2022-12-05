<div class="header">
    <h1>Data Trx Member</h1>
    <button><a href="<?= base_url('/Subsmembers/add') ?>">Add</a></button>
</div>
<div class="isi">
    <div class="card">
        <table class="table p-3">
            <tr>
                <td>No</td>
                <td>Member Name</td>
                <td>Subscription Title</td>
                <td>Trx Date</td>
                <td>Active at</td>
                <td>Expire at</td>
                <td>Status</td>
                <td>Total Order</td>
                <td>Note</td>
                <td>Create At</td>
                <td>Action</td>
            </tr>
            <?php
            $no = 1;
            foreach ($subsmembers as $dt) :
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $dt->memberName ?></td>
                    <td><?= $dt->subsTitle ?></td>
                    <td><?= $dt->trx_date ?></td>
                    <td><?= $dt->active_at ?></td>
                    <td><?= $dt->expire_at ?></td>
                    <td><?= $dt->status ?></td>
                    <td><?= $dt->total_order ?></td>
                    <td><?= $dt->note ?></td>
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