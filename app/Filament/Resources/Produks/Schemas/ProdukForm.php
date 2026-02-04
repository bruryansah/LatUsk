<?php

namespace App\Filament\Resources\Produks\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Schemas\Schema;

class ProdukForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('kode')
                    ->required(),
                TextInput::make('nama')
                    ->required(),
                TextInput::make('tipe')
                    ->required(),
                TextInput::make('jenis')
                    ->required(),
                TextInput::make('harga')
                    ->required()
                    ->numeric(),
                TextInput::make('stok')
                    ->required(),
                FileUpload::make('image')
                    ->required()
                    ->columnSpanFull(),
            ]);
    }
}
