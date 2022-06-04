<?php

namespace App\Exports;

use App\Models\User;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return User::withTrashed()->get();
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
