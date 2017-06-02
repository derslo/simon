<a href="{{ route('home.service.show', $id) }}" class="btn btn-xs btn-primary">
    Anzeigen
</a>
@if(strlen($url) > 0 )
    <a href="{{ $url }}" class="btn btn-xs btn-info" target="_blank">
        URL
    </a>
@endif

@if(strlen($admin_url) > 0 )
    <a href="{{ $admin_url }}" class="btn btn-xs btn-warning" target="_blank">
        Admin URL
    </a>
@endif