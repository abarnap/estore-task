<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Infolists;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // 
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('item.name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('guest_email')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('line_1')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('line_2')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('city')
                    ->searchable(),
                Tables\Columns\TextColumn::make('state')
                    ->searchable(),
                Tables\Columns\TextColumn::make('country')
                    ->searchable(),
                Tables\Columns\TextColumn::make('pincode')
                    ->searchable(),
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
                // Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function infolist(Infolists\Infolist $infolist): Infolists\Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make()->columns(['sm'=>2,'lg'=>4])->schema([
                    Infolists\Components\TextEntry::make('id')
                        ->label('Order No.'),
                    Infolists\Components\TextEntry::make('name')
                        ->label('Name'),
                    Infolists\Components\TextEntry::make('user.email')
                        ->label('Customer Email'),
                    Infolists\Components\TextEntry::make('guest_email')
                        ->label('Guest Email'),
                ]),
                Infolists\Components\Section::make()->columns(['sm'=>2,'lg'=>4])->schema([
                    Infolists\Components\TextEntry::make('item.name')
                        ->label('Item Name'),
                    Infolists\Components\TextEntry::make('item.price')
                        ->label('Item Price')
                        ->money('INR'),
                ]),
                Infolists\Components\Section::make()->columns(['sm'=>2,'lg'=>4])->schema([
                    Infolists\Components\TextEntry::make('line_1')
                        ->label('Address Line 1'),
                    Infolists\Components\TextEntry::make('line_2')
                        ->label('Address Line 2'),
                    Infolists\Components\TextEntry::make('city')
                        ->label('City'),
                    Infolists\Components\TextEntry::make('state')
                        ->label('State'),
                    Infolists\Components\TextEntry::make('country')
                        ->label('Country'),
                    Infolists\Components\TextEntry::make('pincode')
                        ->label('Pincode'),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'view' => Pages\ViewOrder::route('/{record}'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
        ];
    }
}
