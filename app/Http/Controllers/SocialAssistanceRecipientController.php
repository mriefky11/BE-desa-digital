<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\SocialAssistanceRecipient\SocialAssistanceRecipientStoreRequest;
use App\Http\Requests\SocialAssistanceRecipient\SocialAssistanceRecipientUpdateRequest;
use App\Http\Resources\PaginateResource;
use App\Http\Resources\SocialAssistanceRecipientResource;
use App\Interfaces\SocialAssistanceRecipientRepositoryInterface;
use App\Models\SocialAssistanceRecipient;
use Illuminate\Http\Request;

class SocialAssistanceRecipientController extends Controller
{
    private SocialAssistanceRecipientRepositoryInterface $socialAssistanceRecipientRepository;

    public function __construct(SocialAssistanceRecipientRepositoryInterface $socialAssistanceRecipientRepository)
    {
        $this->socialAssistanceRecipientRepository = $socialAssistanceRecipientRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $socialAssistanceRecipients = $this->socialAssistanceRecipientRepository->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(true, 'Data Penerima Bantuan Sosial Berhasil Diambil', $socialAssistanceRecipients, 200);
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
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->getAllPaginated(
                $request['search'] ?? null,
                $request['row_per_page'],
            );

            return ResponseHelper::jsonResponse(true, 'Data Kepala Keluarga Berhasil Diambil', PaginateResource::make($socialAssistanceRecipient, SocialAssistanceRecipientResource::class), 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocialAssistanceRecipientStoreRequest $request)
    {
        $request = $request->validated();

        try {
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Penerima Bantuan Sosial Berhasil Dibuat', new SocialAssistanceRecipientResource($socialAssistanceRecipient), 200);
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
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocialAssistanceRecipientUpdateRequest $request, string $id)
    {
        $request = $request->validate();
        try {
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->getById($id);

            if (!$socialAssistanceRecipient) {
                return ResponseHelper::jsonResponse(false, 'Data Penerima Bantuan Sosial Tidak Ditemukan', null, 404);
            };

            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->update($request, $id);

            return ResponseHelper::jsonResponse(true, 'Data Penerima Bantuan Sosial Berhasil Diperbaharui', new SocialAssistanceRecipientResource($socialAssistanceRecipient), 200);
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
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->getById($id);

            if (!$socialAssistanceRecipient) {
                return ResponseHelper::jsonResponse(false, 'Data Penerima Bantuan Sosial Tidak Ditemukan', null, 404);
            }
            $socialAssistanceRecipient = $this->socialAssistanceRecipientRepository->delete($id);

            return ResponseHelper::jsonResponse(true, 'Data Penerima Bantuan Sosial Berhasil Dihapus', null, 200);
        } catch (\Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
