<p>Dear {{ $user->name }},</p>
<p>Thank you for registering. Please confirm your email address by clicking the link below:</p>
<a href="{{ url('/email/verify?user=' . $user->id) }}">Confirm Email</a>
