<?php

session_start();
require_once('vendor/twitteroauth.php');
require_once('config.php');

// Start the authentication process
if (empty($_GET['oauth_verifier'])) {
	$auth = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
	$request_token = $auth->getRequestToken(OAUTH_CALLBACK);

	// Save temporary credentials to session.
	$_SESSION['oauth_token'] = $token = $request_token['oauth_token'];
	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

	// If last auth failed don't display authorization link.
	switch ($auth->http_code) {
	  case 200:
	    // Build authorize URL and redirect user to Twitter.
	    $url = $auth->getAuthorizeURL($token);
	    header('Location: ' . $url);
	    break;
	  default:
	    // Show notification if something went wrong.
	    die('Erro.');
	}
}

// Retrieve user access tokens
else {
	$auth = new TwitterOAuth(
		CONSUMER_KEY, CONSUMER_SECRET,
		$_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
	$access_token = $auth->getAccessToken($_GET['oauth_verifier']);
	$user_info = $auth->get('account/verify_credentials');

	?>
		<h2>Access tokens:</h2>
		<pre><code><?php print_r($access_token) ?></code></pre>

		<h2>User info:</h2>
		<pre><code><?php print_r($user_info) ?></code></pre>
	<?php
}

