<?php

namespace GuzzleAmazonWebservices\Signature;

use GuzzleAmazonWebservices\GuzzleAmazonWebservicesException;

/**
 * Abstract AWS Signature
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
abstract class AbstractSignature
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
     * @var string PHP algorithm to use
     */
    protected $phpAlgorithm;
    
    /**
     * @var string AWS hashing algorithm
     */
    protected $hashAlgorithm;
    
    /**
     * @var string AWS signature version
     */
    protected $version;
    
    /**
     * Abstract AWS signature constructor
     * 
     * @param string $accessKey AWS access key ID
     * @param string $secretKey AWS secret key
     * 
     * @throws GuzzleAmazonWebservicesException If access key or secret key are not passed
     */
    public function __construct($accessKey, $secretKey)
    {
        if (!$accessKey) {
            throw new GuzzleAmazonWebservicesException('You should provide an AWS access key ID to '. __METHOD__);
        }
        
        if (!$secretKey) {
            throw new GuzzleAmazonWebservicesException('You should provide an AWS secret key to '. __METHOD__);
        }
        
        $this->accessKey = $accessKey;
        $this->secretKey = $secretKey;
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
     * Get the PHP algorithm name
     * 
     * @return string
     */
    public function getPhpAlgorithm()
    {
        return $this->phpAlgorithm;
    }

    /**
     * Get the AWS hashing algorithm name
     * 
     * @return string
     */
    public function getHashAlgorithm()
    {
        return $this->hashAlgorithm;
    }
    
    /**
     * Get the AWS signature version
     * 
     * @return string
     */
    public function getVersion()
    {
        return $this->version;
    }
    
    /**
     * Sign the request using the AWS secret key
     * 
     * @param string $request The request to sign
     * 
     * @return string Signed request
     */
    public function signRequest($request)
    {
        return base64_encode(hash_hmac($this->phpAlgorithm, $request, $this->secretKey, true));
    }
    
    /**
     * Create a string to be signed based in the request and his options
     * 
     * @param array $request Associative array of request parameters
     * @param array $options Array of options
     * 
     * @return string The request to sign
     */
    abstract public function composeRequestToSign(array $request, array $options = null);
}
