<?php

/**
 * PHPUnit all assert method 
 */
class AssertMethodCollector extends PHPUnit_Framework_TestCase
{
    /**
     * assertArrayHasKey(mixed $key, array $array[, string $message = ''])
     * 当$array 不包含 $key 时报告错误，错误讯息由 $message 指定
     * assertArrayNotHasKey() 相反断言，接收相同参数
     */ 
    public function testAssertArrayHasKey()
    {
        $this->assertArrayHasKey('foo', ['bar' => 'baz']);
    }
    
    /**
     * assertClassHasAttribute(string $attributeName, string $className[, string $message = ''])
     * 相反断言： assertClassNotHasAttribute()
     */
    public function testAssertClassHasAttribute() 
    {
        $this->assertClassHasAttribute('foo', stdClass::class);
    }
    
    /**
     * assertArraySubset(array $subset, array $array[, bool $strict = '', string $message = ''])
     * 当 $array 不包含 $subset 时报告错误，错误讯息有 $message 指定
     * $strict 是否对数组中的对象进行全等判定
     */
    public function testAssertArraySubset() 
    {
        $this->assertArraySubset(['config' => ['key-a', 'key-b']], ['config' => ['key-a', 'key-b']]);
    }
    
    /**
     * assertClassHasStaticAttribute(string $attributeName, string $className[, string $message = ''])
     * 相反断言： assertClassNotHasStaticAttribute()
     */
    public function testAssertClassHasStaticAttribute() 
    {
        $this->assertClassHasStaticAttribute('foo', stdClass::class);
    }
    
    /**
     * assertContains(mixed $needle, Iterator|array $haystack[, string $message = '', boolean $ignoreCase = false])
     * 当$needle 不是 $haystack 的元素时报告错误, 错误讯息有 $message 指定
     * 相反断言： assertNotContains()
     * 
     * assertAttributeContains() || assertAttributeNotContains 以某个类或对象的属性为搜索范围
     */
    public function testAssertContains() 
    {
        $this->assertContains(4, [1, 2, 3]);
    }
    
    /**
     * assertContainsOnly(string $type, Iterator|array $haystack[, boolean $isNativeType = null, string $message = ''])
     * 当 $haystack并非仅包含类型为$type的变量时报告错误， 错误讯息有$message指定
     * $isNativeType 是一个标志，用来表明$type是否是原生PHP类型
     * 相反断言： assertNotContainsOnly()
     * assertAttributeContainsOnly() || assertAttributeNotContainsOnly()
     */
    public function testAssertContainsOnly() 
    {
        $this->assertContainsOnly('string', ['1', '2', 3]);
    }
    
    /**
     * assertContainsOnlyInstanceOf(string $classname, Traversable|array $haystack[, string $message = ''])
     * 当 $haystack 并非仅包含类 $classname 的实例时报告错误
     */
    public function testAssertContainsOnlyInstancesOf() 
    {
        $this->assertContainsOnlyInstancesof(Foo::class, [new Foo, new Bar, new Foo]);
    }
    
    /**
     * assertCount($expectedCount, $haystack[, string $message = ''])
     * 当 $haystack 中的元素数量不是 $expectedCount 时报告错误
     * 相反断言： assertNotCount()
     */
    public function testAssertCount() 
    {
        $this->assertCount(0, ['foo']);
    }
    
    /**
     * assertEmpty(mixed $actual[, string $message = ''])
     * 当 $actual 非空时报告错误
     * 相反断言：assertNotEmpty()
     * assertAttributeEmpty() || assertAttributeNotEmpty()
     */
    public function testAssertEmpty() 
    {
        $this->assertEmpty(['foo']);
    }
    
    /**
     * assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement[, boolean $checkAttributes = false, string $message = ''])
     * 当 $actualElement 中DOMElement 的XML结构与 $expectedElement中的DOMElement的XML结构不相同时报告错误
     */
    public function testAssertEqualXMLStructure() 
    {
        $expected_1 = new DOMElement('foo');
        $actual_1 = new DOMElement('bar');
        $this->assertEqualXMLStructure($expected_1, $actual_1);
        
        $expected_2 = new DOMElement;
        $expected_2->loadXML('<foo bar="true" />');
        $actual_2 = new DOMElement;
        $actual_2->loadXML('<foo/>');
        $this->assertEqualXMLStructure($expected_2->firstChild, $actual_2->firstChild, true);
        
        $expected_3 = new DOMElement;
        $expected_3->loadXML('<foo><bar/><bar/><bar/></foo>');
        $actual_3 = new DOMElement;
        $actual_3->loadXML('<foo><bar/></foo>');
        $this->assertEqualXMLStructure($expected_3->firstChild, $actual_3->firstChild);
        
        $expected_4 = new DOMElement;
        $expected_4->loadXML('<foo><bar/><bar/><bar/></foo>');
        $actual_4 = new DOMElement;
        $actual_4->loadXML('<foo><baz/><baz/><baz/></foo>');
        $this->assertEqualXMLStructure($expected_4->firstChild, $actual_4->firstChild);
    }
    
    /**
     * assertEquals(mixed $expected, mixed $actual[, string $message = ''])
     * 相反断言： assertNotEquals()
     * assertAttributeEquals() || assertAttributeNotEquals()
     */
    public function testAssertEquals() 
    {
        $this->assertEquals(1, 0);
        
        /**
         * assertEquals(float $expected, float $actual[, string $message = '', float $delta = 0])
         * 当两个浮点数之间的差值（绝对值）大于$delta报告错误
         */
        $this->assertEquals(1.0, 1.1, '', 0.2);
        
        /**
         * 两个DOMDocument 对象所表示的XML文档对应的无注释规范形式不相同时报告错误
         */
        $expected_doc = new DOMDocument;
        $expected_doc->loadXML('<foo><bar/></foo>');
        $actual_doc = new DOMDocument;
        $actual_doc->loadXML('<bar><foo/></bar>');
        $this->assertEquals($expected_doc, $actual_doc);
        
        /**
         * 当两个对象的属性值不相等时报告错误
         */
        $expected_class = new stdClass;
        $expected_class->foo = 'foo';
        $expected_class->bar = 'bar';
        $actual_class = new stdClass;
        $actual_class->foo = 'bar';
        $actual_class->baz = 'bar';
        $this->assertEquals($expected_class, $actual_class);
        
        /**
         * 当两个数组不相等时报告错误
         */
        $this->assertEquals(['a', 'b', 'c'], ['a', 'c', 'd']);
    }
    
    /**
     * assertFalse(bool $condition[, string $message = ''])
     * 相反断言：assertNotFalse()
     */
    public function testAssertFalse() 
    {
        $this->assertFalse(true);
    }
    
    /**
     * assertFileEquals(string $expected, string $actual[, string $message = ''])
     * 当指定文件内容不同时报告错误
     * 相反断言:assertFileNotEquals()
     */
    public function testAssertFileEquals() 
    {
        $this->assertFileEquals('/home/sb/expected', '/home/sb/actual');
    }
    
    /**
     * assertFileExists(string $filename[, string $message = ''])
     * 当指定文件不存在时报告错误
     * 相反断言：assertFileNotExists()
     */
    public function testAssertFileExists() 
    {
        $this->assertFileExists('/path/to/file');
    }
    
    /**
     * assertGreaterThan(mixed $expected, mixed $actual[, string = $message = ''])
     * 当$actual的值不大于$expected的值时报告错误
     * assertAttributeGreaterThan()
     */
    public function testAssertGreaterThan() 
    {
        $this->assertGreaterThan(2, 1);
    }
    
    /**
     * assertGreaterThanOrEqual(mixed $expected, mixed $actual[, string $message = ''])
     * 当 $actual 的值不大于且不等于$expected 的值时报告错误
     * assertAttributeGreaterThanOrEqual()
     */
    public function testAssertGreaterThanOrEqual() 
    {
        $this->assertGreaterThanOrEqual(2, 1);
    }
    
    /**
     * assertInfinite(mixed $variable[, string $message = ''])
     * 当 $actual 不是 INF时报告错误
     * 相反断言：assertFinite()
     */
    public function testAssertInfinite() 
    {
        $this->assertInfinite(1);
    }
    
    /**
     * assertInstanceOf($expected, $actual[, string $message = ''])
     * 当$actual不是$expected的实例时报告错误
     * 相反断言：assertNotInstanceOf()
     * assertAttributeInstanceOf() || assertAttributeNotInstanceOf()
     */
    public function testAssertInstanceOf() 
    {
        $this->assertInstanceOf(RuntimeException::class, new Exception);
    }
    
    /**
     * assertInternalType($expected, $actual[, $message = ''])
     * 当 $actual 不是 $expected 所指明的类型时报告错误
     * 相反断言：assertNotInternalType()
     * assertAttributeInternalType() || assertAttributeNotInternalType()
     */
    public function testAssertInternalType() 
    {
        $this->assertInternalType('string', 42);
    }
    
    /**
     * assertJsonFileEqualsJsonFile(mixed $expectedFile, mixed $actualFile[, string $message = ''])
     * 当 $actualFile 对应的值与 $expectedFile 对应的值不匹配时报告错误
     */
    public function testAssertJsonFileEqualsJsonFile() 
    {
        $this->assertJsonFileEqualsJsonFile('path/to/fixture/file', 'path/to/actual/file');
    }
    
    /**
     * assertJsonStringEqualsJsonFile(mixed $expectedFile, mixed $actualJson[, string $message = ''])
     * 当 $actualJson 对应的值与$expectedFile对应的值不匹配时报告错误
     */
    public function testAssertJsonStringEqualsJsonFile() 
    {
        $this->assertJsonStringEqualsJsonFile('path/to/fixture/file', json_encode(['key' => 'value']));
    }
    
    /**
     * assertJsonStringEqualsJsonString(mixed $expectedJson, mixed $actualJson[, string $message = ''])
     * 当 $actualJson 对应的值与 $expectedJson对应的值不匹配时报告错误
     */
    public function testAssertJsonStringEqualsJsonString() 
    {
        $this->assertJsonStringEqualsJsonString(
            json_encode(['key' => 'value']),
            json_encode(['key' => 'value1'])
        );
    }
    
    /**
     * assertLessThan(mixed $expected, mixed $actual[, string $message = ''])
     * 当$actual 的值不小于$expected的值时报告错误
     * assertAttributeLessThan()
     */
    public function testAssertLessThan() 
    {
        $this->assertLessThan(1, 2);
    }
    
    /**
     * assertLessThanOrEqual(mixed $expected, mixed $actual[, string $message = ''])
     * 当$actual的值不小于且不等于$expected的值时报告错误
     * assertAttributeLessThanOrEqual()
     */
    public function testAssertLessThanOrEqual() 
    {
        $this->assertLessThanOrEqual(1, 2);
    }
    
    /**
     * assertNan(mixed $variable[, string $message = ''])
     * 当$variable不是NAN时报告错误
     */
    public function testAssertNan() 
    {
        $this->assertNan(1);
    }
    
    /**
     * assertNull(mixed $variable[, string $message = ''])
     * 当$actual 不是null 时报告错误
     * 相反断言：assertNotNull()
     */
    public function testAssertNull() 
    {
        $this->assertNull('foo');
    }
    
    /**
     * assertObjectHasAttribute(string $attributeName, object $object[, string $message = ''])
     * 当$object->attributeName 不存在时报告错误
     * 相反断言：assertObjectNotHasAttribute()
     */
    public function testAssertObjectHasAttribute() 
    {
        $this->assertObjectHasAttribute('foo', new stdClass);
    }
    
    /**
     * assertRegExp(string $pattern, string $string[, string $message = ''])
     * 当$string 不匹配正则表达式$pattern时报告错误
     * 相反断言：assertNotRegExp()
     */
    public function testAssertRegExp() 
    {
        $this->assertRegExp('/foo/', 'bar');
    }
    
    /**
     * assertStringMatchesFormat(string $format, string $string[, string $message = ''])
     * 当$string 不匹配$format定义的格式是报告错误
     * %e: 目录分隔符
     * %s: 一个或多个除了换行符以外的任意字符(非空白或空白字符)
     * %S: 零个或多个除了换行符以外的任意字符(非空白或空白字符)
     * %a: 一个或多个包括换行符在内的任意字符(非空白或空白字符)
     * %A: 零个或多个包括换行符在内的任意字符(非空白或空白字符)
     * %w: 零个或多个空白字符
     * %i: 带符号整数值, 例如+3142、 -3142
     * %d: 无符号整数值
     * %x: 一个或多个十六进制字符[0-9a-fA-F]
     * %f: 浮点数
     * %c: 单个任意字符
     * 相反断言：assertStringNotMatchesFormat()
     */
    public function testAssertStringMatchesFormat() 
    {
        $this->assertStringMatchesFormat('%i', 'foo');
    }
    
    /**
     * assertStringMatchesFormatFile(string $formatFile, string $string[, string $message = ''])
     * 当$string 不匹配 $formatFile 的内容所定义的格式时报告错误
     * 相反断言：assertStringNotMatchesFormatFile()
     */
    public function testAssertStringMatchesFormatFile() 
    {
        $this->assertStringMatchesFormatFile('/path/to/expected.txt', 'foo');
    }
    
    /**
     * assertSame(mixed $expected, mixed $actual[, string $message = ''])
     * 当两个变量 $expected 和 $actual 的值与类型不完全相等时报告错误
     * 当两个变量不是指向同一个对象的引用时报告错误
     * 相反断言： assertNotSame()
     * assertAttributeSame() || assertAttributeNotSame()
     */
    public function testAssertSame() 
    {
        $this->assertSame('2204', 2204);
    }
    
    /**
     * assertStringEndsWith(string $suffix, string $string[, string $message = ''])
     * 当$string不以$suffix结尾时报告错误
     * 相反断言：assertStringEndsNotWith()
     */
    public function testAssertStringEndsWith() 
    {
        $this->assertStringEndsWith('suffix', 'foo');
    }
    
    /**
     * assertStringEqualsFile(string $expectedFile, string $actualString[, string $message = ''])
     * 当$expectedFile 所指定的文件其内容不是$actualString时报告错误
     * 相反断言： assertStringNotEqualsFile()
     */
    public function testAssertStringEqualsFile() 
    {
        $this->assertStringEqualsFile('/home/sb/expected', 'actual');
    }
    
    /**
     * assertStringStartsWith(string $prefix, string $string[, string $message = ''])
     * 当 $string 不以 $prefix 开头时报告错误
     * 相反断言： assertStringStartsNotWith()
     */
    public function testAssertStringStartsWith() 
    {
        $this->assertStringStartsWith('prefix', 'foo');
    }
    
    /**
     * assertThat(mixed $value, PHPUnit_Framework_Constraint $constraint[, $message = ''])
     * 当value 不符合约束条件$contstraint时报告错误
     */
    public function testAssertThat() 
    {
        $theBiscuit = new Biscuit('Ginger');
        $myBiscuit = new  Biscuit('Ginger');
        $this->assertThat(
            $theBiscuit,
            $this->logicalNot($this->equalTo($myBiscuit))
        );
    }
    
    /**
     * assertTrue(bool $condition[, string $message = ''])
     * 当 $condition 为false时报告错误
     * 相反断言：assertNotTrue()
     */
    public function testAssertTrue() 
    {
        $this->assertTrue(true);
    }
    
    /**
     * assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile[, string $message = ''])
     * 当$actualFile对应的XML文档与$expectedFile对应的不同时报告错误
     * 相反断言:assertXmlFileNotEqualsXmlFile()
     */
    public function testAssertXmlFileEqualsXmlFile() 
    {
        $this->assertXmlFileEqualsXmlFile('/home/sb/expected.xml', '/home/sb/actual.xml');
    }
    
    /**
     * assertXmlStringEqualsXmlFile(string $expectedFile, string $actualXml[, string $message = ''])
     * 当$actualXml对应的文档与$expectedFile不同时报告错误
     * 相反断言：assertXmlStringNotEqualsXmlFile()
     */
    public function testAssertXmlStringEqualsXmlFile() 
    {
        $this->assertXmlStringEqualsXmlFile('/home/sb/expected.xml', '<foo><baz/></foo>');
    }
    
    /**
     * assertXmlStringEqualsXmlString(string $expectedXml, string $actualXml[, string $message = ''])
     * 当$actualXml对应的XML文档与$expectedXml对应的文档不同时报告错误
     * 相反断言: assertXmlStringNotEqualsXmlString()
     */
    public function testAssertXmlStringEqualsXmlString() 
    {
        $this->assertXmlStringEqualsXmlString('<foo><bar/></foo>', '<foo><baz></foo>');
    }
}