<?php declare(strict_types=1);

namespace hollodotme\Readis\Tests\Unit\Traits;

use hollodotme\Readis\Application\ReadModel\Interfaces\PrettifiesString;
use function base64_decode;
use function html_entity_decode;
use function strpos;

trait CustomPrettifierMocking
{
	protected function getRawPrettifierMock() : PrettifiesString
	{
		return new class implements PrettifiesString
		{
			public function canPrettify( string $data ) : bool
			{
				return false;
			}

			public function prettify( string $data ) : string
			{
				return $data;
			}
		};
	}

	protected function getCustomBase64Prettifier() : PrettifiesString
	{
		return new class implements PrettifiesString
		{
			public function canPrettify( string $data ) : bool
			{
				return (strpos( $data, 'base64:' ) === 0);
			}

			public function prettify( string $data ) : string
			{
				return base64_decode( substr( $data, 7 ) );
			}
		};
	}

	protected function getCustomHtmlEntityPrettifier() : PrettifiesString
	{
		return new class implements PrettifiesString
		{
			public function canPrettify( string $data ) : bool
			{
				return (strpos( $data, 'html:' ) === 0);
			}

			public function prettify( string $data ) : string
			{
				return html_entity_decode( substr( $data, 5 ) );
			}
		};
	}
}