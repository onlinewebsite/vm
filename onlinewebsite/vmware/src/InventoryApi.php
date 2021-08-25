<?php

namespace Ammarloo\VMWare;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Exception\ServerException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Cookie\CookieJar;
use GuzzleHttp\Exception\ConnectException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

use Ammarloo\VMWare\Api;

// Add the API traits
use Ammarloo\VMWare\Endpoints\Inventory\Network;
use Ammarloo\VMWare\Endpoints\Inventory\Datastore;

class InventoryApi extends Api
{
    use Network, Datastore;

    const CONNECT_MODULE = 'com/vmware/vcenter/inventory';

    /**
     * Create an instance for the Vcenter API.
     * @param string $endpoint Your API endpoint, that should end on "/rest/".
     * @param integer $retries Number of retries for failed requests.
     * @param array $guzzleOptions Optional options to be passed to the Guzzle Client constructor.
     */
    public function __construct($endpoint = 'https://vcenter.local/rest/', $retries = 5, $guzzleOptions = [])
    {
	parent::__construct($endpoint, self::CONNECT_MODULE, $retries, $guzzleOptions);
    }


}
