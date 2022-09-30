@php
$message = $type= null;
    if(session()->has('success')){
        $message = session()->get('success');
        $type = 'success';
    }
    if(session()->has('error')){
        $message = session()->get('error');
        $type = 'danger';
    }
@endphp
@if ($type !== null && $message !== null)
    <x-alert type="{{$type}}" :message="$message"></x-alert>
@elseif (isset($vmessage) && $vmessage !==null)
    <x-alert type="danger" :message="$vmessage"></x-alert>
@endif

