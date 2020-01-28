{!! $el->renderHtml() !!}
{{ $el->payload->payloadString }}
{{ $el->payload->payloadInteger }}
@if($el->payload->payloadBool)
    payloadBool is true
@endif
@foreach($el->payload->payloadArray as $item)
    {{ $item }}
@endforeach
{{ $el->payload->subPayload->subPayloadString }}
{{ $el->payload->nonExistentPayload ?? 'myDefaultValue' }}