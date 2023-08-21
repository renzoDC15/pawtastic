<?php

namespace Lit\Config\Crud;

use Ignite\Crud\CrudShow;
use Ignite\Crud\CrudIndex;
use Ignite\Crud\Config\CrudConfig;
use Illuminate\Support\Str;

use App\Models\Home;
use Lit\Http\Controllers\Crud\HomeController;

class HomeConfig extends CrudConfig
{
    /**
     * Model class.
     *
     * @var string
     */
    public $model = Home::class;

    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Model singular and plural name.
     *
     * @param Home|null home
     * @return array
     */
    public function names(Home $home = null)
    {
        return [
            'singular' => 'Home',
            'plural'   => 'Homes',
        ];
    }

    /**
     * Get crud route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return 'homes';
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

            $table->col('Title')->value('{title}')->sortBy('title');

        })->search('title');  
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

            $form->input('title');
            
        });
    }
}
