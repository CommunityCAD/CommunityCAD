<?php

namespace App\Http\Livewire\Admin\Users;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Search extends Component
{
    public $search = "";
    public $status_id = 3;


    public function render()
    {
        if (!empty($this->search)) {
            if ($this->status_id == 0) {
                $users = User::where('discord_name', 'like', '%' . $this->search . '%')->get();
            } else {
                $users = User::where('discord_name', 'like', '%' . $this->search . '%')->where('account_status', $this->status_id)->get();
            }
        } else {
            $users = User::where('account_status', $this->status_id)->get();
            if ($this->status_id == 0) {
                $users = User::all();
            } else {
                $users = User::where('account_status', $this->status_id)->get();
            }
        }

        return view('livewire.admin.users.search', compact('users'));
    }
}
