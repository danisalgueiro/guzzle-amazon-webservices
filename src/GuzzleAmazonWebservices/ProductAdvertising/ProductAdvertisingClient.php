<?php

namespace GuzzleAmazonWebservices\ProductAdvertising;

use GuzzleAmazonWebservices\AbstractClient;
use GuzzleAmazonWebservices\Signature\SignatureV2;
use GuzzleAmazonWebservices\Plugin\SignaturePlugin;
use Guzzle\Service\Inspector;

/**
 * Amazon Product Advertising Client
 *
 * @author Dani Salgueiro <dani@danisalgueiro.com>
 */
class ProductAdvertisingClient extends AbstractClient
{
    /**
     * AWS version
     */
    const VERSION = '2011-08-01';
    
    /**
     * AWS Locale for Canada
     */
    const LOCALE_CA = 'webservices.amazon.ca';
    
    /**
     * AWS Locale for China
     */
    const LOCALE_CN = 'webservices.amazon.cn';
    
    /**
     * AWS Locale for Germany
     */
    const LOCALE_DE = 'webservices.amazon.de';
    
    /**
     * AWS Locale for Spain
     */
    const LOCALE_ES = 'webservices.amazon.es';
    
    /**
     * AWS Locale for France
     */
    const LOCALE_FR = 'webservices.amazon.fr';
    
    /**
     * AWS Locale for Italy
     */
    const LOCALE_IT = 'webservices.amazon.it';
    
    /**
     * AWS Locale for Japan
     */
    const LOCALE_JP = 'webservices.amazon.jp';
    
    /**
     * AWS Locale for United Kingdom
     */
    const LOCALE_UK = 'webservices.amazon.co.uk';
    
    /**
     * AWS Locale for USA
     */
    const LOCALE_US = 'webservices.amazon.com';
    
    /**
     * Create an instance of the client
     * 
     * @param array $config
     * 
     * @return \GuzzleAmazonWebservices\ProductAdvertising
     */
    public static function factory($config = array())
    {
        $defaults = array(
            'base_url' => '{{scheme}}://{{locale}}/onca/xml',
            'scheme' => 'http',
            'locale' => self::LOCALE_US,
            'version' => self::VERSION
        );
        $required = array('access_key', 'secret_key', 'associate_tag');
        $config = Inspector::prepareConfig($config, $defaults, $required);

        $signature = new SignatureV2($config->get('access_key'), $config->get('secret_key'));
        $client = new self($config->get('base_url'), $config->get('access_key'), $config->get('secret_key'), $config->get('associate_tag'), $config->get('version'));
        $client->setConfig($config);
        
        $client->addSubscriber(
            new SignaturePlugin($signature, $config->get('version'))
        );

        return $client;
    }
}
