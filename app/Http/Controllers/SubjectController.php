<?php

namespace App\Http\Controllers;

use App\Http\Filters\SubjectFilter;
use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Http\Services\SubjectService;
use App\Models\Subject;
use Illuminate\Http\JsonResponse;

class SubjectController extends Controller
{
    protected $service;

    public function __construct(SubjectService $service)
    {
        $this->service = $service;
    }

    public function index(SubjectFilter $filter): JsonResponse
    {
        return $this->service->get($filter);
    }

    public function show(Subject $subject): JsonResponse
    {
        return $this->service->find($subject);
    }

    public function store(StoreSubjectRequest $request): JsonResponse
    {
        return $this->service->create($request);
    }

    public function update(UpdateSubjectRequest $request, Subject $subject): JsonResponse
    {
        return $this->service->update($request, $subject);
    }

    public function destroy(Subject $subject): JsonResponse
    {
        return $this->service->delete($subject);
    }
}
