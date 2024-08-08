<?php

namespace App\Http\Controllers\Backend\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Customer\CustomerCreateRequest;
use App\Http\Requests\Backend\Customer\CustomerUpdateRequest;
use App\Http\Resources\Customer\CustomerResource;
use App\Models\Customer;
use App\Traits\ApiResponses;
use Illuminate\Http\JsonResponse;

class CustomerController extends Controller
{
    use ApiResponses;

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $limit = request('limit', config("defaults.paginator_limit"));

        return $this->sendSuccessResponse(CustomerResource::collection(Customer::paginate($limit)));
    }

    public function show(Customer $customer): JsonResponse
    {
        return $this->sendSuccessResponse(new CustomerResource($customer));
    }

    public function destroy(Customer $customer): JsonResponse
    {
        $customer->delete();

        return $this->sendSuccessResponse([], 'Customer successfully deleted.');
    }

    public function store(CustomerCreateRequest $request): CustomerResource
    {
        return new CustomerResource(Customer::create($request->validated()));
    }

    public function update(CustomerUpdateRequest $request, Customer $customer): CustomerResource
    {
        $customer->update($request->validated());

        return new CustomerResource($customer);
    }
}
