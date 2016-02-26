<?php 
/* All constants goes here */

define('API_HOST','http://pantrycar.elasticbeanstalk.com');

define('LOGIN_API_ROUTE','/customers/login');

define('SIGNUP_API_ROUTE','/customers/');

define('USER_DETAIL_ROUTE','/customers/');

define('TOKEN_ROUTE','/customers/get_customer_from_token');

define("API_RESTAURANT_SEARCH_BY_ID","/restaurants/");

define("API_GET_RESTAURANT_DETAILS","/restaurants/");

define("API_ADD_NEW_RESTAURANT","/restaurants/");

define("API_ADD_NEW_RESTAURANT_CATEGORY","/menu/add_category/");

define("API_GET_RESTAURANT_MENU","/menu/");

define("API_REMOVE_MENU_CATEGORY","/menu/toggle_category_polarity");

define("API_REMOVE_MENU_ITEM","/menu/disable_item");

define("API_EDIT_MENU_CATEGORY","/menu/edit_category");

define("API_ADD_NEW_ITEM","/menu/add_item");

?>