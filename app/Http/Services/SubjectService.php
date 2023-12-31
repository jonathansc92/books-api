<?php

namespace App\Http\Services;

use App\Http\Resources\SubjectResource;
use App\Models\Subject;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class SubjectService
{
    public function get($filter)
    {
        $subjects = Subject::filter($filter)->paginate();

        return success_response(
            data: new ResourceCollection($subjects),
            message: __('messages.retrieved', ['model' => __('models/subject.plural')]),
        );
    }

    public static function create($request)
    {
        $subject = Subject::create($request->validated());

        return success_response(
            data: new SubjectResource($subject),
            message: __('messages.saved', ['model' => __('models/subject.singular')]),
            httpStatus: Response::HTTP_CREATED,
        );
    }

    public function find($subject)
    {
        return success_response(
            data: new SubjectResource($subject),
            message: __('messages.retrieved', ['model' => __('models/subject.singular')]),
        );
    }

    public static function update($request, $subject)
    {
        $subject->update($request->validated());

        return success_response(
            data: new SubjectResource($subject),
            message: __('messages.updated', ['model' => __('models/subject.singular')]),
        );
    }

    public static function delete($subject)
    {
        Subject::destroy($subject->id);

        return success_response(
            message: __('messages.deleted', ['model' => __('models/subject.singular')]),
        );
    }
}
