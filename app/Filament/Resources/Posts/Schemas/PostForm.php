<?php

namespace App\Filament\Resources\Posts\Schemas;

use App\Models\Category;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class PostForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')->required(),
                TextInput::make('slug')->required(),
                Select::make('category_id')
                    ->label('Category')
                    ->options(
                        Category::all()->pluck('name', 'id')
                    )
                    ->required(),
                ColorPicker::make('color'),
                // MarkdownEditor::make('content'),
                RichEditor::make('content'),
                FileUpload::make('image')
                    ->disk('public')
                    ->directory('posts'),
                TagsInput::make('tags'),
                Checkbox::make('published'),
                DateTimePicker::make('published_at'),
            ]);
    }
}
