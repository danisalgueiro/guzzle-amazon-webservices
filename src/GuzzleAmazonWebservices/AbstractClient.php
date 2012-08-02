<?php

namespace GuzzleAmazonWebservices;

use Guzzle\Service\Client;

/**
 * Abstract AWS Client
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
abstract class AbstractClient extends Client
{
    /**
     * @var string AWS access key ID
     */
    protected $accessKey;

    /**
     * @var string AWS secret key
     */
    protected $secretKey;
    
    /**
     * @var string AWS associate tag ID
     */
    protected $associateTag;

    /**
     * @var string AWS version
     */
    protected $version;
    
    /**
     * Abstract AWS client constructor
     * 
     * @param string $baseUrl AWS webservice URL
     * @param string $accessKey AWS access key ID
     * @param string $secretKey AWS secret access key
     * @param string $version (optional) AWS version
     */
    public function __construct($baseUrl, $accessKey, $secretKey, $associateTag = '', $version = null)
    {
        parent::__construct($baseUrl);
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
        $this->associateTag = $associateTag;
        $this->version = $version;
    }
    
    /**
     * Get the AWS access key ID
     * 
     * @return string
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * Get the AWS secret access key
     * 
     * @return string
     */
    public function getSecretKey()
    {
        return $this->secretKey;
    }
    
    /**
     * Get the AWS associate tag ID
     * 
     * @return string
     */
    public function getAssociateTag()
    {
        return $this->associateTag;
    }
}
