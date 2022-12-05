<div class="header">
    <h1>Data Librarian</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('Librarian/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>Avatar</td>
                    <td>Username</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>Created At</td>
            
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($librarians as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>   
                        <td><img src="<?= base_url('assets/profile/').$dt->avatar?>" alt="profile <?=$dt->username?>" class="avaImg"></td>
                        <td><?= $dt->username ?></td>
                        <td><?= $dt->name ?></td>
                        <td><?= $dt->email ?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Librarian/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/Librarian/delete/$dt->id")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>