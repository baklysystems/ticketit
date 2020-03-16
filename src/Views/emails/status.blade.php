<?php $notification_owner = unserialize($notification_owner);?>
<?php $original_ticket = unserialize($original_ticket);?>
<?php $ticket = unserialize($ticket);?>

@extends($email)

@section('subject')
	{{ trans('ticketit::email/globals.status') }}
@stop

@section('link')
	{{--<a style="color:#ffffff" href="{{ route($setting->grab('main_route').'.show', $ticket->id) }}">--}}
	@if($ticket->workspace_id != null)
		<a style="color:#ffffff" href="{{env('APP_Ticket_mt_URL')}}/{{$setting->grab('main_route')}}/{{ $ticket->id }}">
	@else
		<a style="color:#ffffff" href="{{env('APP_Ticket_dev_URL')}}/{{$setting->grab('main_route')}}/{{  $ticket->id }}">
	@endif
		{{ trans('ticketit::email/globals.view-ticket') }}
	</a>
@stop

@section('content')
	{!! trans('ticketit::email/status.data', [
	    'name'        =>  $notification_owner->name,
	    'subject'     =>  $ticket->subject,
	    'old_status'  =>  $original_ticket->status->name,
	    'new_status'  =>  $ticket->status->name
	]) !!}
@stop
