<div role="main" class="container">
<div class="card">
    <div class="card-header">
        <span>Login</span>
    </div>
    <div class="card-body">
        <?php
        if ($this->session->flashdata('error') != '') {
            echo '<div class="alert alert-danger" role="alert">';
            echo $this->session->flashdata('error');
            echo '</div>';
        }
        ?>

        <?php
        if ($this->session->flashdata('success_register') != '') {
            echo '<div class="alert alert-info" role="alert">';
            echo $this->session->flashdata('success_register');
            echo '</div>';
        }
        ?>

        <form action="" method="post" class="form">
            <input type="text" name="username" id="username" placeholder="Username">
            <input type="password" name="password" id="password" placeholder="Password">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </div>
</div>