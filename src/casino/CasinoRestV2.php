<?php

namespace denbora\R_T_G_Services\casino;

use denbora\R_T_G_Services\responses\RestV2Response;
use denbora\R_T_G_Services\validators\RestV2Validator;
use denbora\R_T_G_Services\services\RESTv2\HelperService;
use denbora\R_T_G_Services\services\RESTv2\PlayerService;
use denbora\R_T_G_Services\services\RESTv2\PromotionService;
use denbora\R_T_G_Services\services\RESTv2\AccountService;
use denbora\R_T_G_Services\services\RESTv2\CashierService;
use denbora\R_T_G_Services\services\RESTv2\CasinoService;
use denbora\R_T_G_Services\services\RESTv2\CouponService;
use denbora\R_T_G_Services\services\RESTv2\EmailNotificationService;
use denbora\R_T_G_Services\services\RESTv2\GameService;
use denbora\R_T_G_Services\services\RESTv2\HistoryService;
use denbora\R_T_G_Services\services\RESTv2\JackpotService;
use denbora\R_T_G_Services\services\RESTv2\MessageService;
use denbora\R_T_G_Services\services\RESTv2\ReportService;
use denbora\R_T_G_Services\services\RESTv2\ServiceService;
use denbora\R_T_G_Services\services\RESTv2\SettingsService;
use denbora\R_T_G_Services\services\RESTv2\VigService;
use denbora\R_T_G_Services\services\RESTv2\WalletService;
use denbora\R_T_G_Services\services\REST\RestServiceInterface;
use denbora\R_T_G_Services\R_T_G_ServiceException;

/**
 * Class CasinoRestV2
 * @package denbora\R_T_G_Services\casino
 * @property AccountService AccountService
 * @property CashierService CashierService
 * @property CasinoService CasinoService
 * @property CouponService CouponService
 * @property EmailNotificationService EmailNotificationService
 * @property GameService GameService
 * @property HistoryService HistoryService
 * @property JackpotService JackpotService
 * @property MessageService MessageService
 * @property PlayerService PlayerService
 * @property PromotionService PromotionService
 * @property ReportService ReportService
 * @property ServiceService ServiceService
 * @property SettingsService SettingsService
 * @property VigService VigService
 * @property WalletService WalletService
 * @property HelperService HelperService
 */
class CasinoRestV2 extends AbstractCasinoRest
{
    /**
     * @var array
     */
    protected static $restV2Services = [];

    /**
     * CasinoRestV2 constructor.
     * @param string $baseUrl
     * @param string $certificate
     * @param string $key
     * @param string $password
     * @param string $apiKey
     * @throws R_T_G_ServiceException
     */
    public function __construct(
        string $baseUrl,
        string $certificate,
        string $key,
        string $password,
        string $apiKey = ''
    ) {
        parent::__construct($baseUrl, $certificate, $key, $password, $apiKey);
    }

    /**
     * @param string $serviceName
     * @return RestServiceInterface|mixed
     * @throws R_T_G_ServiceException
     */
    public function __get(string $serviceName)
    {
        $serviceNamespace = 'denbora\\R_T_G_Services\\services\\RESTv2\\' . $serviceName;

        if (class_exists($serviceNamespace)) {
            return $this->createService($serviceNamespace);
        }

        throw new R_T_G_ServiceException('No such service - ' . $serviceName);
    }

    /**
     * @param string $serviceName
     * @return RestServiceInterface
     * @throws R_T_G_ServiceException
     */
    public function getService(string $serviceName): RestServiceInterface
    {
        return $this->__get($serviceName);
    }

    /**
     * @param string $serviceName
     * @return RestServiceInterface
     */
    protected function createService(string $serviceName): RestServiceInterface
    {
        if (!key_exists($serviceName, static::$restV2Services)) {
            /** @var $serviceInstance RestServiceInterface */
            $serviceInstance = new $serviceName(
                $this->certificateFile,
                $this->keyFile,
                $this->password,
                new RestV2Validator(),
                new RestV2Response(),
                $this->baseUrl,
                $this->apiKey
            );

            if (!$serviceInstance->hasConnectTimeout()) {
                $serviceInstance->setConnectTimeout($this->connectTimeout);
            }

            if (!$serviceInstance->hasTimeout()) {
                $serviceInstance->setTimeout($this->timeout);
            }

            static::$restV2Services[$serviceName] = $serviceInstance;
        }

        return static::$restV2Services[$serviceName];
    }
}
