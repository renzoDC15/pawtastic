<?php

namespace Lit\Config\Crud;

use Ignite\Crud\CrudShow;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\Config\CrudConfig;
use Illuminate\Support\Str;

use App\Models\Appointment;
use App\Models\Frequency;
use App\Models\Time;
use Lit\Http\Controllers\Crud\AppointmentController;

class AppointmentConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Appointment::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = AppointmentController::class;

    /**
     * Model singular and plural name.
     *
     * @param Appointment|null appointment
     * @return array
     */
    public function names(Appointment $appointment = null)
    {
        return [
            // 'singular' => $appointment==null?$appointment->formatted_date??'':'Appointment',
            'singular' =>$appointment==null? 'Appointment':$appointment->formatted_date.' '.$appointment->formatted_tim,
            'plural'   => 'Appointments',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'appointments';
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
            $table->col('Create Date')->value('{formatted_date} <br> {formatted_time}')->sortBy('created_at')->small();
            $table->col('Start Date')->value('{start_date}')->sortBy('start_date');
            $table->col('Frequency')->value('{frequency.description}');
            $table->col('Time')->value('{time.description}');
            $table->col('Note')->value('{note}');

        })->search('created_at','start_date')
        ->query(function ($query) {
            //   $query->with('user');
            $query->with('frequency');
             $query->with('time');
           });
    }

    /**
     * Setup show page.
     *
     * @param \Ignite\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function($form) {

            $form->query(function ($query) {
                $query->with('days');
            });
            $form->select('frequency_id')
                    ->title('Frequency')
                    ->options(
                        Frequency::where('active',1)->get()->mapWithKeys(function ($item, $key) {
                            return [$item->id => $item->description];
                        })->toArray()
                    )
                    ->width(4/12);
            $form->datetime('start_date')
                    ->title('Start Date')
                    ->onlyDate(true)
                    ->width(4/12);

            $form->select('time_id')
                    ->title('Time')
                    ->options(
                        Time::where('active',1)->get()->mapWithKeys(function ($item, $key) {
                            return [$item->id => $item->description];
                        })->toArray()
                    )
                    ->width(4/12);
            $form->relation('days')
                    ->title('Days')
                    ->type('tags')
                    ->tagValue('{description}')
                    ->allowLinking(false)
                    ->width(4/12);
            $form->wysiwyg('note')
                    ->width(8/12);
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
