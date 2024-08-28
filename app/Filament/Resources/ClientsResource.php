<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClientsResource\Pages;
use App\Filament\Resources\ClientsResource\RelationManagers;
use App\Models\Clients;
use App\Models\ClientTypes;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Support\RawJs;

class ClientsResource extends Resource
{
    protected static ?string $model = Clients::class;

    public static function getModelLabel(): string
    {
        return __('Clientes');
    }
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->label('E-mail')
                    ->email()
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->directory('images')
                    ->required(),
                Select::make('type_id')
                    ->label('Tipo de Cliente')
                    ->options(
                        ClientTypes::all()->pluck('type', 'id')->toArray()
                    )
                    ->required(),
                Repeater::make('phones')
                    ->relationship()
                    ->simple(
                        TextInput::make('number')
                            ->required()
                            ->mask(RawJs::make(<<<'JS'
                            $input.length >= 14 ? '(99) 99999-9999' : '(99) 9999-9999'
                        JS))
                    )
                    ->label('Telefone'),
                Select::make('sellers')
                    ->multiple()
                    ->relationship('sellers', 'name')
                    ->label('Vendedores')
                    ->searchable()
                    ->preload()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                ImageColumn::make('image')
                    ->label('Imagem'),
                TextColumn::make('type.type')
                    ->label('Tipo')
                    ->searchable(),
                TextColumn::make('phones.number')
                    ->label('Telefones')
                    ->searchable(),
                TextColumn::make('sellers.name')
                    ->label('Vendedores')
                    ->searchable(),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
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
                    Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListClients::route('/'),
            'create' => Pages\CreateClients::route('/create'),
            'edit' => Pages\EditClients::route('/{record}/edit'),
        ];
    }
}
