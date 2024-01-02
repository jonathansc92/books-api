<?php

namespace App\Http\Controllers;

use App\Http\Filters\BookFilter;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Http\Services\BookService;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    protected $service;

    public function __construct(BookService $service)
    {
        $this->service = $service;
    }

    public function index(BookFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function show(Book $book): JsonResponse
    {
        return $this->service->find($book);
    }

    public function store(StoreBookRequest $request): JsonResponse
    {
        return $this->service->create($request);
    }

    public function update(UpdateBookRequest $request, Book $book): JsonResponse
    {
        return $this->service->update($request, $book);
    }

    public function destroy(Book $book): JsonResponse
    {
        return $this->service->delete($book);
    }
}
