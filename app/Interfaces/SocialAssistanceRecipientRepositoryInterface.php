<?php

namespace App\Interfaces;

interface SocialAssistanceRecipientRepositoryInterface
{
    public function getAll(
        ?string $search,
        ?int $limit,
        bool $execute
    );

    public function getAllPaginated(
        ?string $search,
        ?int $rowPerPage
    );

    public function create(
        ?array $data
    );

    public function getById(
        ?string $id
    );

    public function update(
        ?array $data,
        ?string $id
    );

    function delete(
        ?string $id
    );
}
