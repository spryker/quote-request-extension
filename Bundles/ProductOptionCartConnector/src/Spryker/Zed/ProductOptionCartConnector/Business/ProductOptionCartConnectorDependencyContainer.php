<?php
/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\ProductOptionCartConnector\Business;

use Spryker\Zed\ProductOptionCartConnector\Business\Manager\ProductOptionManager;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use Spryker\Zed\ProductOptionCartConnector\Business\Model\GroupKeyExpander;
use Spryker\Zed\ProductOptionCartConnector\ProductOptionCartConnectorDependencyProvider;
use Spryker\Zed\ProductOptionCartConnector\Business\Manager\ProductOptionManagerInterface;
use Spryker\Zed\ProductOptionCartConnector\ProductOptionCartConnectorConfig;

/**
 * @method ProductOptionCartConnectorDependencyContainer getBusinessFactory()
 * @method ProductOptionCartConnectorConfig getConfig()
 */
class ProductOptionCartConnectorDependencyContainer extends AbstractBusinessFactory
{

    /**
     * @return ProductOptionManagerInterface
     */
    public function createProductOptionManager()
    {
        return new ProductOptionManager(
            $this->getProvidedDependency(ProductOptionCartConnectorDependencyProvider::FACADE_PRODUCT_OPTION)
        );
    }

    /**
     * @return GroupKeyExpander
     */
    public function createGroupKeyExpander()
    {
        return new GroupKeyExpander();
    }

}
