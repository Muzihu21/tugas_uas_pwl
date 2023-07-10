<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Form Login</title>
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="container p-2 mt-3">
    <center>
        <img src="https://i.imgur.com/FhwS4AM.png" width="500" height="500" align="center">
    </center>
    </div>
    <div class="kotak">
    <div class="container1 p-5 mt-2">
        <form action="" method="POST" class="login-user">
            <center>
            <p class="login-text p-2" style="font-size: 2rem; font-weight: 600; color: white;">MANGGA LEBET KA SISTEM ADMIN</p>
            </center>
            <div class="input-group">
            <input type="text" name="username" class="<?= form_error('username') ? 'invalid' : '' ?>"
					placeholder="Your username or email" value="<?= set_value('username') ?>" required />
                    <i class="fa fa-envelope fa-lg fa-fw"aria-hidden="true"></i>
				<div class="invalid-feedback">
					<?= form_error('username') ?>
            </div>
            </div>
            <div class="input-group">
            <input type="password" name="password" class="<?= form_error('password') ? 'invalid' : '' ?>"
					placeholder="Enter your password" value="<?= set_value('password') ?>" required />
                    <i class="fa fa-lock fa-lg fa-fw"aria-hidden="true"></i>
				<div class="invalid-feedback">
					<?= form_error('password') ?>
				</div>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <div class="text">
            <p class="login-register-text">Kembali ke beranda? <a href=" <?php echo base_url('beranda/index') ?>">Kembali</a></p>
            </div>
            </div>
        </form>
    </div>
</div> 
</body>
</html>