<?php

namespace Lit\Config\Crud;

use App\Models\Time;
use Ignite\Crud\Config\CrudConfig;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\CrudShow;
use Illuminate\Support\Str;
use Lit\Http\Controllers\Crud\TimeController;

class TimeConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Time::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = TimeController::class;

    /**
     * Model singular and plural name.
     *
     * @param Time|null time
     * @return array
     */
    public function names(Time $time = null)
    {
        return [
            'singular' => $time->description ?? 'Time',
            'plural' => 'Times',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'times';
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
                ->updateRules('unique:times')
                ->creationRules('required', 'unique:times')
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
