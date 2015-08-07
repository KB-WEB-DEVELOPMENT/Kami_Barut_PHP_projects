<?php

//AbstractPageBuilder.php

  abstract class AbstractPageBuilder {

    abstract function getPage();

  }

//AbstractPageDirector.php

  abstract class AbstractPageDirector {

    abstract function __construct(AbstractPageBuilder $builder_in);

    abstract function buildPage();

    abstract function getPage();

  }

//HTMLPage.php

  class HTMLPage {

    private $page = NULL;
    private $page_title = NULL;
    private $page_heading = NULL;
    private $page_text = NULL;

    function __construct() {
    }

    function showPage() {
      return $this->page;
    }

    function setTitle($title_in) {
      $this->page_title = $title_in;
    }

    function setHeading($heading_in) {
      $this->page_heading = $heading_in;
    }

    function setText($text_in) {
      $this->page_text .= $text_in;
    }

    function formatPage() { 
		$this->page   = '[html]';
		$this->page	.= '[head][title]' . $this->page_title . '[/title][/head]';
		$this->page	.= '[body]';
		$this->page	.= '[h 1]'. $this->page_heading . '[/h 1]';
		$this->page	.= $this->page_text;
		$this->page	.= '[/body]';
		$this->page	.='[/html]';
		}
  }

//HTMLPageBuilder.php
  include_once('AbstractPageBuilder.php');
  include_once('HTMLPage.php');

  class HTMLPageBuilder extends AbstractPageBuilder {

    private $page = NULL;

    function __construct() {
	
      $this->page = new HTMLPage();
    }

    function setTitle($title_in) {
	
      $this->page->setTitle($title_in);
    }

    function setHeading($heading_in) {
	
      $this->page->setHeading($heading_in);
    }

    function setText($text_in) {
	
      $this->page->setText($text_in);
    }

    function formatPage() {
	
      $this->page->formatPage();
    }

    function getPage() {
      return $this->page;
    }
  }

//HTMLPageDirector.php

  include_once('AbstractPageBuilder.php');
  include_once('AbstractPageDirector.php');

  class HTMLPageDirector extends AbstractPageDirector {

  private $builder = NULL;

    public function __construct(AbstractPageBuilder $builder_in) {
	
	    $this->builder = $builder_in;
    }
    public function buildPage() {
	
      $this->builder->setTitle('KB DESIGN');
      $this->builder->setHeading('HOME');
      $this->builder->setText('Welcome to KB DESIGN');
      $this->builder->formatPage();
    }
    public function getPage() {
	
      return $this->builder->getPage();
    }
  }
  
 //testBuilder.php
  include_once('BookSingleton.php');
  include_once('HTMLPage.php');
  include_once('HTMLPageBuilder.php');
  include_once('HTMLPageDirector.php');

  $pageBuilder = new HTMLPageBuilder();
  $pageDirector = new HTMLPageDirector($pageBuilder);
  $pageDirector->buildPage();
  $page = $pageDirector->GetPage();
  echo $page->showPage();
  
/* output

HOME

Welcome to KB DESIGN
   
 */

?>
