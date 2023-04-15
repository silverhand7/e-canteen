<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Http\Requests\NovaRequest;
use Handleglobal\NestedForm\NestedForm;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Currency;
use Laravel\Nova\Fields\Select;

class Order extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Order>
     */
    public static $model = \App\Models\Order::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'buyer', 'cashier',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),
            BelongsTo::make('Pembeli', 'Buyer', Buyer::class),
            BelongsTo::make('Tempat', 'Place', Place::class),
            Image::make('Bukti Pembayaran', 'proof_of_payment')
                ->disk('public')
                ->path('proof_of_payment'),
            Select::make('Status')
                ->options([
                    'pending' => 'pending',
                    'paid' => 'paid',
                    'on progress' => 'on progress',
                    'done' => 'done',
                    'canceled' => 'canceled',
                ])
                ->default('pending')
                ->rules('required'),
            Currency::make('Total')->exceptOnForms(),
            BelongsTo::make('Cashier', 'Cashier', Cashier::class)->default(function(){
                return auth()->guard('web')->user()->id;
            }),

            HasMany::make('Order Details', 'orderDetails', OrderDetail::class),

            NestedForm::make('Order Details', 'orderDetails')->heading('Menu Item'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }

    public function authorizedToReplicate(Request $request)
    {
        return false;
    }

    public static function redirectAfterCreate(NovaRequest $request, $resource)
    {
        return 'redirect/order/'.$resource->id;
    }

    public static function redirectAfterUpdate(NovaRequest $request, $resource)
    {
        return 'redirect/order/'.$resource->id;
    }

    public static function afterCreate(NovaRequest $request, Model $model)
    {
        // $model->orderDetails;
        // $total = 0;

        // foreach ($model->orderDetails as $orderDetail) {
        //     $total += $orderDetail->menu->price * $orderDetail->qty;
        // }

        // \App\Models\Order::find($model->id)->update([
        //     'total' => 10,
        // ]);
    }

    public static function afterUpdate(NovaRequest $request, Model $model)
    {
        // $total = 0;
        // foreach ($model->orderDetails as $orderDetail) {
        //     $total += $orderDetail->menu->price * $orderDetail->qty;
        // }

        // \App\Models\Order::find($model->id)->update([
        //     'total' => $total
        // ]);
    }
}
