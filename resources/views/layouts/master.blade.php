<!DOCTYPE HTML>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

            <title>@yield('title')</title>
            <meta name="description" content="@yield('description')">
            
        <link rel="icon" href="{!! asset('favicon.png') !!}" type="image/x-icon">
        
            {{-- APP STYLESHEETS --}}
        {{-- {!! HTML::style('css/components.css') !!} --}}
        {!! HTML::style('css/components.css') !!}
        {!! HTML::style('css/app.css') !!}
        {{-- APP SCRIPTS --}}
        {!! HTML::script('js/app.js') !!}
        {!! HTML::script('js/profile/edit.js') !!}
    </head>
    <body>

        {{-- APP CONTENT BEGINS --}}
        @include('layouts.partials.nav')
            <div id="content">
                @yield('content')
            
            {{-- MODALS --}}
            @yield('modal')
        @include('layouts.partials.footer')
        {{-- APP CONTENT ENDS --}}
            </div>                                
    </body>
</html>