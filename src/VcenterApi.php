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
use Ammarloo\VMWare\Endpoints\Vcenter\VM;
use Ammarloo\VMWare\Endpoints\Vcenter\Network;
use Ammarloo\VMWare\Endpoints\Vcenter\Datacenter;
use Ammarloo\VMWare\Endpoints\Vcenter\Cluster;
use Ammarloo\VMWare\Endpoints\Vcenter\Datastore;
use Ammarloo\VMWare\Endpoints\Vcenter\Deployment;
use Ammarloo\VMWare\Endpoints\Vcenter\Folder;
use Ammarloo\VMWare\Endpoints\Vcenter\Guest;
use Ammarloo\VMWare\Endpoints\Vcenter\Host;
use Ammarloo\VMWare\Endpoints\Vcenter\Resourcepool;

class VcenterApi extends Api
{
    use VM, Network, Datacenter, Cluster, Datastore, Deployment, Folder, Guest, Host, Resourcepool;

    const CONNECT_MODULE = 'vcenter';

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
