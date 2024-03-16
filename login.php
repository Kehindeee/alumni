<?php session_start() ?>
<div id="login-modal" class="container-fluid">
	<!-- "X" toggle button -->
	<button id="close-btn" class="btn btn-outline-dark btn-sm float-right">X</button>
	<form action="" id="login-frm">
		<div class="form-group">
			<label for="" class="control-label">Username</label>
			<input type="email" name="username" required="" class="form-control">
		</div>
		<div class="form-group">
			<label for="password" class="control-label">Password</label>
			<div class="password-input">
				<input type="password" id="password" name="password" required class="form-control">
				<div id='toggle-password' class="toggle">SHOW PASSWORD</i>
				</div>
			</div>
			<!-- Remember Password checkbox -->
			<div class="form-group form-check">
				<input type="checkbox" class="form-check-input" id="remember_password" name="remember_password">
				<label class="form-check-label" for="remember_password">Remember Password</label>
				<i class="fa-solid fa-eye" id="eye"></i>
			</div>
			<!-- Forget Password link -->
			<div class="form-group">
				<small><a href="#" id="forget_password">Forget Password</a></small>
			</div>
			<div class="text-left">
				<button class="button btn btn-info btn-sm">Login</button>
				<small><a href="index.php?page=signup" id="new_account">Create New Account</a></small>
			</div>
	</form>
</div>

<style>
	.toggle {
		cursor: pointer;
	}

	#uni_modal .modal-footer {
		display: none;
	}

	.text-left {
		text-align: left;
	}

	/* Adjusted styles for the close button */
	#close-btn {
		position: absolute;
		top: 10px;
		right: 10px;
		cursor: pointer;
		transform: translateY(-4rem);
	}

	/* Moved forget password link to the right */
	#forget_password {
		float: right;
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

		// Handle close button click event
		// $('#close-btn').click(function() {
		// 	$('#login-modal').hide();
		// });

		function close_modal() {

			$('#uni_modal').remove();
		}
		$('#close-btn').click(function() {
			close_modal(); // Call the close_modal function
		});

		$('#toggle-password').click(function() {
			var passwordInput = $('#password');

			if (passwordInput.attr('type') === 'password') {
				passwordInput.attr('type', 'text');
				$(this).removeClass('fa-eye').addClass('fa-eye-slash');
			} else {
				passwordInput.attr('type', 'password');
				$(this).removeClass('fa-eye-slash').addClass('fa-eye');
			}
		});
	});
</script>