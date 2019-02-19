<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\NavigationStorage\Communication\Plugin\Event\Listener;

use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Navigation\Dependency\NavigationEvents;
use Spryker\Zed\PropelOrm\Business\Transaction\DatabaseTransactionHandlerTrait;

/**
 * @deprecated Use `\Spryker\Zed\NavigationStorage\Communication\Plugin\Event\Listener\NavigationStoragePublishListener` and `\Spryker\Zed\NavigationStorage\Communication\Plugin\Event\Listener\NavigationStorageUnpublishListener` instead.
 *
 * @method \Spryker\Zed\NavigationStorage\Persistence\NavigationStorageQueryContainerInterface getQueryContainer()
 * @method \Spryker\Zed\NavigationStorage\Communication\NavigationStorageCommunicationFactory getFactory()
 * @method \Spryker\Zed\NavigationStorage\Business\NavigationStorageFacadeInterface getFacade()
 * @method \Spryker\Zed\NavigationStorage\NavigationStorageConfig getConfig()
 */
class NavigationStorageListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    use DatabaseTransactionHandlerTrait;

    /**
     * @api
     *
     * @param \Generated\Shared\Transfer\EventEntityTransfer[] $eventTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventTransfers, $eventName)
    {
        $this->preventTransaction();
        $navigationIds = $this->getFactory()->getEventBehaviorFacade()->getEventTransferIds($eventTransfers);

        if ($eventName === NavigationEvents::ENTITY_SPY_NAVIGATION_DELETE ||
            $eventName === NavigationEvents::NAVIGATION_KEY_UNPUBLISH
        ) {
            $this->getFacade()->unpublish($navigationIds);

            return;
        }

        $this->getFacade()->publish($navigationIds);
    }
}
