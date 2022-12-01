<aside class="main-sidebar" id="sidebar-wrapper">

    {{-- sidebar: style can be found in sidebar.less --}}
    <section class="sidebar">

        {{-- Sidebar user panel (optional) --}}
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{!! url('imagenes/avatar/user-default.jpg') !!}" class="img-circle"
                     alt="Imagen de perfil de usuario"/>
            </div>
            <div class="pull-left info">
                @if (Auth::guest())
                <p>{{ env('APP_NAME') }}</p>
                @else
                    <p>Hola {{ Auth::user()->name}} !</p>
                @endif
                {{-- Status --}}
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <ul class="sidebar-menu" data-widget="tree">
            @include('layouts.menu')
        </ul>
        {{-- /.sidebar-menu --}}
    </section>
    {{-- /.sidebar --}}
</aside>