<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Client\Customer\Model;

interface CustomerSecuredPatternInterface
{
    /**
     * @return string
     */
    public function getCustomerSecuredPatternForUnauthenticatedCustomerAccess(): string;
}
