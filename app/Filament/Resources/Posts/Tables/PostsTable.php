<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class PostsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),
                ColorColumn::make('color'),
                ImageColumn::make('image')
                    ->disk('public'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),
            ])->defaultSort('created_at', 'desc')
            ->filters([
                Filter::make('created_at')
                    ->label('Created At')
                    ->schema([
                        DatePicker::make('created_at')
                            ->label('Select Date:'),
                    ])
                    ->query(function ($query, $data) {
                        return $query
                            ->when(
                                $data['created_at'],
                                fn ($query, $date) => $query->WhereDate('created_at', $date),
                            );
                    }),
                SelectFilter::make('category_id')
                    ->relationship('category', 'name')
                    ->preload(),
            ])
            ->recordActions([

                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
