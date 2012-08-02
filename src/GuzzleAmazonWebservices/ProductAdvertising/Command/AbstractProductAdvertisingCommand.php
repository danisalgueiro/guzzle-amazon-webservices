<?php

namespace GuzzleAmazonWebservices\ProductAdvertising\Command;

use Guzzle\Service\Command\AbstractCommand;
use Guzzle\Http\Message\RequestInterface;

/**
 * AWS Abstract Command
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
abstract class AbstractProductAdvertisingCommand extends AbstractCommand
{
    /**
     * @var string AWS operation name
     */
    protected $operation;
    
    /**
     * @var string HTTP method
     */
    protected $requestMethod = RequestInterface::GET;
    
    /**
     * {@inheritdoc}
     */
    protected function build()
    {
        if (!$this->operation) {
            throw new \GuzzleAmazonWebservices\GuzzleAmazonWebservicesException('You must define an operation name');
        }
        
        if (!$this->request) {
            $this->request = $this->client->createRequest($this->requestMethod);
        }
        
        $config = $this->getClient()->getConfig();
        $query = $this->request->getQuery();
        
        $query->set('Operation', $this->operation)
            ->set('AWSAccessKeyId', $config->get('access_key'))
            ->set('AssociateTag', $config->get('associate_tag'));
        
        foreach($this->data as $param => $value) {
            if ($param == 'headers') {
                continue;
            }
            
            if (is_bool($value)) {
                $query->set($param, $value ? 'True' : 'False');
            } else if (is_array($value)) {
                $query->set($param, implode(',', $value));
            } else {
                $query->set($param, $value);
            }
        }
    }
}