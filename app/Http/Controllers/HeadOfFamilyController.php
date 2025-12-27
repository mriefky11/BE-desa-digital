<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\HeadOfFamily\HeadOfFamilyStoreRequest;
use App\Http\Requests\User\HeadOffamilyUpdateRequest;
use App\Http\Resources\HeadOfFamilyResource;
use App\Http\Resources\PaginateResource;
use App\Interfaces\HeadOfFamilyRepositoryInterface;
use Illuminate\Http\Request;

class HeadOfFamilyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private HeadOfFamilyRepositoryInterface $headOfFamilyRepository;

    public function __construct(HeadOfFamilyRepositoryInterface $headOfFamilyRepository)
    {
        $this->headOfFamilyRepository = $headOfFamilyRepository;
    }

    public function index(Request $request)
    {
        try {
            $headOfFamily = $this->headOfFamilyRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Diambil', HeadOfFamilyResource::collection($headOfFamily), 200);
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
            $headOfFamily = $this->headOfFamilyRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'],
            );

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Diambil', PaginateResource::make($headOfFamily, HeadOfFamilyResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(HeadOfFamilyStoreRequest $request)
    {
        $request = $request->validated();

        try {
            $headOfFamily = $this->headOfFamilyRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Ditambahkan', new HeadOfFamilyResource($headOfFamily), 200);
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
            $headOfFamily = $this->headOfFamilyRepository->getById($id);

            if (!$headOfFamily) {
                return ResponseHelper::jsonResponse(false, 'Data Kepala Keluarga Tidak Ditemukan', null, 404);
            };

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Ditemukan', new HeadOfFamilyResource($headOfFamily), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(HeadOffamilyUpdateRequest $request, string $id)
    {
        $request = $request->validated();
        try {
            $headOfFamily = $this->headOfFamilyRepository->getById($id);

            if (!$headOfFamily) {
                return ResponseHelper::jsonResponse(false, 'Data Kepala Keluarga Tidak Ditemukan', null, 404);
            };

            $headOfFamily = $this->headOfFamilyRepository->update($request, $id);

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Diperbaharui', new HeadOfFamilyResource($headOfFamily), 200);
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
            $headOfFamily = $this->headOfFamilyRepository->getById($id);

            if (!$headOfFamily) {
                return ResponseHelper::jsonResponse(false, 'Data Kepala Keluarga Tidak Ditemukan', null, 404);
            }

            $headOfFamily =  $this->headOfFamilyRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Dihapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
