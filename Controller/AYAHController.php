<?php

namespace blackknight467\AYAHBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AYAHController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('AYAHBundle:Default:index.html.twig', array('name' => $name));
    }
}
