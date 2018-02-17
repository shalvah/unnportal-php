<?php
/**
 * Created by shalvah
 * Date: 17/02/2018
 * Time: 23:31
 */

namespace UnnPortal;


use GuzzleHttp\Psr7\Response;
use Zttp\Zttp;
use Zttp\ZttpResponse;

class Portal
{

    /**
     * @param string $username
     * @param string $password
     * @param bool $noCache Request a non-cached copy from the server
     *
     * @return Student
     */
    public static function authenticate($username, $password, $noCache = false)
    {
        $headers = $noCache ? ['Cache-control' => 'no-cache'] : [];

        /** @var ZttpResponse $response */
        $response = Zttp::withHeaders($headers)
            ->post('https://unn-api.herokuapp.com/students/auth', [
                'username' => $username,
                'password' => $password
            ]);
        if (!$response->isSuccess()) {
            throw PortalException::fromResponse($response);
        }

        $response = $response->json();
        return new Student($response['data']);
    }

}
