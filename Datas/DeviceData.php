<?php

/**
 * ---.
 */

declare(strict_types=1);

namespace Modules\User\Datas;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Modules\Egea\Models\Synchronization;
use Spatie\LaravelData\Data;

/**
 * Undocumented class.
 */
class DeviceData extends Data
{
    /*
    case ApplicationVersion = 'X-App-Version';
    case Application = 'X-Application';
    case DeviceId = 'X-Device-Id';
    case NotificationCode = 'X-Notification-Code';
    case OperatingSystem = 'X-Operating-System';
    case SynchronizationId = 'X-Synchronization-Identifier';
    */
    public ?string $appVersion = null;

    // = 'X-App-Version';
    public ?string $application = null;

    // = 'X-Application';
    public ?string $deviceId = null;

    // = 'X-Device-Id';
    public ?string $notificationCode = null;

    // = 'X-Notification-Code';
    public ?string $operatingSystem = null;

    // = 'X-Operating-System';
    public ?string $synchronizationId = null; // = 'X-Synchronization-Identifier';

    public static function make(): self
    {
        $headers = collect(request()->header())
            ->mapWithKeys(
                static function ($item, $key): array {
                    if (Str::startsWith($key, 'X-')) {
                        // $key = Str::afterFirst($key, 'X-');
                        $key = Str::after($key, 'X-');
                    }

                    $key = Str::camel($key);

                    return [$key => $item];
                }
            )->all();

        // Assert::isArray($xot = config('camping'), 'check config [camping] ');
        return self::from($headers);
    }

    public function isValid(): bool
    {
        return true;
    }

    public function getSynchronizationId(string $apiName): string
    {
        if (null !== $this->synchronizationId) {
            return $this->synchronizationId;
        }

        $synchronization = Synchronization::create([
            'user_id' => auth()->id(),
            'mobile_device_id' => $this->deviceId,
            'application' => $this->application ?? 'No-Set',
            'application_version' => $this->appVersion ?? 'No-Set',
            'api_name' => $apiName,
            'called_at' => Carbon::now(),
            // fulfilled_at
        ]);
        $this->synchronizationId = $synchronization->id;

        return $this->synchronizationId;
    }

    /*
    public function getModel(){
        MobileDevice::firstOrCreate();
    }
    */
}
