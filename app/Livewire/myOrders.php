<?php

namespace App\Livewire;

use App\Models\Order;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\Exportable;
use PowerComponents\LivewirePowerGrid\Facades\Filter;
use PowerComponents\LivewirePowerGrid\Footer;
use PowerComponents\LivewirePowerGrid\Header;
use PowerComponents\LivewirePowerGrid\PowerGrid;
use PowerComponents\LivewirePowerGrid\PowerGridColumns;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;
use PowerComponents\LivewirePowerGrid\Traits\WithExport;

final class myOrders extends PowerGridComponent
{
    use WithExport;

    public function setUp(): array
    {
        // $this->showCheckBox();

        return [
            // Exportable::make('export')
            //     ->striped()
            //     ->type(Exportable::TYPE_XLS, Exportable::TYPE_CSV),
            Header::make()->showSearchInput(),
            Footer::make()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        // return Order::query();
        return Order::where('professional_id', Auth::user()->professional->id);
    }

    public function relationSearch(): array
    {
        return [];
    }

    public function addColumns(): PowerGridColumns
    {
        return PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('customer_id')
            ->addColumn('professionalService_id')
            ->addColumn('professional_id')
            ->addColumn('payment_id')
            ->addColumn('bookingDate')

           /** Example of custom column using a closure **/
            ->addColumn('bookingDate_lower', fn (Order $model) => strtolower(e($model->bookingDate)))

            ->addColumn('bookingTime')
            ->addColumn('bookingAddress')
            ->addColumn('city')
            ->addColumn('pin_code')
            ->addColumn('additionalDetails')
            ->addColumn('order_status')
            ->addColumn('created_at_formatted', fn (Order $model) => Carbon::parse($model->created_at)->format('d/m/Y H:i:s'))
            ->addColumn('updated_at_formatted', fn (Order $model) => Carbon::parse($model->updated_at)->format('d/m/Y H:i:s'));
    }

    public function columns(): array
    {
        return [
            Column::make('Id', 'id'),
            Column::make('Customer id', 'customer_id')
            ->sortable()
            ->searchable(),
            Column::make('ProfessionalService id', 'professionalService_id'),
            Column::make('Professional id', 'professional_id'),
            Column::make('Payment id', 'payment_id'),
            Column::make('BookingDate', 'bookingDate')
                ->sortable()
                ->searchable(),

            Column::make('BookingTime', 'bookingTime')
                ->sortable()
                ->searchable(),

            Column::make('BookingAddress', 'bookingAddress')
                ->sortable()
                ->searchable(),

            Column::make('City', 'city')
                ->sortable()
                ->searchable(),

            Column::make('Pin code', 'pin_code')
                ->sortable()
                ->searchable(),

            Column::make('AdditionalDetails', 'additionalDetails')
                ->sortable()
                ->searchable(),

            Column::make('Order status', 'order_status')
                ->sortable()
                ->searchable(),

            Column::make('Created at', 'created_at_formatted', 'created_at')
                ->sortable(),

            Column::make('Updated at', 'updated_at_formatted', 'updated_at')
                ->sortable(),

        ];
    }

    public function filters(): array
    {
        return [
            Filter::inputText('customer_id')->operators(['contains']),
            Filter::inputText('bookingDate')->operators(['contains']),
            Filter::inputText('bookingTime')->operators(['contains']),
            Filter::inputText('bookingAddress')->operators(['contains']),
            Filter::inputText('city')->operators(['contains']),
            Filter::inputText('pin_code')->operators(['contains']),
            Filter::inputText('order_status')->operators(['contains']),
            // Filter::datetimepicker('created_at'),
            // Filter::datetimepicker('updated_at'),
        ];
    }

    
}
