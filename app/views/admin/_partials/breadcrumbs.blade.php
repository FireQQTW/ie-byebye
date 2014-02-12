<div class="breadcrumbs" id="breadcrumbs">
    @if ($breadcrumbs)
        <ul class="breadcrumb">
            @foreach ($breadcrumbs as $breadcrumb)
                @if ($breadcrumb->first)
                    <li>
                        <i class="icon-home home-icon"></i>
                        <a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a>
                    </li>
                @elseif ($breadcrumb->url && !$breadcrumb->last)
                    <li><a href="{{{ $breadcrumb->url }}}">{{{ $breadcrumb->title }}}</a></li>
                @else
                    <li class="active">{{{ $breadcrumb->title }}}</li>
                @endif
            @endforeach
        </ul>
     @endif
    <!-- .breadcrumb -->

    <div class="nav-search" id="nav-search">
        <form class="form-search">
            <span class="input-icon">
                <input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
                <i class="icon-search nav-search-icon"></i>
            </span>
        </form>
    </div>
    <!-- #nav-search -->
</div>