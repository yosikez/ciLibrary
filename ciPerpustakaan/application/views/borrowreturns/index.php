<div class="header">
    <h1>Data Book Return</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('BorrowReturn/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>Book Id</td>
                    <td>Book Name</td>
                    <td>Detail Id</td>
                    <td>Return At</td>
                    <td>Created At</td>
            
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($return as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dt->book_id ?></td>
                        <td><?= $dt->title ?></td>
                        <td><?= $dt->detail_id ?></td>
                        <td><?= $dt->return_at ?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/BorrowReturn/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/BorrowReturn/delete/$dt->id")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>