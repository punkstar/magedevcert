<?php
if (version_compare(Mage::getVersion(), '1.4', '>') && Mage::getStoreConfigFlag('payment/ccsave/active')) {
    class Nick_DynamicPaymentHelper_Helper_Payment_Data extends Mage_Payment_Helper_Data {
        /**
         * Do your overwriting here.
         */
    }
} else {
    class Nick_DynamicPaymentHelper_Helper_Payment_Data extends Mage_Payment_Helper_Data {}
}