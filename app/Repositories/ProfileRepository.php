<?php

namespace App\Repositories;

use App\Interfaces\ProfileRepositoryInterface;
use App\Models\Profile;
use Exception;
use Illuminate\Support\Facades\DB;

class ProfileRepository implements ProfileRepositoryInterface
{
    public function getProfile()
    {
        return Profile::first();
    }

    public function create(?array $data)
    {
        DB::transaction();

        try {
            $profile = new Profile;

            $profile->thumbnail = $data['thumbnail']->store('assets/profile', 'public');
            $profile->name = $data['name'];
            $profile->about = $data['about'];
            $profile->headman = $data['headman'];
            $profile->people = $data['people'];
            $profile->agricultural_area = $data['agricultural_area'];
            $profile->total_area = $data['total_area'];

            if (array_key_exists('image', $data)) {
                foreach ($data['images'] as $image) {
                    $profile->images()->create([
                        'image' => $image->store('assets/profile', 'public')
                    ]);
                }
            }

            $profile->save();

            DB::commit();
            return $profile;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function update(?array $data)
    {
        DB::transaction();

        try {
            $profile = Profile::first();

            if (isset($data['thumbnail'])) {
                $profile->thumbnail = $data['thumbnail']->store('assets/profile', 'public');
            }

            $profile->thumbnail = $data['thumbnail']->store('assets/profile', 'public');
            $profile->name = $data['name'];
            $profile->about = $data['about'];
            $profile->headman = $data['headman'];
            $profile->people = $data['people'];
            $profile->agricultural_area = $data['agricultural_area'];
            $profile->total_area = $data['total_area'];

            if (array_key_exists('image', $data)) {
                foreach ($data['images'] as $image) {
                    $profile->images()->create([
                        'image' => $image->store('assets/profile', 'public')
                    ]);
                }
            }

            $profile->save();

            DB::commit();
            return $profile;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
