<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class JobTable extends LivewireTableComponent
{
    /**
     * @var string
     */
    protected $model = Job::class;

    /**
     * @var bool
     */
    public $showButtonOnHeader = true;

    /**
     * @var string
     */
    public $buttonComponent = 'jobs.table-components.add_button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('created_at', 'desc');

        $this->setTableAttributes([
            'default' => false,
            'class' => 'table table-striped',
        ]);

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('job_title')) {
                return [
                    'style' => 'width:35%',
                ];
            }

            return [
                'class' => 'text-center',
            ];
        });

        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '6') {
                return [
                    'class' => 'text-center',
                    'width' => '15%',

                ];
            }

            return [];
        });

        $this->setQueryStringStatus(false);

        $this->setFilterPillsStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.job.job_title'), 'job_title')
                ->sortable()
                ->searchable()
                ->view('jobs.table-components.job_title'),
            Column::make(__('messages.job.is_featured'), 'hide_salary')
                ->view('jobs.table-components.is_featured'),
            Column::make(__('messages.job.is_suspended'), 'is_suspended')
                ->view('jobs.table-components.is_suspended'),
            Column::make(__('messages.common.created_on'), 'created_at')
                ->sortable()
                ->searchable()
                ->view('jobs.table-components.created_on'),
            Column::make(__('messages.job.job_expiry_date'), 'job_expiry_date')
                ->sortable()
                ->view('jobs.table-components.expired_at'),
            Column::make(__('messages.common.last_change_by'), 'last_change')
                ->view('jobs.table-components.last_change'),
            Column::make(__('messages.common.action'), 'id')
                ->view('jobs.table-components.action_buttons'),
        ];
    }

    public function builder(): Builder
    {
        return Job::with('company', 'jobCategory', 'jobType', 'jobShift', 'activeFeatured', 'featured', 'admin')->select('jobs.*');
    }

    public function filters(): array
    {
        return [
            SelectFilter::make(__('messages.filter_name.featured_job'))
                ->options([
                    '' => (__('messages.filter_name.select_featured_company')),
                    'yes' => (__('messages.common.yes')),
                    'no' => (__('messages.common.no')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        if ($value == 'yes') {
                            $builder->with('featured')->whereHas('featured');
                        } else {
                            $builder->with('featured')->doesntHave('featured');
                        }
                    }
                ),

            SelectFilter::make(__('messages.filter_name.suspended_job'))
                ->options([
                    '' => (__('messages.filter_name.select_suspended_job')),
                    1 => (__('messages.common.yes')),
                    0 => (__('messages.common.no')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        $builder->where('is_suspended', '=', $value);
                    }
                ),
            SelectFilter::make(__('messages.filter_name.select_independent_work'))
                ->options([
                    '' => (__('messages.filter_name.select_independent_work')),
                    1 => (__('messages.common.yes')),
                    0 => (__('messages.common.no')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        $builder->where('is_freelance', '=', $value);
                    }
                ),
            SelectFilter::make(__('messages.filter_name.job_status'))
                ->options([
                    '' => (__('messages.filter_name.job_status')),
                    'active' => (__('messages.common.active')),
                    'expire' => (__('messages.common.expire')),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        if ($value == 'expire') {
                            $builder->where('job_expiry_date', '<=', date('Y-m-d'));
                        } else {
                            $builder->where('job_expiry_date', '>=', Carbon::tomorrow()->toDateString())->status(Job::STATUS_OPEN)->where('is_suspended', Job::NOT_SUSPENDED);
                        }
                    }
                ),

        ];
    }
}
