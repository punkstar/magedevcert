# Magento Request Dispatch

* `Mage::run()`
    * Main entry point of the application, sets the store that's being used.
* `Mage_Core_Model_App::run()`
	* Here we load the configuration, initialise the cache objects and initialise the store based on the configuration we've been passed from `Mage`.
	* We also prepare the `Zend_Controller_Response_Http` object and populate the `Mage_Core_Controller_Request_Http` object with our request data.  These objects are singletons and will be referenced all the way down the request chain.
	* `Mage_Core_Controller_Varien_Front::dispatch()`
    	* The front controller has an array full of routers.  We `foreach` through these routers and call the `match()` method on them.
		* `Mage_Core_Controller_Varien_Router_Standard::match()`
    		* Inside this specific router we go through the configuration file, looking for defined routes.
    		* If we find a Magento extension that has registered the `$module` part of the request (`index.php/$module/$controller/$action`) then we check
      		to see if they have a controller that matches the `$controller` part of the request, then we check to see if they have an action
      		that matches the `$action` part of the request.
    		* If all of those tests pass then we get an instance of the controller using `Mage::getControllerInstance()` and call the `dispatch()` method on that.
			* `Mage_Core_Controller_Front_Action::dispatch()`
    			* In this method we call `$this->{$action}Action()` which makes changes to the singleton response object.
    			* The call chain is then complete, so it returns to the `Mage_Core_Controller_Varien_Front::dispatch()` method.
    * Now that the response object has been modified, hopefully with the correct data, we call `Zend_Controller_Response_Http::sendResponse()` which outputs to the browser.