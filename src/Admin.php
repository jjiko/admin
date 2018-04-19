<?php namespace Jiko\Admin;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Session\SessionManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;



class Admin
{
  protected $app;
  protected $version;
  protected $booted = false;
  protected $enabled = null;

  public function __construct($app = null)
  {
    if (!$app) {
      $app = app();
    }

    $this->app = $app;
    $this->version = $app->version();
  }

  public function enable()
  {
    $this->enabled = true;

    if (!$this->booted) {
      $this->boot();
    }
  }

  public function boot()
  {
    if ($this->booted) {
      return;
    }
  }

  public function getJavascriptRenderer($baseUrl = null, $basePath = null)
  {
    if ($this->jsRenderer === null) {
      $this->jsRenderer = new JavascriptRenderer($this, $baseUrl, $basePath);
    }
    return $this->jsRenderer;
  }

  public function injectAdmin(Response $response)
  {
    $content = $response->getContent();
    $renderer = $this->getJavascriptRenderer();
    if ($this->getStorage()) {
      $openHandlerUrl = route('debugbar.openhandler');
      $renderer->setOpenHandlerUrl($openHandlerUrl);
    }
    $renderedContent = $renderer->renderHead() . $renderer->render();
    $pos = strripos($content, '</body>');
    if (false !== $pos) {
      $content = substr($content, 0, $pos) . $renderedContent . substr($content, $pos);
    } else {
      $content = $content . $renderedContent;
    }
    // Update the new content and reset the content length
    $response->setContent($content);
    $response->headers->remove('Content-Length');
  }
}