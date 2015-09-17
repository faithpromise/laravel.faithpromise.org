<?php

namespace App\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @param Request $request
     */
    public function boot(Request $request) {

        $in_app = ($request->input('in_app') !== null);

        view()->share('in_app', $in_app);
        view()->share('site', config('site'));
        view()->share('nav', config('nav'));

        // BackgroundSection
        Blade::directive('bgsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/background_section.php")); ?>';
        });
        Blade::directive('endbgsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/background_section.php")); ?>';
        });

        // IntroSection
        Blade::directive('introsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/intro_section.php")); ?>';
        });
        Blade::directive('endintrosection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/intro_section.php")); ?>';
        });

        // VideoSection
        Blade::directive('videosection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/video_section.php")); ?>';
        });
        Blade::directive('endvideosection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/video_section.php")); ?>';
        });

        // TextSection
        Blade::directive('textsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/text_section.php")); ?>';
        });
        Blade::directive('endtextsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/text_section.php")); ?>';
        });

        // CardSection
        Blade::directive('cardsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/cards_section.php")); ?>';
        });
        Blade::directive('endcardsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/cards_section.php")); ?>';
        });

        // ProfilesSection
        Blade::directive('profilessection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/profiles_section.php")); ?>';
        });
        Blade::directive('endprofilessection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/profiles_section.php")); ?>';
        });

        // FaqSection
        Blade::directive('faqsection', function ($expression) {
            return '
                <?php
                    $directive = ["execution_mode" => "start"];
                    $directive["args"] = ' . ($expression ?: '[]') . ';
                    include(base_path("resources/views/directives/faq_section.php")); ?>';
        });
        Blade::directive('endfaqsection', function () {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/faq_section.php")); ?>';
        });

        // Dropdown
        Blade::directive('dropdown', function ($expression) {
            return '<?php $dropdown_directive = []; $dropdown_directive["args"] = ' . ($expression ?: '[]') . '; include(base_path("resources/views/directives/dropdown.php")); ?>';
        });

        // style
        Blade::directive('inlinecss', function() {
            return '<?php $directive = ["execution_mode" => "start"]; include(base_path("resources/views/directives/inline_css.php")); ?>';
        });

        // endstyle
        Blade::directive('endinlinecss', function() {
            return '<?php $directive["execution_mode"] = "end"; include(base_path("resources/views/directives/inline_css.php")); ?>';
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
