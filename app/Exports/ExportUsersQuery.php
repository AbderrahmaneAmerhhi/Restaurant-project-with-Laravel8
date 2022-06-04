<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExportUsersQuery implements FromQuery, WithHeadings
{
    use Exportable;

    public function __construct(int $id)
    {
        $this->id = $id;
    }

    public function query()
    {
        return User::query()->where('id', $this->id);
    }
    // titles
    public function headings(): array
    {
        return [
            'id',
            'name',
            'FullName',
            'email',
            'ville',
            'password',
            'image',
            'created_at',
            'updated_at',
            'deleted_at',
        ];
    }
}
