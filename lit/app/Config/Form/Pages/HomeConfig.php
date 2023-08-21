<?php

namespace Lit\Config\Form\Pages;

use Ignite\Crud\Config\FormConfig;
use Ignite\Crud\CrudShow;
use Lit\Http\Controllers\Form\Pages\HomeController;

class HomeConfig extends FormConfig
{
    /**
     * Controller class.
     *
     * @var string
     */
    public $controller = HomeController::class;

    /**
     * Form route prefix.
     *
     * @return string
     */
    public function routePrefix()
    {
        return "pages/home";
    }

    /**
     * Form singular name. This name will be displayed in the navigation.
     *
     * @return array
     */
    public function names()
    {
        return [
            'singular' => 'Home',
        ];
    }

    /**
     * Setup form page.
     *
     * @param \Lit\Crud\CrudShow $page
     * @return void
     */
    public function show(CrudShow $page)
    {
        $page->card(function ($form) {
            $form->image('file_header_image')
                ->translatable()
                ->title('Header Image')
                ->expand()
                ->firstBig()
                ->showFullImage()
                ->maxFileSize(20)
                ->maxFiles(1)
                ->width(12);
            $form->wysiwyg('header_line');
        });
        $page->card(function ($form) {
            $form->image('file_about_images')
                ->translatable()
                ->title('About Images')
                ->showFullImage()
                ->maxFileSize(20)
                ->maxFiles(4)
                ->width(12);
            $form->wysiwyg('about_title');
            $form->wysiwyg('about_content');
        });
    }
}
