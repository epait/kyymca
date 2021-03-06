<?php

/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */

/**
 * Provides unit tests for Bandar template engine
 *
 * PHP version 5
 *
 * LICENSE: Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the "Software"), to
 * deal in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies
 * of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all
 * copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS
 * FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR
 * COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER
 * IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
 * CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
 *
 * @category  Tests
 * @package   Bandar_Tests
 * @author    Yani Iliev <yani@iliev.me>
 * @copyright 2013 Yani Iliev
 * @license   https://raw.github.com/yani-/bandar/master/LICENSE The MIT License (MIT)
 * @version   GIT: 3.0.0
 * @link      https://github.com/yani-/bandar/
 */

/**
 * Unit test class
 *
 * @category  Tests
 * @package   Bandar_Tests
 * @author    Yani Iliev <yani@iliev.me>
 * @copyright 2013 Yani Iliev
 * @license   https://raw.github.com/yani-/bandar/master/LICENSE The MIT License (MIT)
 * @version   Release: 3.0.0
 * @link      https://github.com/yani-/bandar/
 */
class BandarTestMultipleSources extends PHPUnit_Framework_TestCase
{
    /**
     * [testGetTemplateContent description]
     *
     * @runInSeparateProcess
     *
     * @return void
     */
    public function testMutipleSources()
    {
        define(
            'BANDAR_TEMPLATES_PATH',
            dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates'
        );
        ob_start();
        Bandar::render(
            'users-2/list-2',
            array('name' => 'John Smith'),
            dirname(__FILE__) . DIRECTORY_SEPARATOR . 'templates-2'
        );
        $renderedContent = ob_get_clean();
        $this->assertEquals(
            '2. Hello John Smith',
            $renderedContent
        );

        ob_start();
        Bandar::render(
            'users/list',
            array('name' => 'John Smith')
        );
        $renderedContent = ob_get_clean();
        $this->assertEquals(
            '1. Hello John Smith',
            $renderedContent
        );
    }
}

