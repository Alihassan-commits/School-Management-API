<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use OpenApi\Attributes as OA;

class StudentController extends Controller
{
    #[OA\Get(
        path: "/api/students",
        summary: "Get all students",
        tags: ["Students"],
        responses: [
            new OA\Response(response: 200, description: "Success")
        ]
    )]
    public function index()
    {
        return Student::all();
    }

    #[OA\Post(
        path: "/api/students",
        summary: "Create student",
        tags: ["Students"],
        requestBody: new OA\RequestBody(
            required: true,
            content: new OA\JsonContent(
                required: ["name", "email", "class"],
                properties: [
                    new OA\Property(property: "name", type: "string"),
                    new OA\Property(property: "email", type: "string"),
                    new OA\Property(property: "class", type: "string"),
                ]
            )
        ),
        responses: [
            new OA\Response(response: 200, description: "Created")
        ]
    )]
    public function store(Request $request)
    {
        return Student::create($request->all());
    }

    #[OA\Get(
        path: "/api/students/{id}",
        summary: "Get student by ID",
        tags: ["Students"],
        parameters: [
            new OA\Parameter(
                name: "id",
                in: "path",
                required: true,
                schema: new OA\Schema(type: "integer")
            )
        ],
        responses: [
            new OA\Response(response: 200, description: "Success")
        ]
    )]
    public function show($id)
    {
        return Student::findOrFail($id);
    }
}
