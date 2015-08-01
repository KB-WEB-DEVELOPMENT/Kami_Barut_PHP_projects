<?php

/*  DESIGN PATTERNS.

Aggregator Pattern : By extending Entry, the aggregate can actually stand in any place that entry did,
and can itself contain other aggregated collections. 

*/

	class EntryAggregate extends Entry {

		protected $entries;

		// other properties ...

		public function display() {

			foreach($this->entries as $entry) {
				$entry->display();
			}	
		}
		
		public function add(Entry $e) {
		
			array_push($this->entries, $e);
		}
	}	
	
/* Proxy Pattern

Problem: You need to provide access to an object, but it has an interface you don’t know at compile time.

Solution: Use accessor/method overloading to dynamically dispatch methods to the object.

Discussion: This is very typical of RPC-type facilities like SOAP where you can interface with the service by reading in a definitions file of some sort at runtime.

(see example below)

*/	

class SOAP_Client {

	public $wsdl;

	public function __construct($endpoint) {
	
		$this->wsdl= WSDLManager::get($endpoint);
	
	}

	public function __call($method, $args) {
		
		$port= $this->wsdl->getPortForOperation($method);
		
		$this->endpoint=$this->wsdl->getPortEndpoint($port);
		
		$request= SOAP_Envelope::request($this->wsdl);
		
		$request->addMethod($method, $args);
		
		$data= $request->saveXML();
		
		return SOAP_Envelope::parse($this->endpoint,$data);
	}
}

/* OBSERVER PATTERN

Problem: You want an object to automatically notify dependents when it is updated.

Solution: Allow 'observer' to register themselves with the observable object.

Discussion: An object may not apriori know who might be interested in it. The Observer pattern allows objects to register their interest and supply a notification method.

see ex below, Concrete Examples: logging facilities: email, debugging, SOAP message notifications.


*/ 

// Object Storage in PHP < 5.2

class ObjectStorage		{
	
	protected $storage = array();
	
	function attach($obj) {
		
		foreach($this->storage as $o) {
		
			if ($o === $obj) return;
		}
	
		$this->storage[] = $obj;
	
	}
	
	function detatch($obj) {
		
		foreach($this->storage as $k => $o) {
		
			if ($o === $obj) {
				unset($this->storage[$k]);
				return;
			}
		}
	}
}

// Object Storage in PHP from  5.2, use code below or simply use SplObjectStorage

class ObjectStorage {
	
	protected $storage = array();
	
	function attach($obj) {
	
		$this->storage[spl_object_hash($obj)] = $obj;
	
	}
	
	function detatch($obj) {
	
		unset($this->storage[spl_object_hash($obj)]);
	
	}
}

class MySubject implements Subject {

	protected $observers;

	public function __construct() {

		$this->observer = new ObjectStorage;
	}

	public function attach(Observer $o) {

	$this->observers->attach($o);

	}

	public function detach(Observer $o) {

		$this->observers->detach($o);
	}

	public function notify() {

		foreach($this->observers as $o) 
			$o->update($this);
	}
}

class MyObserver implements Observer {

	public function update(Subject $s) {
	// do logging or some other action}
	}
}
