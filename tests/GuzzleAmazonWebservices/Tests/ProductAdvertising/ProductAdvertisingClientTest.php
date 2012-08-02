<?php

namespace GuzzleAmazonWebservices\Tests\ProductAdvertising;

use Guzzle\Tests\GuzzleTestCase;
use GuzzleAmazonWebservices\ProductAdvertising\ProductAdvertisingClient;

class ProductAdvertisingClientTest extends GuzzleTestCase
{
    public function testBuilderCreatesClient()
    {
        $client = ProductAdvertisingClient::factory(array(
            'access_key' => '1234',
            'secret_key' => '9876',
            'associate_tag' => 'test'
        ));
        
        $this->assertInstanceOf('\GuzzleAmazonWebservices\ProductAdvertising\ProductAdvertisingClient', $client);
        $this->assertEquals('1234', $client->getAccessKey());
        $this->assertEquals('9876', $client->getSecretKey());
        $this->assertEquals('test', $client->getAssociateTag());
    }
    
    public function testBuilderThrowExceptionWithoutRequiredConfigParameters()
    {
        $this->setExpectedException(
            '\Guzzle\Service\Exception\ValidationException',
            'Config must contain a \'access_key\' key'
        );
        
        $client = ProductAdvertisingClient::factory(array(
            'secret_key' => '9876'
        ));
    }
    
    public function testAll()
    {
        $client = ProductAdvertisingClient::factory(array(
            'access_key' => 'AKIAJ75M4ZDNYIT33TBQ',
            'secret_key' => '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',
            'associate_tag' => ''
        ));
        
        $command = $client->getCommand('ItemSearch');
        $command->setTitle('harry potter');
        $command->setSearchIndex('Books');
        $command->setResponseGroup('Small');
        
        $result = $client->execute($command);
        print_r($result);
    }
}
