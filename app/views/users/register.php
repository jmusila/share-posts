<?php require APPROOT . '/views/includes/header.php'; ?>
    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card card-body bg-light mt-5">
                <h2>Register New User</h2>
                <p>Please fill out this form to rgister with us</p>
                <form action="<?php echo URLROOT; ?>/users/register" method="post">
                    <div class="form-group">
                        <label for="name">Name: <sup>*</sup></label>
                        <input type="text" name="name" class="form-control form-control-lg 
                            <?php echo (!empty($data['name_error'])) ? 'is_invalid' : ''; ?>"
                            value="<?php echo $data['name']; ?>"
                        >
                        <span class="invalid-feedback"><?php echo $data['name_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email: <sup>*</sup></label>
                        <input type="email" name="email" class="form-control form-control-lg 
                            <?php echo (!empty($data['email_error'])) ? 'is_invalid' : ''; ?>"
                            value="<?php echo $data['email']; ?>"
                        >
                        <span class="invalid-feedback"><?php echo $data['email_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="password">Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg 
                            <?php echo (!empty($data['password_error'])) ? 'is_invalid' : ''; ?>"
                            value="<?php echo $data['password']; ?>"
                        >
                        <span class="invalid-feedback"><?php echo $data['password_error']; ?></span>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">Confrim Password: <sup>*</sup></label>
                        <input type="password" name="password" class="form-control form-control-lg 
                            <?php echo (!empty($data['confirm_password_error'])) ? 'is_invalid' : ''; ?>"
                            value="<?php echo $data['password']; ?>"
                        >
                        <span class="invalid-feedback"><?php echo $data['confirm_password_error']; ?></span>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php require APPROOT . '/views/includes/footer.php'; ?>