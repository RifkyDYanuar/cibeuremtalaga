@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<img src="{{ asset('images/logo.png') }}" class="logo" alt="Logo Desa Cibeureum" style="max-height: 60px; width: auto;">
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
