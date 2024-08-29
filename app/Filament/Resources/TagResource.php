<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TagResource\Pages;
use App\Models\Tag;
use Filament\Resources\Resource;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
