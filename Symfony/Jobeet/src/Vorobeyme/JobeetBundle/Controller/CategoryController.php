<?php

namespace Vorobeyme\JobeetBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Vorobeyme\JobeetBundle\Entity\Category;

/**
 * Category controller
 *
 */
class CategoryController extends Controller
{
	/**
	 * Finds and displays a Category entity
	 *
	 * @param string slug
	 */
	public function showAction($slug)
	{
		$em = $this->getDoctrine()->getManager();

		$category = $em->getRepository('VorobeymeJobeetBundle:Category')->findOneBySlug($slug);

		if (!$category) {
			throw $this->createNotFoundException('Unable to find Category entity.');
		}

		$category->setActiveJobs($em->getRepository('VorobeymeJobeetBundle:Job')->getActiveJobs($category->getId()));

		return $this->render('VorobeymeJobeetBundle:Category:show.html.twig', array(
			'category' => $category,
		));
	}
}
