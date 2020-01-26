<?php
/**
 * 
 * User: Jaysser Balido
 * Date: 1/25/2020
 * Time: 12:07 PM
 */

namespace App\Modules\Importer\Services;

use App\Modules\Importer\Services\Contracts\APIServiceInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

/**
 * Class APIService
 * @package App\Modules\Importer\Services
 */
class APIService implements APIServiceInterface
{
    /**
     * @var Client $client
     */
    protected $client;

    /**
     * @var mixed $apiUrl
     */
    private $apiUrl;

    /**
     * @var $header
     */
    private $header;

    /**
     * APIService constructor.
     *
     * @param Client $client
     * @param $apiUrl
     */
    public function __construct(Client $client, $apiUrl)
    {
        $this->client = $client;
        $this->apiUrl = $apiUrl;

        $this->header = [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ]
        ];
    }

    public function setApiUrl($url)
    {
        $this->apiUrl = $url;
    }

    /**
     * Get response from the API provider
     *
     * @return mixed|ResponseInterface
     */
    public function get($query,$is_weather=false)
    {
        // GuzzleClient removed the trailing slash from the provided URL
        // Which causing different return data from the API Provider
        $promise = $this->client->getAsync($this->apiUrl.$query, $this->header)->then(
            function ($response) {
                return $response->getBody()->getContents();
            },
            function ($exception) {
                return $exception->getMessage();
            }
        );

        $promise->wait();

        // For the mean time will use file_get_contents
        if(!$is_weather)
            $response = file_get_contents($this->apiUrl.$query);
        else
            $response = $this->callWeather($this->apiUrl.$query);

        if (!$this->isJson($response)) {
            $response = json_encode(simplexml_load_string('<xml>' . $response . '</xml>'));
        }

        return $response;
    }

    private function callWeather($url)
    {
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        
        $curl_response = curl_exec($curl);
        if ($curl_response === false) {
            $info = curl_getinfo($curl);
            curl_close($curl);
            die('error occured during curl exec. Additioanl info: ' . var_export($info));
        }

        curl_close($curl);

        return $curl_response;
    }

    /**
     * Check if string is a valid JSOn
     *
     * @param $string
     * @return bool
     */
    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}
