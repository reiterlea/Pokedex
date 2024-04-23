<?php


namespace App\Models\Resource;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class APIResource
{
    public string $url;
    private string $resourceClass;
    private Client $client;

    public function __construct($data, string $resourceClass)
    {
        $this->url = $data['url'];
        $this->client = new Client();
        $this->resourceClass = $resourceClass;
    }

    /**
     * @throws GuzzleException
     */
    public function getResource()
    {
        $response = $this->client->request('GET', $this->url);
        $data = json_decode($response->getBody()->getContents(), true);
        return new $this->resourceClass($data);
    }
}
