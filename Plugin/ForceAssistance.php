<?php
declare(strict_types=1);

namespace OH\LoginAsCustomerAssistance\Plugin;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\LoginAsCustomerAssistance\Model\IsAssistanceEnabled;

/**
 * Class ForceAssistance
 * @package OH\LoginAsCustomerAssistance\Plugin
 */
class ForceAssistance
{
    /**
     * @var string
     */
    const XML_PATH_FORCE_ENABLED = 'oh_customer_assistance/settings/force_assistance';

    /**
     * @var ScopeConfigInterface
     */
    private ScopeConfigInterface $scopeConfig;

    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * If enabled, force to login as customer
     *
     * @param IsAssistanceEnabled $assistanceEnabled
     * @param $result
     * @param int $customerId
     * @return bool
     */
    public function afterExecute(IsAssistanceEnabled $assistanceEnabled, $result, int $customerId): bool
    {
        if (!$this->scopeConfig->isSetFlag(self::XML_PATH_FORCE_ENABLED)) {
            return $result;
        }

        return true;
    }
}
