<?php

use PHPUnit\Framework\TestCase;
use Walnut\Lib\JsonSerializer\JsonSerializerException;
use Walnut\Lib\JsonSerializer\PhpJsonSerializer;

final class PhpJsonSerializerTest extends TestCase {

	public function testSerializeOk(): void {
		$this->assertEquals('"TEST"', $this->getJsonSerializer()->encode("TEST"));
	}

	public function testUnserializeObjectOk(): void {
		$this->assertEquals((object)['a' => 1], $this->getJsonSerializer()->decode('{"a":1}', false));
	}

	public function testUnserializeArrayOk(): void {
		$this->assertEquals(['a' => 1], $this->getJsonSerializer()->decode('{"a":1}', true));
	}

	public function testSerializeError(): void {
		$this->expectException(JsonSerializerException::class);
		$arr = [];
		$arr[0] = &$arr;
		$this->getJsonSerializer()->encode($arr);
	}

	public function testUnserializeError(): void {
		$this->expectException(JsonSerializerException::class);
		$this->getJsonSerializer()->decode('{"a":1', false);
	}

	private function getJsonSerializer(): PhpJsonSerializer {
		return new PhpJsonSerializer;
	}
}