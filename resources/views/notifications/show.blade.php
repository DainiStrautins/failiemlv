@extends('layouts.form')
@section('body')
    <div class="card-body">
      <ul>
          @forelse($notifications as $notification)

              <li>
                  @if ($notification->type === "App\Notifications\PaymentReceived")
                      We have received a payment of ${{$notification->data['amount']}} from you.
                  @endif
              </li>

              @empty
          <li>
              No notifications
          </li>
              @endforelse
      </ul>
    </div>
@endsection
