<?php
namespace Magento\Catalog\Model\Indexer\Product\Flat\Table\Builder;

/**
 * Interceptor class for @see \Magento\Catalog\Model\Indexer\Product\Flat\Table\Builder
 */
class Interceptor extends \Magento\Catalog\Model\Indexer\Product\Flat\Table\Builder implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\DB\Adapter\AdapterInterface $connection, $tableName)
    {
        $this->___init();
        parent::__construct($connection, $tableName);
    }

    /**
     * {@inheritdoc}
     */
    public function addColumn($name, $type, $size = null, $options = array(), $comment = null)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'addColumn');
        if (!$pluginInfo) {
            return parent::addColumn($name, $type, $size, $options, $comment);
        } else {
            return $this->___callPlugins('addColumn', func_get_args(), $pluginInfo);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function getTable()
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'getTable');
        if (!$pluginInfo) {
            return parent::getTable();
        } else {
            return $this->___callPlugins('getTable', func_get_args(), $pluginInfo);
        }
    }
}
