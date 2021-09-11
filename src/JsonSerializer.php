<?php

namespace Walnut\Lib\JsonSerializer;

interface JsonSerializer {
	/**
	 * @param array|object|string|int|float|bool|null $value
	 * @return string
	 * @throws JsonSerializerException
	 */
	public function encode(array|object|string|int|float|bool|null $value): string;

	/**
	 * @param string $value
	 * @param bool $associative
	 * @return array|object|string|int|float|bool|null
	 * @throws JsonSerializerException
	 */
	public function decode(string $value, bool $associative): array|object|string|int|float|bool|null;
}
