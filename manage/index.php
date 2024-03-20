<!doctype html>
<html>
<head>
    <title>Administrative Platform</title>
    <meta content="Kayode Shobalaje" name="author">
    <link rel="stylesheet" href="../src/css/bootstrap.min.css">
    <link rel="stylesheet" href="src/css/index.css">


    <!-- site icon -->
    <link rel="shortcut icon" type="image/png" href="src/img/greenworld_icon.png">
</head>
<body>

    <div id="login">
        <a href="#" class="logo_top">
            <img src="../src/img/greenworld_logo.png" alt="Greenworld Touching Lives Initiatives">
        </a>
        <div class="login-heading">
            <h2>Sign In</h2>
        </div>

        <form name="loginform" id="loginform" action="https://discovertao.com.ng/wp-login.php" method="post">
			<p>
				<label for="user_login" id="user_label"></label>
				<input type="text" name="log" id="user_login" class="input" value="" size="20" autocapitalize="off" autocomplete="username" required="required" placeholder="Email Address">
			</p>

			<div class="user-pass-wrap">
				<label for="user_pass" id="pass_label"><span class="label-switch"></span></label>
				<div class="wp-pwd">
					<input type="password" name="pwd" id="user_pass" class="input password-input" value="" size="20" autocomplete="current-password" spellcheck="false" required="required" placeholder="Password">
					<button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="Show password">
						<span class="dashicons dashicons-visibility" aria-hidden="true"></span>
					</button>
				</div>
			</div>
        </form>
    </div>
</body>
</html>