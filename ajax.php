<?php
/**
 * Created by Viktor Kim.
 * Date: 8/22/2018
 * Time: 20:59
 */

require_once 'core/Checker.php';

run();

function run() {

	$site_url      = trim( $_POST['site_url'] );
	$ping_interval = trim( $_POST['ping_interval'] );
	$user_email    = trim( $_POST['user_email'] );
	$counter       = 0;

	$checker = new Checker( $site_url, $user_email );
	$checker->ping();
}