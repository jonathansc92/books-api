<?php

namespace App\Http\Controllers;

use App\Http\Filters\AuthorFilter;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Http\Services\AuthorService;
use App\Models\Author;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{
    protected $service;

    public function __construct(AuthorService $service)
    {
        $this->service = $service;
    }

    public function index(AuthorFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function show(Author $author): JsonResponse
    {
        return $this->service->find($author);
    }

    public function store(StoreAuthorRequest $request): JsonResponse
    {
        return $this->service->create($request);
    }

    public function update(UpdateAuthorRequest $request, Author $author): JsonResponse
    {
        return $this->service->update($request, $author);
    }

    public function destroy(Author $author): JsonResponse
    {
        return $this->service->delete($author);
    }
}
