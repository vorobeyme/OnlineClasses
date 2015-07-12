<?php

namespace Vorobeyme\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('VorobeymeJobeetBundle:Default:index.html.twig', array('name' => $name));
    }
}
