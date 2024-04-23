<?php


namespace App\Models\Resource;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class NamedAPIResource
{
    public string $name;
    public string $url;
    private Client $client;
    private string $resourceClass;

    public function __construct($data, string $resourceClass)
    {
        $this->name = $data['name'];
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
