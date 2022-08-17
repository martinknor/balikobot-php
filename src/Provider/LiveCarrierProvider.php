<?php

declare(strict_types=1);

namespace Inspirum\Balikobot\Provider;

use Inspirum\Balikobot\Model\Carrier\Carrier;
use Inspirum\Balikobot\Service\SettingService;
use function array_map;

final class LiveCarrierProvider implements CarrierProvider
{
    public function __construct(
        private SettingService $settingService,
    ) {
    }

    /** @inheritDoc */
    public function getCarriers(): array
    {
        return array_map(static fn(Carrier $carrier): string => $carrier->getCode(), $this->settingService->getCarriers()->getCarriers());
    }
}
