@if(isset($messages))
    <div style="display:none;" class="noty-message" data-status="{{{$message_style}}}">
        @foreach($messages as $message)
            <span>
                {{{ $message }}}
            </span>
        @endforeach
    </div>
@endif
