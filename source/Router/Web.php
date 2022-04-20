<?php

namespace Source\Router;

use Source\Core\Controller;

class Web extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../themes/" . CONF_VIEW_THEME . "/");
    }

    public function home(): void
    {

        $head = $this->seo->getTags(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/img/Arterial-Education-Logo.png")
        );
        echo $this->view->render("home", [
            "head" => $head
        ]);
    }


    public function resources(array $data): void
    {

        // Check if user is using the token on the url and validate if it is a valid token
        if (!in_array($data['token'], CONF_URL_TOKEN)){
            redirect('/');
        }

        $head = $this->seo->getTags(
            CONF_SITE_NAME,
            CONF_SITE_DESC,
            url(),
            theme("/assets/img/Arterial-Education-Logo.png")
        );
        echo $this->view->render("resources", [
            "head" => $head
        ]);
    }

    /**
     * SITE NAV ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        $head = $this->seo->getTags(
            CONF_SITE_NAME . " 404 -  We couldn't find this page ",
            CONF_SITE_DESC,
            url(),
            theme("/assets/img/Arterial-Education-Logo.png")
        );
        echo $this->view->render("error", [
            "head" => $head
        ]);
    }



}
