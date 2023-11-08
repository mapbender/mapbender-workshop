<?php declare(strict_types=1);

namespace Workshop\DemoBundle;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class IsInternalCallExtension extends AbstractExtension
{
    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('is_called_from_internal_network', [$this, 'isInternal']),
            new TwigFunction('get_host_address', [$this, 'getHostaddress']),
        ];
    }

    public function isInternal(): bool
    {
        return !(!getenv('MB_EXPOSE_DEV') && (isset($_SERVER['HTTP_CLIENT_IP'])
                || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
                || !in_array(@$_SERVER['REMOTE_ADDR'], array('127.0.0.1', 'fe80::1', '::1'))
            ));
    }

    public function getHostaddress()
    {
        return $_SERVER['HTTP_HOST'];
    }
}
