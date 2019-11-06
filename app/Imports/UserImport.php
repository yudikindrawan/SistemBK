<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;

class UserImport implements ToModel, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function rules(): array
    {
      return [
          '0' => 'unique:users,username'
      ];
    }
    public function model(array $row)
    {
        return new User([
            //
        'username' => $row[0],
        'roles_id' => '4',
        'password' => bcrypt($row[0]),

        ]);
    }
}
