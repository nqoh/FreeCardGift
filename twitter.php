<?php

    session_start();
    require 'autoload.php';
    use Abraham\TwitterOAuth\TwitterOAuth;
    
    define('CONSUMER_KEY', 'iv0XTIc0LkBHF16JXOg8NcciL'); // add your app consumer key between single quotes
    define('CONSUMER_SECRET', '0xA8iZ5FayGAzNLik5SAfI0kaU0pKpOfX8zgoTl7Bawzr90wYw'); // add your app consumer secret key between single quotes
    define('OAUTH_CALLBACK', 'http://olovamp3.com/test_twitter/callback.php'); // your app callback URL
    
    if (!isset($_SESSION['access_token'])) {
    	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET);
    	$request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => OAUTH_CALLBACK));
    	$_SESSION['oauth_token'] = $request_token['oauth_token'];
    	$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
    	$url = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));
    	header('Location:'.$url);
    } else {
    	$access_token = $_SESSION['access_token'];
    	$connection = new TwitterOAuth(CONSUMER_KEY, CONSUMER_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
    	
    	$params = array(['include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true',]);
    
    	$user = $connection->get("account/verify_credentials",['include_email' => 'true', 'include_entities' => 'false', 'skip_status' => 'true',]);
    	print_r($user);
    }
