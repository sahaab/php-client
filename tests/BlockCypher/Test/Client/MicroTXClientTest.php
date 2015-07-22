<?php

namespace BlockCypher\Test\Client;

use BlockCypher\Client\MicroTXClient;
use BlockCypher\Test\Api\MicroTXTest;

/**
 * Class MicroTXClientTest
 *
 * @package BlockCypher\Test\Client
 */
class MicroTXClientTest extends ClientTestCase
{
    public function testCreate()
    {
//        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
//            ->disableOriginalConstructor()
//            ->getMock();
//
//        $mockBlockCypherRestCall->expects($this->any())
//            ->method('execute')
//            ->will($this->returnValue(
//                MicroTXTest::getJson()
//            ));
//
//        $result = $obj->create($mockApiContext, $mockBlockCypherRestCall);
//        $this->assertNotNull($result);

        $obj = static::getObject();

        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->any())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/v1/bcy/test"));

        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                MicroTXTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        $result = $obj->create(
            MicroTXTest::getObject(),
            $mockApiContext,
            $mockBlockCypherRestCall
        );

        $this->assertNotNull($result);
        $this->assertInstanceOf('\BlockCypher\Api\MicroTX', $result);
    }

    /**
     * @return MicroTXClient
     */
    public static function getObject()
    {
        return new MicroTXClient();
    }

    public function testSend()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->any())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/v1/bcy/test"));

        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                MicroTXTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        $result = $obj->send(
            MicroTXTest::getObject(),
            $mockApiContext,
            $mockBlockCypherRestCall
        );

        $this->assertNotNull($result);
        $this->assertInstanceOf('\BlockCypher\Api\MicroTX', $result);
    }

    public function testFromPubkey()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->any())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/v1/bcy/test"));

        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                MicroTXTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        $result = $obj->sendSigned(
            "2c2cc015519b79782bd9c5af66f442e808f573714e3c4dc6df7d79c183963cff",
            "C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi",
            10000,
            $mockApiContext,
            $mockBlockCypherRestCall
        );

        $this->assertNotNull($result);
    }

    public function testFromPrivate()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->any())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/v1/bcy/test"));

        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                MicroTXTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        $result = $obj->sendWithPrivateKey(
            "2c2cc015519b79782bd9c5af66f442e808f573714e3c4dc6df7d79c183963cff",
            "C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi",
            10000,
            $mockApiContext,
            $mockBlockCypherRestCall
        );

        $this->assertNotNull($result);
    }

    public function testFromWif()
    {
        $obj = static::getObject();

        $mockApiContext = $this->getMockBuilder('\BlockCypher\Rest\ApiContext')
            ->disableOriginalConstructor()
            ->setMethods(array('getBaseChainUrl'))
            ->getMock();

        $mockApiContext->expects($this->any())
            ->method('getBaseChainUrl')
            ->will($this->returnValue("/v1/bcy/test"));

        $mockBlockCypherRestCall = $this->getMockBuilder('\BlockCypher\Transport\BlockCypherRestCall')
            ->disableOriginalConstructor()
            ->getMock();

        $mockBlockCypherRestCall->expects($this->any())
            ->method('execute')
            ->will($this->returnValue(
                MicroTXTest::getJson()
            ));

        /** @noinspection PhpParamsInspection */
        /** @noinspection SpellCheckingInspection */
        $result = $obj->sendWithWif(
            "BpouCdZ5dXbjcUDQBj8ZVYBbSPtWYDQHxuDcP48VA6Q7dZuqW4UJ",
            "C4MYFr4EAdqEeUKxTnPUF3d3whWcPMz1Fi",
            10000,
            $mockApiContext,
            $mockBlockCypherRestCall
        );

        $this->assertNotNull($result);
    }
}