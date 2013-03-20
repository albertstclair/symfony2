<?php

require_once __DIR__.'/AppKernel.php';

use Symfony\Bundle\FrameworkBundle\HttpCache\HttpCache;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AppCache extends HttpCache
{
	/**
	 * Here is how you can configure the 
	 * Symfony2 reverse proxy to support 
	 * the PURGE HTTP method:
	 */
	protected function invalidate(Request $request)
	{
		if('PURGE' !== $request->getMethod()){
			return parent::invalidate($request);
		}
		$response = new Response();
		if(!$this->getStore()->purge($request->getUri())){
			$response->setStatusCode(404,'Not purged');
		}else{
			$response->setStatusCode(200,'Purged');
		}
		return $response;
	}
	
	protected function getOptions(){
		return array(
			'debug'						=> false,
			'default_ttl'				=> 0,
			'private_headers'			=>array('Authorization', 'Cookie'),
			'allow_reload'				=>false,
			'allow_revalidate'			=>false,
			'stale_while_revalidate'	=>2,
			'stale_if_error'			=>60,
		);
	}
}
