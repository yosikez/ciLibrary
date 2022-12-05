
<div class="header">
    <h1>Data Borrow</h1>
    <button><a href="<?= base_url('Borrowbooks/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>Members Name</td>
                    <td>Note</td>
                    <td>Qty Borrow books</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($borrow as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>   
                        <td><?= $dt->memberName ?></td>
                        <td><?= $dt->note ?></td>
                        <td><?= $dt->cnt ?> book</td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Borrowbooks/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/Borrowbooks/delete/$dt->id")?>">Delete</a>
                            <a href="<?=base_url("/Borrowbooks/getDetail/$dt->id")?>">Detail</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>