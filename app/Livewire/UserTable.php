<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use RamonRietdijk\LivewireTables\Views\Column;
use RamonRietdijk\LivewireTables\Views\Table;

class UserTable extends Component
{
    public function render()
    {
        return view('livewire.user-table', [
            'table' => $this->getTable()
        ]);
    }

    public function getTable()
    {
        return Table::make()
            ->model(User::class)
            ->columns([
                Column::make('S/N')
                    ->sortable()
                    ->searchable()
                    ->format(fn($value, $row, Column $column) => $row->id),
                Column::make('Name')
                    ->sortable()
                    ->searchable()
                    ->format(fn($value, $row, Column $column) => $row->first_name . ' ' . $row->surname),
                Column::make('Email')
                    ->sortable()
                    ->searchable()
                    ->format(fn($value, $row, Column $column) => $row->email),
                Column::make('Roles')
                    ->sortable()
                    ->searchable()
                    ->format(fn($value, $row, Column $column) => $row->roles->pluck('name')->join(', ')),
                Column::make('Actions')
                    ->sortable()
                    ->format(fn($value, $row, Column $column) => view('livewire.partials.actions', compact('row')))
            ])
            ->filters([
                // Add any filters if necessary
            ])
            ->searchable(true)
            ->paginate(10);
    }
}
