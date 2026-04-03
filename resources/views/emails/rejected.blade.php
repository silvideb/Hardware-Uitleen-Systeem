<h1>Lening Afgewezen</h1>

<p>Beste {{ $loan->user->name }},</p>

<p>Helaas moeten wij u mededelen dat uw leningaanvraag is afgewezen.</p>

<p><strong>Reden van afwijzing:</strong></p>
<p>{{ $loan->reject_reason }}</p>

<p>Met vriendelijke groet,<br>
{{ config('app.name') }}</p>