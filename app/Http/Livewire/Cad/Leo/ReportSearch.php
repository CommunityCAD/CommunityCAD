<?php

namespace App\Http\Livewire\Cad\Leo;

use App\Models\Report;
use Livewire\Component;

class ReportSearch extends Component
{
    public $reports;

    public $search = '';

    public function render()
    {
        if (! empty($this->search)) {
            $this->reports = Report::where('id', 'like', '%'.$this->search.'%')->orWhere('call_id', 'like', '%'.$this->search.'%')->orWhere('title', 'like', '%'.$this->search.'%')->get();
        } else {
            $this->reports = Report::where('id', $this->search)->get();
        }

        return view('livewire.cad.leo.report-search');
    }
}
