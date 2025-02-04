<?php require APPROOT. '/views/inc/header.php';?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2>Create an account</h2>
            <p>Please fill out all the fields</p>
            <form action="<?php echo URLROOT; ?>/Users/register" method="post">
                <div class="form-group">
                    <input type="hidden" name="csrf_token" value="<?= $data['csrf_token'] ?>">
                    <label for="name">Name:<sup>*</sup></label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid': '';?>"
                           value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']?></span>
                </div>
                <div class="form-group">
                    <label for="email">Email:<sup>*</sup></label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid': '';?>"
                           value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']?></span>
                </div>
                <div class="form-group">
                    <label for="password">password:<sup>*</sup></label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid': '';?>"
                           value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']?></span>
                </div>
                <div class="form-group">
                    <label for="confirm_password">Role:<sup>*</sup></label>
                    <select class="form-select" name="role" aria-label="select form-control form-control-lg <?php echo (!empty($data['Role_err'])) ? 'is-invalid' : '' ?>">
                        <option value="Enseignant">Enseignant</option>
                        <option value="Etudiant">Etudiant</option>
                    </select>
                    <span class="invalid-feedback"><?php echo $data['Role_err']?></span>
                </div>
                <div class="row">
                    <div class="col">
                        <input type="submit" value="register" class="btn btn-success btn-block">
                    </div>
                    <div class="col">
                        <a href="<?= URLROOT; ?>/Users/login" class="btn btn-light btn-block">has an account ? login </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php require APPROOT. '/views/inc/footer.php';?>
