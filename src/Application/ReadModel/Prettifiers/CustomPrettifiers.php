<?php declare(strict_types=1);

namespace hollodotme\Readis\Application\ReadModel\Prettifiers;

use hollodotme\Readis\Application\ReadModel\Interfaces\PrettifiesString;
use function count;

final class CustomPrettifiers implements PrettifiesString
{
	/** @var array|PrettifiesString[] */
	private $prettifiers = [];

	public function addPrettifiers( ...$prettifiers ) : void
	{
		foreach ( $prettifiers as $prettifier )
		{
			$this->prettifiers[] = $prettifier;
		}
	}

	public function canPrettify( string $data ) : bool
	{
		return count( $this->prettifiers ) > 0;
	}

	public function prettify( string $data ) : string
	{
		foreach ( $this->prettifiers as $prettifier )
		{
			if ( $prettifier->canPrettify( $data ) )
			{
				return $prettifier->prettify( $data );
			}
		}

		return $data;
	}
}
