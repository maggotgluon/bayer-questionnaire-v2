@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'logo')
<x-logo class="logo" alt="Logo"/>
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
