@if (session()->has('error'))
<div class="bg-red-100 p-4 mb-4 text-sm text-red-700" role="alert">
  <span class="font-semibold">{{ session('error') }}</span>
</div>
@endif

@if (session()->has('success'))
<div class="bg-green-100 p-4 mb-4 text-sm text-green-700" role="alert">
  <span class="font-semibold">{{ session('success') }}</span>
</div>
@endif