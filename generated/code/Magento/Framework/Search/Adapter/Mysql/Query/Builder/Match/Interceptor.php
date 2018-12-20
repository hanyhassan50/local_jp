<?php
namespace Magento\Framework\Search\Adapter\Mysql\Query\Builder\Match;

/**
 * Interceptor class for @see \Magento\Framework\Search\Adapter\Mysql\Query\Builder\Match
 */
class Interceptor extends \Magento\Framework\Search\Adapter\Mysql\Query\Builder\Match implements \Magento\Framework\Interception\InterceptorInterface
{
    use \Magento\Framework\Interception\Interceptor;

    public function __construct(\Magento\Framework\Search\Adapter\Mysql\Field\ResolverInterface $resolver, \Magento\Framework\DB\Helper\Mysql\Fulltext $fulltextHelper, $fulltextSearchMode = 'IN BOOLEAN MODE', array $preprocessors = array())
    {
        $this->___init();
        parent::__construct($resolver, $fulltextHelper, $fulltextSearchMode, $preprocessors);
    }

    /**
     * {@inheritdoc}
     */
    public function build(\Magento\Framework\Search\Adapter\Mysql\ScoreBuilder $scoreBuilder, \Magento\Framework\DB\Select $select, \Magento\Framework\Search\Request\QueryInterface $query, $conditionType)
    {
        $pluginInfo = $this->pluginList->getNext($this->subjectType, 'build');
        if (!$pluginInfo) {
            return parent::build($scoreBuilder, $select, $query, $conditionType);
        } else {
            return $this->___callPlugins('build', func_get_args(), $pluginInfo);
        }
    }
}
