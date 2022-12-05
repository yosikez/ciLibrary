
<div class="header">
    <h1>Details Borrow Books</h1>
    <button><a href="<?= base_url('Borrowbooks')?>">Back</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>Books Title</td>
                    <td>Member Name</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($detail as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>   
                        <td><?= $dt->bookTitle ?></td>
                        <td><?= $dt->memberName ?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Borrowbooks/edit/$dt->brwId")?>" class="">Update</a>
                            <a href="<?=base_url("/Borrowbooks/delete/$dt->brwId")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>