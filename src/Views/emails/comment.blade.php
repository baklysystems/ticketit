<?php $comment = unserialize($comment);?>
<?php $ticket = unserialize($ticket);?>

@extends($email)

@section('subject')
	{{ trans('ticketit::email/globals.comment') }}
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
	{!! trans('ticketit::email/comment.data', [
	    'name'      =>  ($comment->user?$comment->user->name:""),
	    'subject'   =>  $ticket->subject,
	    'status'    =>  ($ticket->status?$ticket->status->name:""),
	    'category'  =>  ($ticket->category?$ticket->category->name:""),
	    'comment'   =>  $comment->getShortContent()
	]) !!}
@stop
