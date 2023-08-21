<?php

namespace Lit\Config\Crud;

use App\Models\Frequency;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Illuminate\Support\Str;
use Lit\Http\Controllers\Crud\FrequencyController;

class FrequencyConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Frequency::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = FrequencyController::class;

    /**
     * Model singular and plural name.
     *
     * @param Frequency|null frequency
     * @return array
     */
    public function names(Frequency $frequency = null)
    {
        return [
            'singular' => $frequency->description ?? 'Frequency',
            'plural' => 'Frequencies',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'frequencies';
    }

    /**
     * Build index page.
     *
     * @param \Ignite\Crud\CrudIndex $page
     * @return void
     */
    public function index(CrudIndex $page)
    {
        $page->table(function ($table) {

            $table->col('Description')->value('{description}')->sortBy('description');
            $table->field('Active')->boolean('active');

        })->search('description');
    }

    /**
     * Setup show page.
     *
     * @param \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {

            $form->input('description')
                ->title('Description')
                ->updateRules('unique:frequencies')
                ->creationRules('required', 'unique:frequencies')
                ->max(100)
                ->width(9 / 12);
            $form->boolean('active')
                ->title('Active')
                ->width(3 / 12);

        });

        $page->card(function ($form) {
            $form->relation('logs')
                ->preview(function ($table) {
                    $table->col('created_at')->value('{formatted_date} <br> {formatted_time}')->sortBy('created_at')->small();
                    $table->col('Field')->value('{field_name}: {from} => {to}')->style('text-wrap');
                    $table->col('Updated By')->value('{user_name}')->small();
                })

                ->perPage(10)
                ->readOnly()
                ->allowLinking(false)->showTableHead();
        });
    }
}
