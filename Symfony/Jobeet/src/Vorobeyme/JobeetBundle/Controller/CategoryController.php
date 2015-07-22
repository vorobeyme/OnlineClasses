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

		// Pagination
		$totalJobs = $em->getRepository('VorobeymeJobeetBundle:Job')->countActiveJobs($category->getId());
	    $jobsPerPage = $this->container->getParameter('max_jobs_on_category');
	    $lastPage = ceil($totalJobs / $jobsPerPage);
	    $prevPage = $page > 1 ? $page - 1 : 1;
	    $nextPage = $page < $lastPage ? $page + 1 : $lastPage;
	    $offset = ($page - 1) * $jobsPerPage;

		$category->setActiveJobs($em->getRepository('VorobeymeJobeetBundle:Job')->getActiveJobs($category->getId(), $jobsPerPage, $offset));

		return $this->render('VorobeymeJobeetBundle:Category:show.html.twig', array(
			'category' => $category,
	        'last_page' => $lastPage,
	        'prev_page' => $prevPage,
	        'current_page' => $page,
	        'next_page' => $nextPage,
	        'total_jobs' => $totalJobs
		));
	}
}
