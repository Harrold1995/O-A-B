<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();

    $minCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/bootstrap.min.css");
    $minCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/loader.css");
    $minCSS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/css/style.css");


    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/dist/style.css");


    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();

    $minJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/jquery-3.5.1.min.js");
    $minJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/bootstrap.bundle.min.js");
    $minJS->add(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/assets/js/main.js");


    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_THEME . "/dist/script.js");
}
