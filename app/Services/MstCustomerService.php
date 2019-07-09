<?php

namespace App\Services;

use App\MstCustomer;

class MstCustomerService
{
    /**
     * @var App\MstCustomer
     */
    private $mstCustomer;

    /**
     * __construct
     *
     * @param  \App\MstCustomer $mstCustomer
     *
     * @return void
     */
    public function __construct(MstCustomer $mstCustomer)
    {
        $this->mstCustomer = $mstCustomer;
    }

    /**
     * Check the customer whether it has already been existed (by email)
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return bool
     */
    public function existCustomer($request)
    {
        $email = is_object($request) ? $request->email : $request;
        return !empty($this->mstCustomer->where('email', $email)->get()->toArray());
    }

    /**
     * Create a new customer
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Database\Eloquent\Model|$this
     */
    public function create($request)
    {
        return $this->mstCustomer->create([
            'customer_name' => $request->name,
            'email'         => $request->email,
            'password'      => bcrypt($request->password),
        ]);
    }
}
