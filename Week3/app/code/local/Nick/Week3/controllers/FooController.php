<?php
class Nick_Week3_FooController extends Mage_Core_Controller_Front_Action {
    public function barAction() {
        /**
         * We can't call loadLayout() if we want to load a single layout handle because it automatically adds
         * a bunch of other layout handles too from addActionLayoutHandles().
         *
         * We can't just call loadLayoutUpdates() either because the `controller_action_layout_load_before`
         * event is despatched that allows other parts of the system to hook in with other layout handles,
         * such as `customer_logged_out`.
         */
        
        $this->getLayout()->getUpdate()->addHandle('foo')->load();
        
        $this->generateLayoutXml();
        $this->generateLayoutBlocks();
        $this->_isLayoutLoaded = true;
        
        $this->renderLayout();
    }
}
