<?php

namespace App\Http\Livewire;

use App\Models\BrandingSliders;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class BrandingSlidersTable extends LivewireTableComponent
{
    protected $model = BrandingSliders::class;

    public $showButtonOnHeader = true;

    public $buttonComponent = 'branding_sliders.table_components.add_button';

    public function configure(): void
    {
        $this->setPrimaryKey('id');

        $this->setDefaultSort('created_at', 'desc');

        $this->setThAttributes(function (Column $column) {
            if ($column->isField('is_active')) {
                return [
                    'class' => 'd-flex justify-content-center',
                ];
            }

            return [
                'class' => 'text-center',
            ];
        });
        $this->setTdAttributes(function (Column $column, $row, $columnIndex, $rowIndex) {
            if ($columnIndex == '2') {
                return [
                    'class' => 'text-center',
                    'width' => '15%',

                ];
            }

            return [];
        });
        $this->setTableAttributes(
            [
                'default' => false,
                'class' => 'table table-striped',
            ]);

        $this->setQueryStringStatus(false);

        $this->setFilterPillsStatus(false);
    }

    public function columns(): array
    {
        return [
            Column::make(__('messages.candidate_profile.title'), 'title')
                ->sortable()
                ->searchable()
                ->view('branding_sliders.table_components.title'),

            Column::make(__('messages.image_slider.is_active'), 'is_active')
                ->view('branding_sliders.table_components.status'),

            Column::make(__('messages.common.action'), 'id')
                ->view('branding_sliders.table_components.action_button'),
        ];
    }

    public function builder(): Builder
    {
        return BrandingSliders::query()->select('branding_sliders.*');
    }

    public function filters(): array
    {
        return [

            SelectFilter::make(__('messages.common.status'))
                ->options([
                    '' => __('messages.filter_name.select_status'),
                    1 => __('messages.common.active'),
                    2 => __('messages.common.de_active'),
                ])
                ->filter(
                    function (Builder $builder, string $value) {
                        if ($value == 1) {
                            $builder->where('is_active', '=', 1);
                        } else {
                            $builder->where('is_active', '=', 0);
                        }
                    }
                ),
        ];
    }
}
