<?php 
/**
 * Return the user authenticaion status
 * 
 * @return boolean True if user is logged in , false otherwise.
 * 
 */

function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'] == true;
}