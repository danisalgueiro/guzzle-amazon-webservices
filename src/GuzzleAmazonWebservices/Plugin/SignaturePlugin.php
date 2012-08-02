<?php

namespace GuzzleAmazonWebservices\Plugin;

use GuzzleAmazonWebservices\Signature\AbstractSignature;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Guzzle\Common\Event;
use Guzzle\Http\Message\RequestInterface;

/**
 * Signature Guzzle Plugin
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
class SignaturePlugin implements EventSubscriberInterface
{
    /**
     * @var AbstractSignature
     */
    protected $signature;
    
    /**
     * @var string AWS API version
     */
    protected $apiVersion;
    
    /**
     * New request signin plugin constructor
     * 
     * @param AbstractSignature $signature Signature object used to sign requests
     * @param string $apiVersion AWS API version
     */
    public function __construct(AbstractSignature $signature, $apiVersion)
    {
        $this->signature = $signature;
        $this->apiVersion = $apiVersion;
    }
    
    /**
     * Get the signature object to sign requests
     * 
     * @return AbstractSignature
     */
    public function getSignature()
    {
        return $this->signature;
    }
    
    /**
     * Get the AWS API version
     * 
     * @return string
     */
    public function getApiVersion()
    {
        return $this->apiVersion;
    }
    
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            'request.before_send' => 'onBeforeSend'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function onBeforeSend(Event $event)
    {
        $request = $event['request'];
        
        $this->addRequiredQueryString($request);
        $this->addQueryStringSignature($request);
    }
    
    /**
     * Add required options to the query string of the request
     * 
     * @param RequestInterface $request Request which will be modified
     */
    protected function addRequiredQueryString(RequestInterface $request)
    {
        $qs = $request->getQuery();
        
        $qs->set('AWSAccessKeyId', $this->signature->getAccessKey());
        $qs->set('Service', 'AWSECommerceService');
        $qs->set('SignatureMethod', $this->signature->getHashAlgorithm());
        $qs->set('SignatureVersion', $this->signature->getVersion());
        $qs->set('Timestamp', gmdate('c'));
        $qs->set('Version', $this->apiVersion);
        
        return true;
    }
    
    /**
     * Add the request's signature
     * 
     * @param RequestInterface $request Request which will be modified
     */
    protected function addQueryStringSignature(RequestInterface $request)
    {
        $qs = $request->getQuery();

        $requestToSign = $this->signature->composeRequestToSign($qs->getAll(), array(
            'endpoint' => $request->getUrl(),
            'method' => $request->getMethod()
        ));

        $qs->set('Signature', $this->signature->signRequest($requestToSign));

        return true;
    }
}
