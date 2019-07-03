<?php

namespace denbora\R_T_G_Services\services\RESTv2;

use denbora\R_T_G_Services\R_T_G_ServiceException;

class CouponService extends RestV2Service implements RestServiceInterface
{
    const SERVICE_NAME = 'Coupon';

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function getCouponsGET($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'GetCoupons', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function getRequestedAndRedeemedCouponsGET($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'GetRequestedAndRedeemedCoupons', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function redeemCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'RedeemCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function discardCouponDELETE($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'DiscardCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function copyCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'CopyCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function createBonusBalanceSingleUseFixedAmountOnRedemptionCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'CreateBonusBalanceSingleUseFixedAmountOnRedemptionCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function createBonusBalanceSingleAccountFaPercentageOfNextDepositCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'CreateBonusBalanceSingleAccountFaPercentageOfNextDepositCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function createBonusBalanceSingleUseModFixedAmountNextDepositCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'CreateBonusBalanceSingleUseModFixedAmountNextDepositCoupon', $queryJSON);
    }

    /**
     * @param string $queryJSON
     * @return array|mixed|object|string
     * @throws R_T_G_ServiceException
     */
    public function createBonusBalanceSingleAccountModPercentageOfNextDepositCouponPOST($queryJSON = '{}')
    {
        return $this->callMethod(self::SERVICE_NAME, 'CreateBonusBalanceSingleAccountModPercentageOfNextDepositCoupon', $queryJSON);
    }
}
