# Specifying the Store View

* The store view value can be set in a number of locations, the resolution of which value to use is specified in `Mage_Core_Model_App::_initCurrentStore()`.
	* The first place that's checked is the `$_GET['___store']` paramter.
	* The next place that's checked is in cookies.
	* The last resort is what comes from the `index.php` call.  There's a ternary statement there that first checks the `$_SERVER` value, otherwise falls back to the `base` store.
	* Or you can do `Mage::app()->setCurrentStore($store_code)`, if you wanna get all custom 'n' shit.