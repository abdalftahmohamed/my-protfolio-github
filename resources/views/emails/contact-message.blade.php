<h1>New contact message</h1>

<p><strong>Name:</strong> {{ $senderName }}</p>
<p><strong>Email:</strong> {{ $senderEmail }}</p>
<p><strong>Subject:</strong> {{ $subjectLine ?: '—' }}</p>
<p><strong>Received:</strong> {{ now()->format('Y-m-d H:i:s') }}</p>

<p><strong>Message:</strong></p>
<p>{!! nl2br(e($messageBody)) !!}</p>
