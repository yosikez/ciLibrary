<div class="header">
    <h1>Update</h1>
    <button class="btn btn-success"><a class="text-white text-decoration-none" href="<?=base_url('/Book') ?>">Back</a></button>
</div>

<div class="container isi">
    <div class="card">
        <form class="form p-3" action="" method="POST">
            <input type="hidden" name="id" id="id" value="<?= $book->id?>">
            <div class="form-group">
                <label for="isbn" class="form-label">ISBN</label>:
                <input type="text" name="isbn" id="isbn" class="form-control"value="<?= $book->isbn?>">
            </div>
            <div class="form-group">
                <label for="title">Title</label>:
                <input type="text" name="title" id="title" class="form-control"value="<?= $book->title?>">
            </div>
            <div class="form-group">
                <label for="synopsis">Synopsis</label>:
                <input type="text" name="synopsis" id="synopsis" class="form-control"value="<?= $book->synopsis?>">
            </div>
            <div class="form-group">
                <label for="author">Author</label>:
                <input type="text" name="author" id="author" class="form-control"value="<?= $book->author?>">
            </div>
            <div class="form-group">
                <label for="publisher">Publisher</label>:
                <input type="text" name="publisher" id="publisher" class="form-control" value="<?= $book->publisher?>">
            </div>
            <div class="form-group">
                <label for="category">Category</label>:
                <input type="text" name="category" id="category" class="form-control" value="<?= $book->category?>">
            </div>
            <div class="form-group">
                <label for="language">Language</label>:
                <input type="text" name="language" id="language" class="form-control" value="<?= $book->language?>">
            </div>
            <input type="submit" value="submit" class="saveButton btn btn-primary mt-2" class="form-control">
        </form>
    </div>
</div>