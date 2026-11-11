@if ($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger">
    <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
    <span><b>Warning -</b> {{ $error }}</span>
</div>
@endforeach
@endif

@foreach (['success', 'successMsg'] as $key)
@if (session($key))
<div class="alert alert-success">
    <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
    <span><b>Success -</b> {{ session($key) }}</span>
</div>
@endif
@endforeach

@if (session('error'))
<div class="alert alert-danger">
    <button type="button" aria-hidden="true" class="close" onclick="this.parentElement.style.display='none'">×</button>
    <span><b>Error -</b> {{ session('error') }}</span>
</div>
@endif
