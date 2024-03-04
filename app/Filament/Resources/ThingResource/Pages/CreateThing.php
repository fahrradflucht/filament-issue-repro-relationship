<?php

namespace App\Filament\Resources\ThingResource\Pages;

use App\Filament\Resources\ThingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateThing extends CreateRecord
{
    protected static string $resource = ThingResource::class;

    // Either one of the following methods _should_ do, but none of them "work",
    // because they will be overridden.

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }

    protected function handleRecordCreation(array $data): \Illuminate\Database\Eloquent\Model
    {
        return auth()->user()->things()->create($data);
    }
}
