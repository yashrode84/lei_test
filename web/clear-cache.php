<?php
use Drupal\Core\DrupalKernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

// Include Drupal's autoloader
$autoloader = require_once 'autoload.php';

// Create a request object
$request = Request::createFromGlobals();

// Bootstrap Drupal
$kernel = DrupalKernel::createFromRequest($request, $autoloader, 'prod');
$kernel->boot();

// Invalidate cache tags
$kernel->getContainer()->get('cache_tags.invalidator')->invalidateTags(['rendered']);

// Create a basic response object
$response = new Response();

// Terminate the kernel with the request and response objects
$kernel->terminate($request, $response);
