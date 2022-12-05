<div class="header">
    <h1>Data Subscriptions</h1>
    <button><a href="<?= base_url('Subscriptions/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>Subscription Title</td>
                    <td>Month</td>
                    <td>Price</td>
                    <td>Active Status</td>
                    <td>Created At</td>
            
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($subscriptions as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>   
                        <td><?= $dt->title ?></td>
                        <td><?= $dt->month ?></td>
                        <td><?= $dt->price ?></td>
                        <td><?= $dt->is_active == 1 ? 'Active' : 'Non-Active'?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Subscriptions/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/Subscriptions/delete/$dt->id")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>