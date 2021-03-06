<?php declare(strict_types=1);

namespace hollodotme\Readis\Application\ReadModel\Interfaces;

interface ProvidesKeyName
{
	public function getKeyName() : string;

	public function hasSubKey() : bool;

	public function getSubKey() : ?string;
}