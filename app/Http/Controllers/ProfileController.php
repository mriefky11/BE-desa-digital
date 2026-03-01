<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\Profile\ProfileUpdateRequest;
use App\Http\Requests\ProfileStoreRequest;
use App\Http\Resources\ProfileResource;
use App\Interfaces\ProfileRepositoryInterface;
use Exception;

class ProfileController extends Controller
{
    private ProfileRepositoryInterface $profileRepository;

    public function __construct(ProfileRepositoryInterface $profileRepository)
    {
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        try {
            $profile = $this->profileRepository->getProfile();

            if (!$profile) {
                return ResponseHelper::jsonResponse(false, 'Data Profile Tidak Ditemukan', null, 404);
            }

            return ResponseHelper::jsonResponse(true, 'Data Profile Ditemukan', new ProfileResource($profile), 200);
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function create(ProfileStoreRequest $request)
    {
        $request = $request->validate();

        try {
            $this->profileRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Profile Berhasil Ditambahkan', null, 200);
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }

    public function update(ProfileUpdateRequest $request)
    {
        $request = $request->validate();

        try {
            $this->profileRepository->create($request);

            return ResponseHelper::jsonResponse(true, 'Data Profile Berhasil Diupdate', null, 200);
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(false, $e->getMessage(), null, 500);
        }
    }
}
