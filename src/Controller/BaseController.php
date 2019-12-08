<?php

namespace App\Controller;

use FOS\RestBundle\Controller\AbstractFOSRestController;

class BaseController extends AbstractFOSRestController
{
    /**
     * @param  array  $data
     * @return Symfony\Component\HttpFoundation\Response
     */
    protected function sendResponse(array $data)
    {
        $view = $this->view($data);
        $view->setFormat('json');

        return $this->handleView($view);
    }
}
