<?php

namespace App\Http\Livewire\Users;

use Livewire\Component;
use App\Models\User;

class UserManagement extends Component
{
    public function render()
    {
        return view('livewire.users.user-management');
    }
}
