<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * Class EmployersSearch
 */
class EmployersSearch extends Component
{
    use WithPagination;

    /**
     * @var string
     */
    public $searchByEmployee = '';

    public $featured = '';

    public $status = '';

    /**
     * @var string
     */
    protected $paginationTheme = 'bootstrap';

    /**
     * @var string[]
     */
    protected $listeners = ['changeFilter', 'refresh' => '$refresh', 'deleteEmployee'];

    /**
     * @var int
     */
    private $perPage = 8;

    public function paginationView(): string
    {
        return 'livewire.custom-pagenation-jobs';
    }

    public function nextPage($lastPage)
    {
        if ($this->page < $lastPage) {
            $this->page = $this->page + 1;
        }
    }

    public function previousPage()
    {
        if ($this->page > 1) {
            $this->page = $this->page - 1;
        }
    }

    public function deleteEmployee($companyId)
    {
        $company = Company::findOrFail($companyId);
        $company->delete();
        $company->user->media()->delete();
        $company->user->delete();

        $this->dispatchBrowserEvent('delete');
    }

    public function changeFilter($param, $value)
    {
        $this->resetPage();
        $this->$param = $value;
    }

    public function updatingsearchByEmployee()
    {
        $this->resetPage();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $employers = $this->searchEmployee();

        return view('livewire.employers-search', compact('employers'));
    }

    /**
     * @return mixed
     */
    public function searchEmployee()
    {
        /** @var Company $query */
        $query = Company::with('user', 'activeFeatured')->select('companies.*')->orderByDesc('created_at');

        $query->when(isset($this->searchByEmployee) && $this->searchByEmployee != '',
            function (Builder $q) {
                $q->whereHas('user', function (Builder $q) {
                    $q->where('first_name', 'like',
                        '%'.strtolower($this->searchByEmployee).'%')
                        ->orWhere('email', 'like',
                            '%'.strtolower($this->searchByEmployee).'%');
                });
            });

        $query->when(isset($this->featured) && $this->featured == 1,
            function (Builder $q) {
                $q->has('activeFeatured');
            });

        $query->when(($this->featured != '') && $this->featured == 0,
            function (Builder $q) {
                $q->doesnthave('activeFeatured');
            });

        $query->when(($this->status != '') && $this->status == 1,
            function (Builder $q) {
                $q->wherehas('user', function (Builder $q) {
                    $q->where('is_active', '=', 1);
                });
            });

        $query->when(($this->status != '') && $this->status == 0,
            function (Builder $q) {
                $q->wherehas('user', function (Builder $q) {
                    $q->where('is_active', '=', 0);
                });
            });
        $all = $query->paginate($this->perPage);
        $currentPage = $all->currentPage();
        $lastPage = $all->lastPage();
        if ($currentPage > $lastPage) {
            $this->page = $lastPage;
            $all = $query->paginate($this->perPage);
        }

        return $all;
    }
}
