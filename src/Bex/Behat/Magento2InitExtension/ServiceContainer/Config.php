<?php

namespace Bex\Behat\Magento2InitExtension\ServiceContainer;

class Config
{
    const CONFIG_KEY_MAGENTO_CONFIGS = 'magento_configs';
    const CONFIG_KEY_MAGENTO_BOOTSTRAP = 'magento_bootstrap';

    /**
     * @var array
     */
    private $magentoConfigs;

    /**
     * @var string
     */
    private $magentoBootstrap;

    /**
     * @param array $config
     */
    public function __construct(array $config)
    {
        $this->magentoConfigs = $config[self::CONFIG_KEY_MAGENTO_CONFIGS];
        $this->magentoBootstrap = $config[self::CONFIG_KEY_MAGENTO_BOOTSTRAP];
    }

    /**
     * @return array
     */
    public function getRequiredMagentoConfig()
    {
        return $this->magentoConfigs;
    }

    /**
     * @return string
     */
    public function getApplicationBootstrapPath()
    {
        return $this->magentoBootstrap;
    }
}
