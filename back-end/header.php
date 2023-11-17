<?php 
/* These are PHP header functions that are used to enable Cross-Origin Resource Sharing (CORS) for a
web application. */
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
header('Access-Control-Allow-Headers: token, Content-Type');
header('Access-Control-Max-Age: 1728000');
header('Content-Type: text/plain');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Origin', 'http://localhost:5173');
header('Access-Control-Allow-Headers', 'Content-Type');
header('Access-Control-Allow-Methods', 'GET, POST, OPTIONS, PUT, PATCH, DELETE');
?>