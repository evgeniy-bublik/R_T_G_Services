<?php

namespace denbora\R_T_G_Services\examples\RESTv2\Service;

use denbora\R_T_G_Services\casino\CasinoRestV2;
use denbora\R_T_G_Services\examples\RESTv2\RestExample;
use denbora\R_T_G_Services\R_T_G_ServiceException;

class GetDownloadUrlGET extends RestExample
{
    /**
     * GetDownloadUrlGET constructor.
     * @param CasinoRestV2 $casino
     */
    public function __construct(CasinoRestV2 $casino)
    {
        try {
            $query = [
                'serverType' => 2,
            ];

            $result = $casino->ServiceService->getDownloadUrlGET(json_encode($query));

            dd($result);
        } catch (R_T_G_ServiceException $exception) {
            dd($exception->getMessage());
        }
    }
}
