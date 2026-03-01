<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Development\DevelopmentStoreRequest;
use App\Http\Requests\Development\DevelopmentUpdateRequest;
use App\Http\Resources\DevelopmentResource;
use App\Http\Resources\PaginateResource;
use App\Repositories\DevelopmentRepository;
use Illuminate\Http\Request;

class DevelopmentController extends Controller
{
    private DevelopmentRepository $developmentRepository;

    public function __construct(DevelopmentRepository $developmentRepository)
    {
        $this->developmentRepository = $developmentRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $development = $this->developmentRepository->getAll($request->search, $request->limit, true);

            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Diambil', DevelopmentResource::collection($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function getAllPaginated(Request $request)
    {
        $request = $request->validate([
            'search' => 'nullable|string',
            'row_per_page' => 'required|integer'
        ]);

        try {
            $development = $this->developmentRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );

            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Diambil', PaginateResource::make($development, DevelopmentResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopmentStoreRequest $request)
    {
        $request = $request->validate();

        try {
            $development = $this->developmentRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Ditambahkan', new DevelopmentResource($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pengembangan Tidak Ditemukan', null, 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Ditemukan', new DevelopmentResource($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopmentUpdateRequest $request, string $id)
    {
        $request = $request->validate();

        try {
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pengembangan Tidak Ditemukan', null, 404);
            }

            $development = $this->developmentRepository->update($request, $id);

            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Diperbaharui', new DevelopmentResource($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $development = $this->developmentRepository->getById($id);

            if (!$development) {
                return ResponseHelper::jsonResponse(false, 'Data Pengembangan Tidak Ditemukan', null, 404);
            }

            $development = $this->developmentRepository->delete($id);


            return ResponseHelper::jsonResponse(true, 'Data Pengembangan Berhasil Dihapus', new DevelopmentResource($development), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
