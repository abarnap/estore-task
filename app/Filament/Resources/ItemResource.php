<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ItemResource\Pages;
use App\Filament\Resources\ItemResource\RelationManagers;
use App\Models\Item;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Set;
use Illuminate\Support\Str;

class ItemResource extends Resource
{
    protected static ?string $model = Item::class;

    protected static ?string $navigationIcon = 'heroicon-o-archive-box';
    protected static ?string $navigationGroup = 'Item Management';
    protected static ?int $navigationSort = 40;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(['sm'=>2,'lg'=>4])->schema([
                    Forms\Components\Select::make('category_id')
                        ->required()->searchable()->preload()
                        ->relationship('category', 'name'),
                    Forms\Components\Select::make('sub_category_id')
                        ->required()->searchable()->preload()
                        ->relationship('subCategory', 'name'),
                    Forms\Components\TextInput::make('name')
                        ->required()->maxLength(255)
                        ->live()
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                    Forms\Components\TextInput::make('slug')
                        ->required()->maxLength(255),
                    Forms\Components\Textarea::make('description')
                        ->required()->maxLength(65535)->columnSpanFull(),
                    Forms\Components\TextInput::make('price')
                        ->required()->numeric()->prefix('₹'),
                    Forms\Components\TextInput::make('stock')
                        ->required()->numeric(),
                ]),
                Forms\Components\FileUpload::make('images')
                    ->multiple() ->maxFiles(4)->reorderable()
                    ->imageEditorAspectRatios(['16:9', '4:3', '1:1'])
                    ->image()->imageEditor()->downloadable()->openable(),
                Forms\Components\Grid::make(['sm'=>2,'lg'=>4])->schema([
                    Forms\Components\Toggle::make('status')
                        ->required()->columnSpanFull(),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('subCategory.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('price')
                    ->money()->sortable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()->sortable(),
                Tables\Columns\IconColumn::make('status')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->date()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->date()->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListItems::route('/'),
            'create' => Pages\CreateItem::route('/create'),
            'edit' => Pages\EditItem::route('/{record}/edit'),
        ];
    }
}
