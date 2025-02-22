<?php require APPROOT. '/views/inc/header.php';?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Login to your account</h2>
            <p>Please fill out all the fields</p>
            <form action="<?php echo URLROOT; ?>/Users/login" method="post">
                <div class="form-group">
                    <input type="hidden" name="csrf_token" value="<?= $data['csrf_token'] ?>">
                    <label for="email">Email:<sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid': '';?>"
                           value="<?= $data['email']; ?>">
                    <span class="invalid-feedback"><?= $data['email_err']?></span>
                </div>
                <div class="form-group">
                    <label for="password">password:<sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid': '';?>"
                           value="<?= $data['password']; ?>">
                    <span class="invalid-feedback"><?= $data['password_err']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="login" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/Users/register" class="btn btn-light btn-block">new here ? register </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT. '/views/inc/footer.php';?>
