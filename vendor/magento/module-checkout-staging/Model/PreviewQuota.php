<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\CheckoutStaging\Model;

use Magento\CheckoutStaging\Setup\InstallSchema;
use Magento\Framework\Model\AbstractModel;

class PreviewQuota extends AbstractModel
{
    /**
     * @var string
     */
    protected $_eventPrefix = InstallSchema::PREVIEW_QUOTA_TABLE;

    /**
     * @inheritdoc
     */
    protected function _construct()
    {
        $this->_init(ResourceModel\PreviewQuota::class);
    }
}
