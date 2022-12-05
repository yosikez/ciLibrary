<div class="header">
    <h1>Data Members</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?= base_url('Member/add')?>">Add</a></button>
</div>
<div class="container isi">
    <div class="card">


        <div class="table-wra p-3">
            <table class="table p-3">
                <tr>
                    <td>No</td>
                    <td>NIK</td>
                    <td>Full Name</td>
                    <td>Phone</td>
                    <td>Address</td>
                    <td>Born Place</td>
                    <td>Born Date</td>
                    <td>Gender</td>
                    <td>Country</td>
                    <td>Nationality</td>
                    <td>Active</td>
                    <td>Created At</td>
                    <td>Action</td>
                </tr>
                <?php

                $no = 1;
                foreach ($members as $dt) :
                ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $dt->nik ?></td>
                        <td><?= $dt->full_name ?></td>
                        <td><?= $dt->phone ?></td>
                        <td><?= $dt->address ?></td>
                        <td><?= $dt->born_place ?></td>
                        <td><?= $dt->born_date ?></td>
                        <td><?= $dt->gender ?></td>
                        <td><?= $dt->country ?></td>
                        <td><?= $dt->nationality ?></td>
                        <td><?= $dt->is_active ?></td>
                        <td><?= $dt->created_at ?></td>
            
                        <td>
                            <a href="<?=base_url("/Member/edit/$dt->id")?>" class="">Update</a>
                            <a href="<?=base_url("/Member/delete/$dt->id")?>">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>