<div class="header">
    <h1>Data Books</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('Book/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>ISBN</td>
                    <td>Title</td>
                    <td>Synopsis</td>
                    <td>Author</td>
                    <td>Publisher</td>
                    <td>Category</td>
                    <td>Language</td>
                    <td>Created At</td>
            
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($books as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dt->isbn ?></td>
                        <td><?= $dt->title ?></td>
                        <td><?= $dt->synopsis ?></td>
                        <td><?= $dt->author ?></td>
                        <td><?= $dt->publisher ?></td>
                        <td><?= $dt->category ?></td>
                        <td><?= $dt->language ?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Book/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/Book/delete/$dt->id")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>