<?php

namespace App\Policies;

use App\Models\Cashier;
use App\Models\OrderDetail;
use Illuminate\Auth\Access\Response;

class OrderDetailPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Cashier $cashier): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Cashier $cashier, OrderDetail $orderDetail): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Cashier $cashier): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Cashier $cashier, OrderDetail $orderDetail): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Cashier $cashier, OrderDetail $orderDetail): bool
    {
        return false;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Cashier $cashier, OrderDetail $orderDetail): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Cashier $cashier, OrderDetail $orderDetail): bool
    {
        return true;
    }
}
