<?php

namespace denbora\R_T_G_Services\responses;

use denbora\R_T_G_Services\R_T_G_ServiceException;

class SecurityResponse extends BaseResponse implements SoapResponseInterface
{
    /**
     * @param $response
     * @return mixed
     */
    public function rawResponse($response)
    {
        return $response;
    }

    /**
     * Method for non unique creation in this class
     *
     * @param $response
     * @param string $errorMessage
     * @return mixed
     * @throws R_T_G_ServiceException
     */
    private function create($response, string $errorMessage)
    {
        $key = key($response);

        if ($response->$key->HasErrors) {
            $errorPrefix = $errorMessage . ' - ';
            throw new R_T_G_ServiceException($errorPrefix .
                'RTG ErrorCode - ' . $response->$key->ErrorCode . '; ' .
                'Message - ' . $response->$key->Message);
        } else {
            return $response->$key->Token;
        }
    }

    /**
     * @param $response
     * @return mixed
     * @throws R_T_G_ServiceException
     */
    public function createToken($response)
    {
        return $this->create($response, 'Create Token Error');
    }

    /**
     * @param $response
     * @return bool
     * @throws R_T_G_ServiceException
     */
    public function validateToken($response)
    {
        return $this->validate($response, 'Validate Token Error');
    }

    /**
     * @param $response
     * @return mixed
     * @throws R_T_G_ServiceException
     */
    public function createTokenByApp($response)
    {
        return $this->create($response, 'Create Token by App Error');
    }

    /**
     * @param $response
     * @return bool
     * @throws R_T_G_ServiceException
     */
    public function validateTokenByApp($response)
    {
        return $this->validate($response, 'Validate Token by App Error');
    }

    /**
     * @param $response
     * @return mixed
     * @throws R_T_G_ServiceException
     */
    public function createGameRestrictedTokenByApp($response)
    {
        return $this->create($response, 'Create Game Restricted Token by App Error');
    }
}
