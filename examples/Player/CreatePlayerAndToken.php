<?php

namespace denbora\R_T_G_Services\examples\Player;

use denbora\R_T_G_Services\casino\Casino;

class CreatePlayerAndToken
{
    /**
     * CreatePlayerAndToken constructor.
     * @param string $service
     * @param string $method
     * @param Casino $casino
     */
    public function __construct(string $service, string $method, $casino)
    {
        try {
            $playerService = $casino->getService($service);
            $createData = array(
                'Player' => array(
                    'Login' => 'porter-3121',
                    'Password' => 'porter_3121',
                    'Contact' => array(
                        'CountryID' => 'EG',
                        'EMail' => 'opagangtest22@gmail.com'
                    )
                ),
                'ThirdPartyDataSync' => false,
                'UserID' => 0,
                'MapToAffID' => false,
                'CalledFromCasino' => false,
                'ApplicationName' => 'External Token'
            );

            $result = $playerService->call($method, $createData);

            echo "<pre>";
            var_dump($result);
            echo "<pre>";
        } catch (\Exception $e) {
            echo "<pre>";
            var_dump($e);
            echo "</pre>";
        }
    }
}