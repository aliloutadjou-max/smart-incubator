@if(url()->previous() != url()->current())

<div class="mb-4">

<a href="{{ url()->previous() }}" class="btn btn-light border shadow-sm">

<i class="bi bi-arrow-left"></i>

Retour

</a>

</div>

@endif