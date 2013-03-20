<?php
// src/Acme/HelloBundle/Controller/HelloController.php
namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * @author
 */
class HelloController extends Controller{
	
	function indexAction($name) {
		return $this->render('AcmeHelloBundle:Hello:index.html.twig',array('name'=>$name));
	}
}
