<?php

namespace Walnut\Lib\JsonSerializer;

use JsonException;

final class PhpJsonSerializer implements JsonSerializer {
	/**
	 * @param array|object|string|int|float|bool|null $value
	 * @return string
	 * @throws JsonSerializerException
	 */
	public function encode(array|object|string|int|float|bool|null $value): string {
		try {
			return json_encode($value, JSON_THROW_ON_ERROR | JSON_PRETTY_PRINT);
		} catch (JsonException) {
			throw new JsonSerializerException("Unable to encode JSON value");
		}
	}

	/**
	 * @param string $value
	 * @param bool $associative
	 * @return array|object|string|int|float|bool|null
	 * @throws JsonSerializerException
	 */
	public function decode(string $value, bool $associative): array|object|string|int|float|bool|null {
		try {
			return json_decode($value, $associative, flags:JSON_THROW_ON_ERROR);
		} catch (JsonException) {
			throw new JsonSerializerException("Unable to decode JSON value");
		}
	}
}
