<?php

namespace Apydevs\Customers\Livewire;

use Apydevs\Customers\Models\Customer;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\DateColumn;

class CustomerTable  extends DataTableComponent
{
    protected $model = Customer::class;

    public function configure(): void
{
    $this->setPrimaryKey('id');

}

    public function columns(): array
{
    return [
        Column::make('ID', 'id')
            ->hideIf(true)
            ->sortable()->searchable(),
        Column::make('AccountNo', 'account_reference')
            ->sortable()->searchable(),
        Column::make('First Name', 'first_name')
            ->sortable()->searchable(),
        Column::make('Last Name', 'last_name')
            ->sortable()->searchable(),
        Column::make('Email', 'email')
            ->sortable()->searchable(),
        Column::make('Phone', 'phone')
            ->sortable()->searchable(),
        DateColumn::make('Date of Birth', 'date_of_birth')
        ->outputFormat('d/m/Y')  ->sortable()->searchable(),
        Column::make('Address Line 1', 'address_line1')
            ->sortable()->searchable(),
        Column::make('Address Line 2', 'address_line2')
            ->sortable()->searchable()->deselected(),
        Column::make('City', 'city')
            ->sortable()->searchable()->deselected(),
        Column::make('State', 'state')
            ->sortable()->searchable()->deselected(),
        Column::make('Country', 'country')
            ->sortable()->searchable()->deselected(),
        Column::make('Postal Code', 'postal_code')
            ->sortable()->searchable(),
        Column::make('Created At', 'created_at')
            ->sortable()->searchable()->deselected(),
        Column::make('Created By', 'user.name')
            ->sortable()->searchable()->deselected(),
        DateColumn::make('Updated At', 'updated_at')
            ->inputFormat('Y-m-d H:i:s')
            ->outputFormat('d-m-Y H:i:s')
            ->emptyValue('Not Found')
            ->sortable()->searchable()->deselected(),
        Column::make('Action')
            ->label(
                fn ($row, Column $column) => view('components.livewire.datatables.action-column')->with(
                    [
                        'viewLink' => route('customer.view', $row),
                        'deleteLink' => route('customer.delete', $row),
                    ]
                )
            )->html(),
//        Column::make('Deleted At', 'deleted_at') // If you are using soft deletes
//        ->sortable()
    ];
    }


}
