<?php

declare(strict_types=1);

namespace App\Services\Contracts;

use App\Dtos\ItemsExportDto;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

interface ItemsServiceContract
{
    public function exportItems(ItemsExportDto $dto): BinaryFileResponse;
}
