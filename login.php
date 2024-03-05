<?php session_start() ?>
<div id="login-modal" class="container-fluid">
	<h2>Login</h2> <!-- Added login header -->
	<button id="close-btn" class="btn btn-outline-dark btn-sm float-right">X</button>
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="email" name="username" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="" class="control-label">Password</label>
			<input type="password" name="password" required="" class="form-control">
			<small><a href="#" id="forget_password">Forget Password?</a></small>
		</div>
		<div class="text-left">
			<button class="button btn btn-info btn-sm">Login</button>
			<small><a href="index.php?page=signup" id="new_account">Create New Account</a></small>
		</div>
	</form>
</div>

<style>
	#uni_modal .modal-footer {
		display: none;
	}

	.text-left {
		text-align: left;
	}

	#close-btn {
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
	}
</style>

<script>
	$(document).ready(function() {
		$('#login-frm').submit(function(e) {
			e.preventDefault()
			$('#login-frm button[type="submit"]').attr('disabled', true).html('Logging in...');
			if ($(this).find('.alert-danger').length > 0)
				$(this).find('.alert-danger').remove();
			$.ajax({
				url: 'admin/ajax.php?action=login2',
				method: 'POST',
				data: $(this).serialize(),
				error: err => {
					console.log(err)
					$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');

				},
				success: function(resp) {
					if (resp == 1) {
						location.href = '<?php echo isset($_GET['redirect']) ? $_GET['redirect'] : 'index.php?page=home' ?>';
					} else if (resp == 2) {
						$('#login-frm').prepend('<div class="alert alert-danger">Your account is not yet verified.</div>')
						$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
					} else {
						$('#login-frm').prepend('<div class="alert alert-danger">Email or password is incorrect.</div>')
						$('#login-frm button[type="submit"]').removeAttr('disabled').html('Login');
					}
				}
			})
		})

		$('#forget_password').click(function(e) {
			e.preventDefault();
			// Add your forget password logic here
		});

		$('#close-btn').click(function() {
			$('#login-modal').modal('hide');
		});
	});
</script>