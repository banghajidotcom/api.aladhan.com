<?php
namespace AlAdhanApi\Helper;

use Symfony\Component\Yaml\Yaml;

/**
 * Class Config
 * @package Helper\Config
 */
class Config
{
    /**
     * The Parsyed Yaml config file
     * @var Object
     */
    private $config;

    /**
     * [__construct description]
     */
    public function __construct()
    {
        //$configFilePath = realpath(__DIR__ . '/../../../config/') . '/config.yml';

        $this->config = [
            'connections' => [
                'database' => [
                    'host' => getenv('MYSQL_HOST'),
                    'username' => getenv('MYSQL_USER'),
                    'password' => getenv('MYSQL_PASSWORD'),
                    'db' => getenv('MYSQL_DATABASE'),
                    'port' => 3306
                ],
                'database_slave' => [
                    'host' => getenv('MYSQL_SLAVE_HOST'),
                    'username' => getenv('MYSQL_SLAVE_USER'),
                    'password' => getenv('MYSQL_SLAVE_PASSWORD'),
                    'db' => getenv('MYSQL_SLAVE_DATABASE'),
                    'port' => 3306
                ],
                'memcache' => [
                    'host' => getenv('MEMCACHED_HOST'),
                    'port' => getenv('MEMCACHED_PORT')
                ]
            ],
            'apikeys' => [
                'google_geocoding' => getenv('GOOGLE_API_KEY'),
                'askgeo' => [
                    'accountid' => getenv('ASKGEO_ACCOUNT_ID'),
                    'key' => getenv('ASKGEO_API_KEY')
                ]
            ]
        ];

        //$this->config = Yaml::parse(file_get_contents($configFilePath));
    }

    /**
     * Gets a specific connection type, for example database or memcached
     * @param  String $id Defined in the config.yml file
     * @return Object
     */
    public function connection($id = 'database')
    {
        return (object) $this->config['connections'][$id];
    }

    /**
     * Returns a particular Api key in the Yaml file
     * @param  String $id
     * @return Mixed (most likely string)
     */
    public function apiKey($id)
    {
        return $this->config['apikeys'][$id];
    }
    
    /**
     * Returns the entire config array
     * @return Array The entire config array
     */
    public function getConfig()
    {
        return $this->config;
    }


}
