<?php

namespace denbora\R_T_G_Services\examples\RESTv2\Report;

use denbora\R_T_G_Services\casino\CasinoRestV2;
use denbora\R_T_G_Services\examples\RESTv2\RestExample;
use denbora\R_T_G_Services\R_T_G_ServiceException;

class ThirdPartyOptInOptOutGET extends RestExample
{
    /**
     * ThirdPartyOptInOptOutGET constructor.
     * @param CasinoRestV2 $casino
     */
    public function __construct(CasinoRestV2 $casino)
    {
        try {
            $query = [
                'startDate' => '2019-07-07',
                'endDate' => '2019-07-08',
//                'gameId' => 0,
//                'playerId' => '10307426',
//                'playerLogin' => 'tony_0003',
            ];

            $result = $casino->ReportService->thirdPartyOptInOptOutGET(json_encode($query));

            dd($result);
        } catch (R_T_G_ServiceException $exception) {
            dd($exception->getMessage());
        }
    }
}
