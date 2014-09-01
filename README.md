# Why?

Because there is no damn simple example out there showing how to retrieve an
user's access tokens from Twitter using PHP. Even if I don't code PHP, I needed
it in a project and I think someone might find it useful too.


# How to use?

Just create a `config.php` file following the example below. You can fill those
values using your app's API data, retrieved from your
[developer dashboard at Twitter][1]. If you don't have an app to use the API,
you can create one there.

	<?php

	define(CONSUMER_KEY, 'YOUR APP ACCESS TOKEN');
	define(CONSUMER_SECRET, 'YOUR APP ACCESS TOKEN SECRET');
	define(OAUTH_CALLBACK, 'http://YOURDOMAIN/some/where/twitter-auth.php');

Point your browser to the main PHP script (`twitter-auth.php`) and see the
magic happen. Note that you can set the callback to the same script. You will
be presented to all the retrieved data. Check the source, copy and use at your
will. :)

I expect you know how OAuth works. Google is your friend now.
