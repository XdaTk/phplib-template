<?php

/**
 * Class DemoTest
 *
 * @description 测试用例示范
 * @doc https://phpunit.de/manual/current/zh_cn/index.html
 */
class DemoTest extends \Base\Test\TestCase {

    public function setUp() {
        parent::setUp();
    }

    /**
     * @test
     * @dataProvider additionProvider
     */
    public function testAction($id, $name) {
        $params   = array(
            'id'   => $id,
            'name' => $name,
        );
        $response = $this->execRequest(\S\Http::METHOD_GET, 'api_demo', $params);

        $expect = $name;

        $this->assertEquals($expect, $response['data']);
    }

    public function additionProvider() {
        return array(
            array(3, 'xin'),
        );
    }

}