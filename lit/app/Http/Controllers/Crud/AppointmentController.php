<?php

namespace Lit\Http\Controllers\Crud;

use Illuminate\Database\Eloquent\Builder;

use Illuminate\Contracts\Auth\Access\Authorizable;
use Ignite\Crud\Controllers\CrudController;

class AppointmentController extends CrudController
{
    /**
     * Authorize request for authenticated lit-user and permission operation.
     * Operations: create, read, update, delete
     *
     * @param Authorizable $user
     * @param string $operation
     * @param integer $id
     * @return boolean
     */
    public function authorize(Authorizable $user, string $operation, $id = null): bool
    {
        return $user->can("{$operation} appointments");
        // return true;
    }
}
