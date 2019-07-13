{!! $el->renderHtml() !!}
{{ $el->payload->get('payloadString') }}
{{ $el->payload->get('payloadInteger') }}
@if($el->payload->get('payloadBool'))
    payloadBool is true
@endif
@foreach($el->payload->get('payloadArray') as $item)
    {{ $item }}
@endforeach
{{ $el->payload->get('subPayload')->subPayloadString }}
{{ $el->payload->get('nonExistentPayload', 'myDefaultValue') }}