<?php

namespace App\Filament\Resources\Posts\Tables;

use Filament\Actions\Action;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ReplicateAction;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\IconColumn;
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
                TextColumn::make('id')
                    ->label('ID')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('slug')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('category.name')
                    ->sortable()
                    ->searchable(),
                ColorColumn::make('color'),
                TextColumn::make('tags')
                    ->label('Tags')
                    ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('image')
                    ->disk('public'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                IconColumn::make('published')
                    ->boolean(),
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
                ReplicateAction::make(),
                EditAction::make(),
                DeleteAction::make(),
                Action::make('status')
                    ->label('Status Change')
                    ->icon('heroicon-o-check-circle')
                    ->requiresConfirmation()
                    ->schema([
                        Checkbox::make('published')
                            ->label('Published')
                            ->default(fn ($record): bool => $record->published),
                    ])
                    ->action(function ($record, $data) {
                        $record->update(['published' => $data['published']]);
                    }),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
