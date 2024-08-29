<?php

namespace AppTest\Filament\Clusters\Settings\Resources;

use App\Filament\Resources\TagResource as BaseTagResource;
use AppTest\Filament\Clusters\Settings;

// This will throw an error beacuse of the missing routes
class TagResource extends BaseTagResource
{
    protected static ?string $cluster = Settings::class;
}
