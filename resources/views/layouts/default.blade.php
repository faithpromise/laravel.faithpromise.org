<?php

global $page_inline_css;
$body_class = (isset($body_class) ? $body_class : '') . ' ' . (isset($nav_style) ? 'navStyle--' . $nav_style : '');
$og_image = (isset($og_image) ? $og_image : url('/xl/full/images/general/facebook-default.png'));

?><!DOCTYPE html>
<html ng-app="app">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ isset($title) ? ($title . ' - '. $site['title']) : $site['title'] }}</title>
        <meta name="description" content="{{ isset($description) ? $description : $site['description'] }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        @include('includes._social_tags')

        <!-- build:style main -->
        <link rel="stylesheet" href="/build/css/main.dev.css">
        <!-- /build -->

        @if (isset($stylesheets))
            <!-- Page stylesheets -->
            @foreach($stylesheets as $s)
                @if ($s->hasMedia())
                    <script>if (window.matchMedia('{{ $s->getMedia() }}').matches) { document.write('<link rel="stylesheet" type="text/css" href="{{ $s->getUrl() }}">') }</script>
                @else
                    <link rel="stylesheet" type="text/css" media="{{ $s->getMedia() }}" href="{{ $s->getUrl() }}">
                @endif
            @endforeach
        @endif

        @if (isset($page_inline_css))
            <!-- Inline styles -->
            {!! $page_inline_css !!}
        @endif

        <link rel="canonical" href="{{ isset($canonical) ? $canonical : URL::current()  }}">
    </head>

    <body class="{{ $body_class }}">

        @include('includes.google_analytics')

        <div id="top" class="Layout">

            @if (!$in_app)
                <div id="js-nav" class="Nav">
                    <div class="Nav-container">

                        <a id="to_home_from_headerLogo" class="Nav-logoWrap" href="/">
                            <svg class="Nav-logo" role="img" title="Faith Promise Church Logo">
                                <use xlink:href="/build/svg/general.svg#{{ $site['logo'] }}"></use>
                            </svg>
                        </a>

                        <ul class="Nav-menu">
                            @foreach ($nav as $topnav)
                                <li class="Nav-item" uib-dropdown>
                                    @if (!isset($topnav['subnav']))
                                        <a id="to_{{ $topnav['id'] }}_from_nav" class="Nav-link" href="{{ $topnav['url'] }}">{{ $topnav['title'] }}</a>
                                    @else
                                        <span class="Nav-link Nav-link--dropdown" uib-dropdown-toggle>{{ $topnav['title'] }}</span>
                                        <ul class="NavDropdown">
                                            @foreach ($topnav['subnav'] as $subnav)
                                                <li class="NavDropdown-item">
                                                    <a id="to_{{ $subnav['id'] }}_from_nav" class="NavDropdown-link" href="{{ $subnav['url'] }}">{{ $subnav['title'] }}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endif
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
                <div class="MobileNav-background"></div>
                <div class="MobileNav-dismiss" nav-toggle></div>
            @endif

            <div class="Layout-contentWrap">
                <!--<div class="MobileBar-background"></div>-->
                @if (!$in_app)
                    <div class="MobileBar">
                        <a id="to_home_from_mobileLogo" class="MobileBar-logoWrap" href="/">
                            <svg class="MobileBar-logo" role="img" title="Faith Promise Logo">
                                <use xlink:href="/build/svg/general.svg#logo-faith-promise"></use>
                            </svg>
                        </a>
                        <span class="MobileBar-navToggle"><i class="icon-menu" nav-toggle></i></span>
                    </div>
                @endif
                <!--<div class="Hero-shim"></div>-->
                @yield('content')

                @if (!$in_app)
                <div class="Footer">
                    <div class="Footer-container">
                        <div class="Footer-social">
                            <h5 class="Footer-socialHeading">Connect with us</h5>
                            <ul class="Footer-socialList">
                                <li class="Footer-socialItem">
                                    <a id="to_facebook_from_footer" class="Footer-socialLink" href="https://www.facebook.com/faithpromise"><i class="Footer-socialIcon icon-facebook-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a id="to_twitter_from_footer" class="Footer-socialLink" href="https://twitter.com/faithpromise"><i class="Footer-socialIcon icon-twitter-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a id="to_instagram_from_footer" class="Footer-socialLink" href="https://instagram.com/faithpromise"><i class="Footer-socialIcon icon-instagram"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a id="to_vimeo_from_footer" class="Footer-socialLink" href="https://vimeo.com/faithpromise"><i class="Footer-socialIcon icon-vimeo-circled"></i></a>
                                </li>
                                <li class="Footer-socialItem">
                                    <a id="to_pinterest_from_footer" class="Footer-socialLink" href="https://www.pinterest.com/faithpromise/"><i class="Footer-socialIcon icon-pinterest-circled"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="Footer-grid">
                            <div class="Footer-item">
                                <ul class="Footer-linkList">
                                    <li class="Footer-linkItem">
                                        <a id="to_locations_from_footer" class="Footer-link" href="{{ route('locations') }}">Times &amp; locations</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a id="to_updates_from_footer" class="Footer-link" href="{{ route('updates') }}">Get updates</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a id="to_events_from_footer" class="Footer-link" href="{{ route('events') }}">Events</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a id="to_blog_from_footer" class="Footer-link" href="http://blog.faithpromise.org/" target="_blank">Blog</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                    <a id="to_jobs_from_footer" class="Footer-link" href="{{ route('jobs') }}">Jobs</a>
                                    </li>
                                    <li class="Footer-linkItem">
                                        <a id="to_give_from_footer" class="Footer-link" href="{{ route('give') }}">Give Online</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="Footer-item">
                                <p class="Footer-addressLine">Mailing address:</p>
                                <p class="Footer-addressLine">10740 Faith Promise Lane,
                                    <span class="no-wrap">Knoxville, TN 37931</span></p>
                                <p class="Footer-addressLine">
                                    <a href="mailto:office@faithpromise.org">office@faithpromise.org</a> &nbsp;|&nbsp;
                                    <a href="tel:1-865-251-2590" class="no-wrap">(865) 251-2590</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>

        </div>

        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.5/angular-animate.min.js"></script>

        <script>
            (function () {
                window.fp = window.fp || {};
                window.fp.isMobile = function () {
                    var a = navigator.userAgent || navigator.vendor || window.opera;
                    return /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4));
                };
            }());
            (function (angular, fp) {
                var module = angular.module('siteConfig', []);
                module.constant('site', {
                            isMobile: fp.isMobile()
                        }
                );
            })(angular, window.fp);
        </script>

        <!-- build:script main -->
        <script src="/build/js/main/main.dev.js"></script>
        <!-- /build -->

        <!-- http://dinbror.dk/blog/blazy/ -->
        <script src="//cdn.jsdelivr.net/blazy/latest/blazy.min.js"></script>
        <script>
            var fp = window.fp || {};
            /*! contentloaded.min.js - https://github.com/dperini/ContentLoaded - Author: Diego Perini - License: MIT */
            fp.contentLoaded = function (b, i) {
                var j = false, k = true, a = b.document, l = a.documentElement, f = a.addEventListener, h = f ? 'addEventListener' : 'attachEvent', n = f ? 'removeEventListener' : 'detachEvent', g = f ? '' : 'on', c = function (d) {
                    if (d.type == 'readystatechange' && a.readyState != 'complete')return;
                    (d.type == 'load' ? b : a)[n](g + d.type, c, false);
                    if (!j && (j = true))i.call(b, d.type || d)
                }, m = function () {
                    try {l.doScroll('left')} catch (e) {
                        setTimeout(m, 50);
                        return
                    }
                    c('poll')
                };
                if (a.readyState == 'complete')i.call(b, 'lazy'); else {
                    if (!f && l.doScroll) {
                        try {k = !b.frameElement} catch (e) {}
                        if (k)m()
                    }
                    a[h](g + 'DOMContentLoaded', c, false);
                    a[h](g + 'readystatechange', c, false);
                    b[h](g + 'load', c, false)
                }
            };
            fp.contentLoaded(window, function () {
                new Blazy({
                    breakpoints: [
                        {width: 320, src: 'data-src-sm'},
                        {width: 480, src: 'data-src-md'},
                        {width: 600, src: 'data-src-lg'},
                        {width: 960, src: 'data-src-xl'}
                    ]
                });
            });
        </script>

        <!--[if gte IE 9]>
        <script src="/build/js/main/svg4everybody.min.js"></script>
        <![endif]-->
    </body>

</html>
