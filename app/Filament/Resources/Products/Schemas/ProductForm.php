<?php

namespace App\Filament\Resources\Products\Schemas;

use Filament\Actions\Action;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Wizard;
use Filament\Schemas\Components\Wizard\Step;
use Filament\Schemas\Schema;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Product Info')
                        ->description('Isi informasi dasar produk')
                        ->schema([
                            Group::make([
                                TextInput::make('name')->required(),

                                TextInput::make('sku')->required(),
                            ])->columns(2),
                            MarkdownEditor::make('description'),
                        ]),
                    // Step::make('Product prices')
                    Step::make('Product Price and Stock')
                        ->description('Isi Harga dan Produk')
                        ->schema([
                            Group::make([
                                TextInput::make('price')
                                    ->required(),
                                TextInput::make('stock')
                                    ->required(),
                            ])->columns(2),
                            MarkdownEditor::make('description'),
                        ]),
                    Step::make('Media and Status')
                        ->description('Isi Gambar Produk')
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('products'),
                            Checkbox::make('is_active'),
                            Checkbox::make('is_featured'),
                        ]),
                ])
                    ->columnSpanFull()
                    ->submitAction(
                        Action::make('save')
                            ->label('Save Product')
                            ->button()
                            ->color('primary')
                            ->submit('save')
                    ),
            ]);
    }
}
