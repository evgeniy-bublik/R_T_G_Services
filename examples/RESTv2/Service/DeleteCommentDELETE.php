<?php

namespace denbora\R_T_G_Services\examples\RESTv2\Service;

use denbora\R_T_G_Services\casino\CasinoRestV2;
use denbora\R_T_G_Services\examples\RESTv2\RestExample;
use denbora\R_T_G_Services\R_T_G_ServiceException;

class DeleteCommentDELETE extends RestExample
{
    /**
     * DeleteCommentDELETE constructor.
     * @param CasinoRestV2 $casino
     */
    public function __construct(CasinoRestV2 $casino)
    {
        #IS NOT TESTED#
        try {
            $query = [
                'commentId' => '',
                'markAsDeletedOnly' => true
            ];

            $result = $casino->ServiceService->deleteCommentDELETE(json_encode($query));

            dd($result);
        } catch (R_T_G_ServiceException $exception) {
            dd($exception->getMessage());
        }
    }
}
