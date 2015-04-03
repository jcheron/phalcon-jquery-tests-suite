<?php

namespace Test;

use Phalcon\Test\UnitTestCase;
/**
 * Class UnitTest
 */
class UnitTest extends UnitTestCase {

    public function testTestCase() {

        $this->assertEquals('works',
            'works',
            'This is OK'
        );

        $this->assertEquals('works',
            'works1',
            'This will fail'
        );
    }
}