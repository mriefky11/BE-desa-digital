<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\DevelopmentApplicantStoreRequest;
use App\Http\Requests\DevelopmentApplicantUpdateRequest;
use App\Http\Resources\DevelopmentApplicantResource;
use App\Http\Resources\PaginateResource;
use App\Models\DevelopmentApplicant;
use App\Repositories\DevelopmentApplicantRepository;
use Illuminate\Http\Request;

class DevelopmentApplicantController extends Controller
{
    private DevelopmentApplicantRepository $developmentApplicantRepository;

    public function __construct(DevelopmentApplicantRepository $developmentApplicantRepository)
    {
        $this->developmentApplicantRepository = $developmentApplicantRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $developmentApplicant = $this->developmentApplicantRepository->getAll($request->search, $request->limit, true);

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Diambil', DevelopmentApplicantResource::collection($developmentApplicant), 200);
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
            $developmentApplicant = $this->developmentApplicantRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page']
            );

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Diambil', PaginateResource::make($developmentApplicant, DevelopmentApplicantResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DevelopmentApplicantStoreRequest $request)
    {
        $request = $request->validate();

        try {
            $developmentApplicant = $this->developmentApplicantRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Ditambahkan', new DevelopmentApplicantResource($developmentApplicant), 200);
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
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if (!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data Pengaju Pengembangan Tidak Ditemukan', null, 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Ditemukan', new DevelopmentApplicantResource($developmentApplicant), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DevelopmentApplicantUpdateRequest $request, string $id)
    {
        $request = $request->validate();

        try {
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if (!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data Pengaju Pengembangan Tidak Ditemukan', null, 404);
            }

            $developmentApplicant = $this->developmentApplicantRepository->update($request, $id);

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Diperbaharui', new DevelopmentApplicantResource($developmentApplicant), 200);
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
            $developmentApplicant = $this->developmentApplicantRepository->getById($id);

            if (!$developmentApplicant) {
                return ResponseHelper::jsonResponse(false, 'Data Pengaju Pengembangan Tidak Ditemukan', null, 404);
            }

            $developmentApplicant = $this->developmentApplicantRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'Data Pengaju Pengembangan Berhasil Dihapus', new DevelopmentApplicantResource($developmentApplicant), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
