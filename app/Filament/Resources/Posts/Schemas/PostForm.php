<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Section::make('Post Details')
                    ->description('Fill in the details of the post')
                    ->icon('heroicon-o-document-text')
                    ->schema([
                        // grouping fields into 2 columns
                        Group::make([
                            TextInput::make('title')
                                ->rules('required'),
                            TextInput::make('slug')
                                ->required(),
                            Select::make('category_id')
                                ->label('Category')
                                ->options(
                                    Category::all()->pluck('name', 'id')
                                )
                                ->required(),
                            ColorPicker::make('color'),
                        ])->columns(2),
                        MarkdownEditor::make('content'),
                    ])->columnSpan(2),

                Group::make([
                    // section 2 - image
                    Section::make('Image Upload')
                        ->schema([
                            FileUpload::make('image')
                                ->disk('public')
                                ->directory('posts'),
                        ]),

                    // section 3 - meta
                    Section::make('Meta information')
                        ->schema([
                            TagsInput::make('tags'),
                            Checkbox::make('published'),
                            DateTimePicker::make('published_at'),
                        ]),
                ])->columnSpan(1),
            ])->columns(3);
    }
}
