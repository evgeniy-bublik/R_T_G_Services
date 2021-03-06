<?php

namespace denbora\R_T_G_Services\examples\REST\Report;

use denbora\R_T_G_Services\casino\CasinoRest;

class GetGamingStats
{
    /**
     * GetGamingStats constructor.
     * @param CasinoRest $casino
     */
    public function __construct($casino)
    {
        try {
            $query = '{
                "startDate": "2017-08-09",
                "endDate": "2017-08-10",
                "forMoney": "false"
            }';
            $result = $casino->report->getGamingStats($query);

            echo "<pre>";
            var_dump($result);
            echo "</pre>";
        } catch (\Exception $e) {
            echo "<pre>";
            var_dump($e);
            echo "</pre>";
        }
    }
}
