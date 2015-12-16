<?php

/**
 * (c) Spryker Systems GmbH copyright protected
 */

namespace Spryker\Zed\CustomerCheckoutConnector\Business;

use Generated\Shared\Transfer\CheckoutRequestTransfer;
use Generated\Shared\Transfer\CheckoutResponseTransfer;
use Generated\Shared\Transfer\OrderTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method CustomerCheckoutConnectorDependencyContainer getBusinessFactory()
 */
class CustomerCheckoutConnectorFacade extends AbstractFacade
{

    /**
     * @param OrderTransfer $order
     * @param CheckoutRequestTransfer $request
     *
     * @return void
     */
    public function hydrateOrderTransfer(OrderTransfer $order, CheckoutRequestTransfer $request)
    {
        $this->getBusinessFactory()->createCustomerOrderHydrator()->hydrateOrderTransfer($order, $request);
    }

    /**
     * @param OrderTransfer $orderTransfer
     * @param CheckoutResponseTransfer $checkoutResponse
     *
     * @return void
     */
    public function saveOrder(OrderTransfer $orderTransfer, CheckoutResponseTransfer $checkoutResponse)
    {
        $this->getBusinessFactory()->createCustomerOrderSaver()->saveOrder($orderTransfer, $checkoutResponse);
    }

    /**
     * @param CheckoutRequestTransfer $checkoutRequest
     * @param CheckoutResponseTransfer $checkoutResponse
     *
     * @return void
     */
    public function checkPreConditions(CheckoutRequestTransfer $checkoutRequest, CheckoutResponseTransfer $checkoutResponse)
    {
        $this->getBusinessFactory()->createPreConditionChecker()->checkPreConditions($checkoutRequest, $checkoutResponse);
    }

}
