<?php
class Nick_Week3_Model_Core_Design_Package extends Mage_Core_Model_Design_Package {
    public function getFilename($file, array $params) {
        Varien_Profiler::start(__METHOD__);
        $this->updateParamDefaults($params);
        $result = $this->_fallback($file, $params, array(
            array(),
            array('_theme' => $this->getFallbackTheme()),
            array('_theme' => 'primary'),
            array('_theme' => self::DEFAULT_THEME),
            array('_package' => self::BASE_PACKAGE, '_theme' => 'enterprise'),
            array('_package' => self::BASE_PACKAGE, '_theme' => self::DEFAULT_THEME),
        ));
        Varien_Profiler::stop(__METHOD__);
        return $result;
    }
}